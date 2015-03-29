
(function ($) {

  "use strict";
  
  function onDocumentReady() {
    initGlobal();

    switch($('body').attr('id')) {
      case 'page-itinerary-summary':
        initPageItinerarySummary();
        break;

      case 'page-itinerary-download':
        initPageItineraryDownload();
        break;

      case 'page-itinerary-step':
        initPageItineraryStep();
        break;

      case 'page-itinerary-steps':
        initPageItinerarySteps();
        break;

      case 'page-itineraries':
        initPageItineraries();
        break;

      case 'page-map':
        initPageMap();
        break;

      case 'page-share':
        initPageShare();
        break;

      default: break;
    }
  }


  /*************************
   global utilities
  *************************/

  function isLocalStorageSupported() {
    return ('localStorage' in window) || (window.localStorage !== null);
  }

  function initGlobal() {
    // init the menu
    $('#hamburger').click(onHamburgerClick);
    $('#hamburgerLayer').click(onHamburgerClick);

    $('nav').bind('touchmove', function(e) {
      e.stopPropagation();
    });

    // disable .disabled links
    $('a.disabled').click(function(e) { e.preventDefault(); });
  }


  /*************************
   hamburger menu
  *************************/

  function onHamburgerClick() {
    var $nav = $('nav');
    var $hamburgerLayer = $('#hamburgerLayer');
    var animationDuration = 300;

    if($hamburgerLayer.hasClass('hidden')) { // the menu is hidden
      $nav.animate({marginLeft: "0"}, animationDuration);
      $hamburgerLayer.removeClass('hidden');
      $hamburgerLayer.animate({opacity: "0.8"}, animationDuration);

      $('body').bind('touchmove', function(e) {
        e.preventDefault();
      });
    } else {
      $nav.animate({marginLeft: "-75%"}, 500);

      $hamburgerLayer.animate({opacity: "0"}, animationDuration, "swing", function() {
        $hamburgerLayer.addClass('hidden');
      });

      $('body').unbind('touchmove');
    }
  }

  /*************************
   #page-itinerary-summary
  *************************/

  /*
   * We are on an itinerary's summary page.
   * If the user has already opened this itinerary in the past,
   * change the start button's description to "resume".
   * data('msg-resume') contains the translated content for "resume".
   */
  function pageItinerarySummary_updateStartLink() {
    if(window.localStorage.itineraries !== undefined) {
      var itineraryID = $('section').data('itinerary');

      var localInformation = JSON.parse(window.localStorage.itineraries);

      if(localInformation.hasOwnProperty(itineraryID)) {
        var $startLink = $('a#start-itinerary');

        if($startLink.data('msg-resume') !== undefined) {
          $startLink.html(
            $startLink.data('msg-resume')
          );
        }
      }
    }
  }
  
  function initPageItinerarySummary() {
    pageItinerarySummary_updateStartLink();
  }

  /*************************
   #page-itinerary-map
  *************************/

  function pageMap_initMap($map) {
    var map = null;

    if($map.hasClass('generic')) {
      map = new ItineraryMap($map[0]);
    } else {

      var steps = $map.data('steps');

      /*
       * Retrieve the current step and center the map on it.
       */
      var itinerary = $map.data('itinerary');
      var localInformation = JSON.parse(window.localStorage.itineraries);
      var currentStepIndex = parseInt(localInformation[itinerary].currentStep);

      var stepKeys = $.map(steps, function(element,index) {return index; });
      var currentStepKey = stepKeys[currentStepIndex];

      var textColor = "ffffff";
      var bgColor = "009E2F";
      var baseStepUrl = $map.data('basestepurl');
      var completedSteps = localInformation[itinerary].completedSteps;

      for(var stepID in steps) {
        var step = steps[stepID];
        var stepIndex = stepKeys.indexOf(stepID);

        if(stepID === currentStepKey) {
          step.bgColor = "741321";
        } else if(completedSteps.indexOf(stepIndex) === -1) {
          step.bgColor = "000000";
        } else {
          step.bgColor = bgColor;
        }

        var stepUrl = baseStepUrl + stepID;

        step.textColor = textColor;
        step.content = '<div class="steplink"><a href="' + stepUrl + '" title="">' + step.name + '</a></div>';
      }

      map = new ItineraryMap(
        $map[0],
        {
          steps: steps,
          centerLat: steps[currentStepKey].position.lat,
          centerLng: steps[currentStepKey].position.long,
        },

        {
          geolocation: true,
          displayMarkers: true,
          zoom: 15
        }
      );
    }
  }

  function initPageMap() {
    pageMap_initMap($('.map'));
  }


  /*************************
   #page-itineraries
  *************************/

  function initPageItineraries() {
    // nothing needed for now...
  }


  /*************************
   #page-itinerary
  *************************/

  function initPageItinerarySteps() {
    var $steps = $('.steps');
    var $progress = $('.progress');

    var itinerary = $steps.data('itinerary');
    var itineraries = JSON.parse(window.localStorage.itineraries);

    var currentStepIndex = parseInt(itineraries[itinerary].currentStep);
    var completedSteps = itineraries[itinerary].completedSteps;

    var numOfSteps = $progress.data('numsteps');
    console.log("Current step index = " + currentStepIndex);
    console.log("num steps = " + numOfSteps);
    var progressPercent = currentStepIndex / (numOfSteps - 1) * 100;
    $progress.find('.start + .line').css('width', progressPercent + '%');

    var $stepItems = $steps.children('li.step');

    $stepItems.each(function(index, element) {
      var $element = $(element);

      var position = $element.data('position');

      if(position === currentStepIndex) {
        $element.removeClass('state-locked').addClass('state-current');
      } else if($.inArray(position, completedSteps) !== -1) {
        $element.removeClass('state-locked').addClass('state-complete');
      }
    });
  }


  /*************************
   #page-itinerary-step
  *************************/

  function pageItineraryStep_onQuestionFormSubmit() {
    /*
     * Add .checked class to the ancestor (div.choice) of input:checked elements.
     * We need it in order to display the right and wrong answers (needed in page-step.less).
     */
    var $form = $('.question form');

    var $checked = $form.find('.choice input:checked');
    $checked.parents('.choice').addClass('checked');

    $('.question form').addClass('submitted');

    /*
     * Update localStorage to mark this step as completed
     * by adding the index of the step to completedSteps (array).
     */
    var itineraries = JSON.parse(window.localStorage.itineraries);

    var $section = $('section');

    var stepIndex = parseInt($section.data('stepindex'));
    var itinerary = $section.data('itinerary');

    if($.inArray(stepIndex, itineraries[itinerary].completedSteps) === -1) {
      itineraries[itinerary].completedSteps.push(stepIndex);
    }

    window.localStorage.itineraries = JSON.stringify(itineraries);

    return false;
  }

  function initPageItineraryStep() {
    // update the current step in localStorage
    var itineraries = JSON.parse(window.localStorage.itineraries);

    var $section = $('section');

    var stepIndex = parseInt($section.data('stepindex'));
    var itinerary = $section.data('itinerary');

    itineraries[itinerary].currentStep = stepIndex;

    window.localStorage.itineraries = JSON.stringify(itineraries);


    /*
     * In order to complete a step, the user must either:
     * - Visit this step, if it contains no question.
     * - Complete the question of the step (successfully or unsuccessfully).
     */
    if($('.question').length === 0) {
      // no question, the step is considered as completed
      if($.inArray(stepIndex, itineraries[itinerary].completedSteps) === -1) {
        itineraries[itinerary].completedSteps.push(stepIndex);
      }

      window.localStorage.itineraries = JSON.stringify(itineraries);

    } else {
      /*
       * There is a question, the form handler will take care of
       * marking the step as completed once the form has been submitted.
       */
      $('.question form').submit(pageItineraryStep_onQuestionFormSubmit);
    }
  }


  /*************************
   #page-share
  *************************/

  function pageShare_initTwitter() {
    window.twttr = (function(d,s,id) {
      var js, fjs = d.getElementsByTagName(s)[0], t = window.twttr || {};
      
      if(d.getElementById(id)) {
        return;
      }

      js = d.createElement(s);
      
      js.id = id;
      js.src="https://platform.twitter.com/widgets.js";
      fjs.parentNode.insertBefore(js,fjs);

      t._e=[];
      t.ready=function(f){
        t._e.push(f);
      };
      
      return t;
    } (document,"script","twitter-wjs"));
  }

  function pageShare_initFacebook() {
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {
        return;
      }

      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    } (document, 'script', 'facebook-jssdk'));
  }

  function initPageShare() {
    pageShare_initTwitter();
    pageShare_initFacebook();
  }


  /*************************
   #page-itinerary-download
  *************************/
 
  function pageItineraryDownload_initLocalStorage() {
    if(!isLocalStorageSupported()) {
      // local storage not supported
      window.location = 'notsupported';
      return;
    }

    /*
     * localStorage must be filled with the following values:
     *
     * localStorage['itineraries'] = {
     *   'itinerary1': {
     *     'currentStep': 0,
     *     'steps': []
     *   }
     * }
     *
     * Where itinerary1 is the id of the itinerary we will enter.
     */

    var itineraryID = $('.downloader').data('itinerary');

    var itineraryDefaultData = {
      currentStep: 0,
      completedSteps: []
    };

    var itineraries = {};

    if(window.localStorage.itineraries !== undefined) {
      itineraries = JSON.parse(window.localStorage.itineraries);

      if(itineraries[itineraryID] === undefined) {
        // if the itinerary we are going to enter has never been entered
        itineraries[itineraryID] = itineraryDefaultData;
      }
    } else {

      // if we have never entered any itinerary before
      itineraries[itineraryID] = itineraryDefaultData;
    }

    window.localStorage.setItem('itineraries', JSON.stringify(itineraries));
  }


  function pageItineraryDownload_redirectToStep() {
    var url = $('.downloader').data('stepurl');
    var itinerary = $('.downloader').data('itinerary');
    var itineraries = JSON.parse(window.localStorage.itineraries);

    var stepIndex = itineraries[itinerary].currentStep;
    var step = $('.downloader').data('steps')[stepIndex];

    url = url + step;

    window.location = url;
  }

  function pageItineraryDownload_onProgress(e) {
    var $meter = $('#download-meter');

    var totalFiles = parseInt($meter.data('numfiles'));
    var filesDownloaded = parseInt($meter.data('filesdownloaded'));

    $meter.data('filesdownloaded', filesDownloaded + 1);

    var progressPercent = Math.round(filesDownloaded / totalFiles * 100);
    if(totalFiles === 0) {
      progressPercent = 0;
    }

    $('#download-meter span').css('width', progressPercent + '%');
  }

  function pageItineraryDownload_onCached(e) {
    pageItineraryDownload_redirectToStep();
  }

  function pageItineraryDownload_onNoUpdate(e) {
    $('#download-meter span').css('width', '100%');
    pageItineraryDownload_redirectToStep();
  }

  function pageItineraryDownload_onUpdateReady(e) {
    window.applicationCache.swapCache();
    pageItineraryDownload_redirectToStep();
  }

  function pageItineraryDownload_onError(e) {
    pageItineraryDownload_redirectToStep();
  }

  function initPageItineraryDownload() {
    if(
      !('applicationCache' in window) ||
      window.applicationCache === null
    ) {
      // local storage not supported
      window.location = 'notsupported';
      return;
    }

    window.applicationCache.addEventListener("progress", pageItineraryDownload_onProgress);
    window.applicationCache.addEventListener("cached", pageItineraryDownload_onCached);
    window.applicationCache.addEventListener("updateready", pageItineraryDownload_onUpdateReady);
    window.applicationCache.addEventListener("noupdate", pageItineraryDownload_onNoUpdate);
    window.applicationCache.addEventListener("error", pageItineraryDownload_onError);

    pageItineraryDownload_initLocalStorage();
  }

  $(document).ready(onDocumentReady);

})(jQuery);


