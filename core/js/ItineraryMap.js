
/**
 * Returns an object used to manipulate maps.
 *
 * @param {object} node
 * Any html element which will be used to contain the map.
 *
 * @param {object} data
 * Data attached to the map.
 * Example: {
 *   centerLat: 10,
 *   centerLng: 10.2,
 *   steps: {object},
 * }
 *
 * - data.centerLat and data.centerLng are coordinates of the center of the map.
 *   If the user can be geolocated, the map will be recentered on him instead,
 *   unless geolocation is set to false or geolocationCentered is set to false.
 *  
 * - data.steps is an array of steps that will be used to draw the itinerary.
 *   Example: {
 *     {
 *       position: { lat: 10, lng: 10.2 },
 *       name: "The Castle"
 *     }
 *   }
 *
 * @param {object} options
 * Options to configure the map.
 * Example: {
 *   geolocation: true,
 *   geolocationCentered: true,
 *   displayMarkers: true,
 *   zoom: 15,
 *   static: false
 * }
 *
 * - {boolean} options.geolocation
 *   Enables or disables geolocation.
 *
 * - {boolean} options.geolocationCentered
 *   If true, the map is centered on the user's location (if geolocation is enabled).
 *
 * - {boolean} options.displayMarkers
 *   For each step, a marker is added to the map.
 *   If displayMarkers is false, no markers are added and only the itinerary is drawn.
 *
 * - {number} options.zoom
 *   A numeric value to set the map scale (15 does the job).
 *
 * - {boolean} options.static
 *   If true, make it impossible for the user to zoom or move in the map.
 */
window.ItineraryMap = (function(node, data, options) {

  "use strict";

  // pre-conditions
  if((typeof data) != "object") {
    data = {};
  }

  if((typeof options) != "object") {
    options = {};
  }

  if((typeof data.centerLat) !== "number") {
    // center the map on Provins, if not instructed otherwise
    data.centerLat = 48.56310;
  }

  if((typeof data.centerLng) !== "number") {
    // center the map on Provins, if not instructed otherwise
    data.centerLng = 3.28594;
  }

  if((typeof data.steps) !== "object") {
    data.steps = undefined;
  }

  if((typeof options.displayMarkers) !== "boolean") {
    options.displayMarkers = true;
  }

  if((typeof options.geolocation) !== "boolean") {
    options.geolocation = true;
  }

  if((typeof options.geolocationCentered) !== "boolean") {
    options.geolocationCentered = true;
  }

  if((typeof options.zoom) !== "number") {
    options.zoom = 15;
  }

  if((typeof options.static) !== "boolean") {
    options.static = false;
  }

  // attributes
  this.gMap = undefined;
  this.gCenter = new google.maps.LatLng(data.centerLat, data.centerLng);
  this.gCenterMarker = null; // a marker for the user's location
  this.gMarkers = [];
  this.gWindows = [];

  // private attributes and method
  var routeData = {
    oldPath: null,
    lastStepIndex: 0,
    markers: []
  };

  // used to keep a reference to this object in event handlers
  var thisMap = this;

  var routeGetNextStepsSet = function(gSteps, startIndex) {
    var MAX_STEPS_PER_REQUEST = 8;

    var newGSteps = []; // array of steps to return

    if(startIndex > gSteps.length - 1) {
      // no more steps to process
      return [newGSteps, null];
    }

    var endIndex = startIndex + MAX_STEPS_PER_REQUEST;

    // adjust steps, because Google allows us to include the start and destination latlongs for free!
    endIndex += 2;

    if(endIndex > gSteps.length - 1) {
      endIndex = gSteps.length;
    }

    for(var i = startIndex; i < endIndex; i++) {
        newGSteps.push(gSteps[i]);
    }

    if(endIndex != gSteps.length) {
        return [newGSteps, endIndex - 1];
    } else {
        return [newGSteps, null];
    }
  };

  var routeDirection = function(gService, gSteps, fDrawGDirLine, stepIndex, path) {
    // default values
    stepIndex = typeof stepIndex !== 'undefined' ? stepIndex : 0;
    path = typeof path !== 'undefined' ? path : [];

    // get next set of steps
    var gStepsSet = routeGetNextStepsSet(gSteps, stepIndex);

    // build request object
    var startl = gStepsSet[0].shift().location;
    var endl = gStepsSet[0].pop().location;

    var request = {
      origin: startl,
      destination: endl,
      waypoints: gStepsSet[0],
      travelMode: google.maps.TravelMode.WALKING,
      unitSystem: google.maps.UnitSystem.METRIC,
      // optimizeWaypoints: false,
      provideRouteAlternatives: false,
      avoidHighways: false,
      avoidTolls: false
    };

    gService.route(request, function(response, status) {
      if(status === google.maps.DirectionsStatus.OK) {
        path = path.concat(response.routes[0].overview_path);

        routeData.oldPath = path;
        if(gStepsSet[1] !== null) {
          routeData.lastStepIndex = gStepsSet[1];
          routeDirection(gService, gSteps, fDrawGDirLine, gStepsSet[1], path);
        } else {
          fDrawGDirLine(path);
        }
      } else {
        path = routeData.oldPath;
        routeData.lastStepIndex = routeData.lastStepIndex + 1;

        if(gStepsSet[routeData.lastStepIndex] !== null) {
          routeDirection(gService, gSteps, fDrawGDirLine, routeData.lastStepIndex, path);
        } else {
          fDrawGDirLine(path);
        }
      }
    });
  };

  /**
   * @param {boolean} geolocationCentered
   * If true, the map is centered on the user's location.
   */
  var initGeolocation = function(geolocationCentered) {
    // if we can locate the user, add a marker at his position
    if(navigator.geolocation) {

      navigator.geolocation.getCurrentPosition(function(position) {
        if(geolocationCentered) {
          thisMap.center(
            position.coords.latitude,
            position.coords.longitude
          );
        }

        thisMap.gCenterMarker = thisMap.addMarker(
          position.coords.latitude,
          position.coords.longitude,
          "",
          "X",
          "1C327F",
          "ffffff"
        );
      });

      navigator.geolocation.watchPosition(function(position) {
        if(thisMap.gCenterMarker !== null) {
          thisMap.gCenterMarker.setPosition(
            new google.maps.LatLng(
              position.coords.latitude,
              position.coords.longitude
            )
          );
        }
      });
    }
  };

  /**
   * @param {object} steps
   * An array of steps that will be used to draw the itinerary.
   * Example: {
   *   {
   *     position: { lat: 10, lng: 10.2 },
   *     name: "The Castle",
   *     content: "<h1>The Castle</h1>",
   *     bgColor: "000000",
   *     textColor: "ffffff"
   *   }
   * }
   *
   * @param {boolean} displayMarkers
   * If false, the itinirary will be drawn but no step marker will be added.
   */
  var initItinerary = function(steps, displayMarkers) {
    var gDirectionsService = new google.maps.DirectionsService();

    var stepIndex = 1;
    var gSteps = [];
    for(var stepID in steps) {
      var currentStep = steps[stepID];

      var lat = currentStep.position.lat;
      var long = currentStep.position.long;

      gSteps.push({
        location: new google.maps.LatLng(lat, long)
      });

      if(displayMarkers) {
        var gMarker = thisMap.addMarker(lat, long, currentStep.name, stepIndex, currentStep.bgColor, currentStep.textColor);
        thisMap.addWindow(currentStep.content, gMarker);
      }

      stepIndex = stepIndex + 1;
    }

    routeDirection(
      gDirectionsService,
      gSteps,
      function drawGDirLine(path) {
        var gLine = new google.maps.Polyline({
          clickable: false,
          path: path,
          map: thisMap.gMap,
          strokeColor: "#741321",
          strokeOpacity: 1.0,
          strokeWeight: 2
        });
      }
    );
  };

  
  // initialization
  var gOptions = {
    center: this.gCenter,
    zoom: options.zoom,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI: true,
    draggable: !options.static,
    scrollwheel: !options.static,

    styles: [
      {
        featureType: "poi",
        elementType: "labels",
        stylers: [
          {
            visibility: "off"
          }
        ]
      }
    ]
  };

  this.gMap = new google.maps.Map(node, gOptions);

  if(options.geolocation) {
    initGeolocation(options.geolocationCentered);
  }

  if(data.steps !== undefined) {
    initItinerary(data.steps, options.displayMarkers);
  }
});

ItineraryMap.prototype.center = function(lat, lng) {
  // pre-conditions
  if((typeof lat) !== "number") {
    lat = 0;
  }

  if((typeof lng) !== "number") {
    lng = 0;
  }

  // function
  this.gCenter = new google.maps.LatLng(lat, lng);
  this.gMap.setCenter(this.gCenter);

  // adjust the position of the user's location marker
  if(this.gCenterMarker !== null) {
    this.gCenterMarker.setPosition(this.gCenter);
  }

  return this;
};

ItineraryMap.prototype.addWindow = function(content, gMarker) {
  // pre-conditions
  if((typeof content) !== "string") {
    content = "";
  }

  // function
  var gWindow = new google.maps.InfoWindow({ content: content });

  this.gWindows.push(gWindow);

  if((typeof gMarker) === "object") {
    var thisMap = this;

    google.maps.event.addListener(gMarker, 'click', function() {
      $.each(thisMap.gWindows, function(index, gWindow) {
        gWindow.close();
      });

      gWindow.open(thisMap.gMap, gMarker);
    });
  }

  return gWindow;
};

ItineraryMap.prototype.addMarker = function(lat, lng, title, symbol, bgColor, textColor) {
  // pre-conditions
  if((typeof lat) !== "number") {
    lat = 0;
  }

  if((typeof lng) !== "number") {
    lng = 0;
  }

  if(title === undefined) {
    title = "";
  }

  if(symbol === undefined) {
    symbol = "X";
  }

  if((typeof bgColor) !== "string") {
    bgColor = "000000";
  }

  if((typeof textColor) !== "string") {
    textColor = "ffffff";
  }

  // function
  var iconPath = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' + symbol + '|' + bgColor + '|' + textColor;

  var gMarker = new google.maps.Marker({
    position: new google.maps.LatLng(lat, lng),
    map: this.gMap,
    title: title,
    icon: iconPath
  });

  this.gMarkers.push(gMarker);

  return gMarker;
};

