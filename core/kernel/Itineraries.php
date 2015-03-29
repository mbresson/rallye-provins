<?php
assert(defined('ROOT'));


/*****************************
         DEPENDENCIES
*****************************/

require_once __DIR__ . '/Data.php';


/*****************************
          CONSTANTS
*****************************/

// name of the cookie used to store the itinerary
define('ITINERARY_TAG', 'itinerary');

// 5 days
define('ITINERARY_COOKIE_LIFETIME', (60 * 60 * 24 * 5));


/*****************************
            CLASS
*****************************/

class Itineraries {

  /*****************************
              STATIC
  *****************************/

  /**
   * @param string $itinerary
   * The name of an itinerary, as stored in data/itineraries folder.
   * E.g. "long-adultes-secrets-fortifies".
   *
   * @return bool
   * True if $itinerary exists, false otherwise.
   */
  public static function exists($itinerary) {
    return Data::exists("itineraries/$itinerary/contents");
  }

  /**
   * @return string
   * The code of the current itinerary, or NULL if there is no cookie bearing the information.
   */
  public static function getItineraryFromCookie() {
    $app = \Slim\Slim::getInstance();

    $cookieData = $app->getCookie(ITINERARY_TAG);

    if(!is_string($cookieData)) {
      return NULL;
    }

    return $cookieData;
  }

  public static function setItineraryInCookie($itinerary) {
    $app = \Slim\Slim::getInstance();

    $app->setCookie(
      ITINERARY_TAG,
      $itinerary,
      time()+ ITINERARY_COOKIE_LIFETIME
    );
  }
}


