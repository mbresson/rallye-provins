<?php
assert(defined('ROOT'));


/*****************************
         DEPENDENCIES
*****************************/

require_once __DIR__ . '/Cache.php';
require_once __DIR__ . '/Data.php';
require_once __DIR__ . '/Itineraries.php';
require_once __DIR__ . '/View.php';


/*****************************
            CLASS
*****************************/

class Controllers {

  /*****************************
              STATIC
  *****************************/

  private static function redirect404() {
    $app = \Slim\Slim::getInstance();
    $app->notFound();
  }

  public static function notFound() {
    View::render(_('Page not found'), '404');
  }

  public static function notSupported() {
    View::render(_('Ooops'), 'notsupported');
  }

  public static function home() {
    Controllers::start();
  }

  /*
   * Page summary:
   * lets the user choose his/her preferred language.
   */
  public static function start() {
    View::render(_('Start'), 'start');
  }

  /*
   * Page summary:
   * error message when offline and trying to access online pages.
   */
  public static function offline() {
    View::render(_('Offline'), 'offline');
  }

  public static function about() {
    $contactInformation = Data::load("contact");

    $data = array(
      'contact' => $contactInformation
    );

    View::render(_('About'), 'about', $data);
  }

  /*
   * Page summary:
   * contains sharing buttons for social networks.
   */
  public static function share() {
    $contactInformation = Data::load("contact");

    $data = array(
      'contact' => $contactInformation
    );

    View::render(_('Share'), 'share', $data);
  }

  /*
   * Page summary:
   * contains a list of all itineraries with a summary for each
   */
  public static function itineraries() {
    $data = array(
      'itineraries' => array()
    );

    $itineraries = Data::load('itineraries');

    foreach($itineraries['itineraries'] as $itinerary) {
      $data['itineraries'][$itinerary] = Data::loadTranslated("itineraries/$itinerary/information/information");
    }

    View::render(_('Itineraries'), 'itineraries', $data);
  }

  /*
   * Page summary:
   * shows detailed information about an itinerary before starting it.
   */
  public static function itinerarySummary($itinerary) {
    if(!Itineraries::exists($itinerary)) {
      Controllers::redirect404();
      return;
    }

    $data = array();

    $data['itinerary'] = Data::loadTranslated("itineraries/$itinerary/information/information");
    $data['itinerary']['id'] = $itinerary;

    $itineraryName = $data['itinerary']['name'];

    $itineraryContents = Data::load("itineraries/$itinerary/contents");
    $steps = array();
    foreach($itineraryContents['steps'] as $step) {
      $steps[$step] = Data::load("itineraries/$itinerary/steps/$step/common/contents");
    }

    $data['steps'] = $steps;

    View::render($itineraryName, 'itinerary-summary', $data);
  }

  /*
   * Page summary:
   * contains a list of each step in the itinerary and a progress indicator.
   */
  public static function itinerarySteps($itinerary) {
    if(!Itineraries::exists($itinerary)) {
      Controllers::redirect404();
      return;
    }

    $itineraryInformation = Data::loadTranslated("itineraries/$itinerary/information/information");

    if(is_null($itineraryInformation)) {
      Controllers::redirect404();
      return;
    }

    $itineraryName = $itineraryInformation['name'];

    $itineraryContents = Data::load("itineraries/$itinerary/contents");
    $steps = array();
    foreach($itineraryContents['steps'] as $step) {
      $stepContents = Data::loadTranslated("itineraries/$itinerary/steps/$step/contents");

      $steps[] = array(
        'name' => $stepContents['name'],
        'id' => $step
      );
    }

    $data = array(
      'itinerary' => array(
        'id' => $itinerary,
        'name' => $itineraryName
      ),

      'steps' => $steps
    );

    View::render($itineraryName, 'itinerary-steps', $data);
  }

  private static function itineraryMap($itinerary) {
    if(!Itineraries::exists($itinerary)) {
      Controllers::redirect404();
      return;
    }

    $itineraryInformation = Data::loadTranslated("itineraries/$itinerary/information/information");

    if(is_null($itineraryInformation)) {
      Controllers::redirect404();
      return;
    }

    $itineraryName = $itineraryInformation['name'];

    $itineraryContents = Data::load("itineraries/$itinerary/contents");
    $steps = array();
    foreach($itineraryContents['steps'] as $step) {
      $steps[$step] = Data::loadTranslated("itineraries/$itinerary/steps/$step/contents");
      unset($steps[$step]['contents']);
      unset($steps[$step]['question']);
    }

    $data = array(
      'itinerary' => array(
        'id' => $itinerary,
        'name' => $itineraryName
      ),

      'steps' => $steps
    );

    View::render(_('Map'), 'map', $data);
  }

  /*
   * Page summary:
   * displays a map based on Google Maps API.
   * If an itinerary has been started, show all its steps on the map.
   */
  public static function map() {
    $cookieItinerary = Itineraries::getItineraryFromCookie();

    if(is_string($cookieItinerary)) {
      Controllers::itineraryMap($cookieItinerary);
      return;
    }

    View::render(_('Map'), 'map');
  }

  /*
   * Page summary:
   * downloads all pages that must be available offline.
   *
   * @param string $lang
   * The code of the user's preferred language.
   * Actually, it is a dummy parameter needed to generate a cache manifest for a specific language.
   * (see Cache.php for more information).
   */
  public static function itineraryDownload($lang) {
    $app = \Slim\Slim::getInstance();
    $kernel = Kernel::getInstance();

    $getData = $app->request()->get();
    if(empty($getData['itinerary'])) {
      Controllers::redirect404();
      return;
    }

    $itinerary = $getData['itinerary'];

    if(!Itineraries::exists($itinerary)) {
      Controllers::redirect404();
      return;
    }

    Itineraries::setItineraryInCookie($itinerary);

    $itineraryInformation = Data::loadTranslated("itineraries/$itinerary/information/information");

    $itineraryContents = Data::load("itineraries/$itinerary/contents");

    $itineraryName = $itineraryInformation['name'];

    $numCachedFiles = Cache::generate($itinerary);

    $config = $kernel->getConfig();
    $root = $config['root'];

    $data = array(
      'itinerary' => array(
        'id' => $itinerary,
        'name' => $itineraryName,
        'steps' => $itineraryContents['steps']
      ),

      'cache' => array(
        'path' => $root . "data/itineraries/$itinerary/cache-" . $kernel->getI18N()->getPreferredLanguage() . ".manifest",
        'numFiles' => $numCachedFiles
      )
    );

    View::render(_('Download'), 'itinerary-download', $data);
  }

  public static function itineraryStep($itinerary, $step) {
    if(!Itineraries::exists($itinerary)) {
      Controllers::redirect404();
      return;
    }

    $itineraryContents = Data::load("itineraries/$itinerary/contents");
    $itineraryInformation = Data::loadTranslated("itineraries/$itinerary/information/information");

    $stepPath = "itineraries/$itinerary/steps/$step/contents";

    // the step doesn't exist
    if(!in_array($step, $itineraryContents['steps'])) {
      Controllers::redirect404();
      return;
    }

    // the step is missing
    $stepContents = Data::loadTranslated($stepPath);
    if(is_null($stepContents)) {
      Controllers::redirect404();
      return;
    }

    $itineraryName = $itineraryInformation['name'];
    $stepName = $stepContents['name'];

    $data = array(
      'itinerary' => array(
        'id' => $itinerary,
        'name' => $itineraryName,
        'contents' => $itineraryContents
      ),

      'step' => array(
        'id' => $step,
        'name' => $stepName,
        'position' => array_search($step, $itineraryContents['steps']),
        'contents' => $stepContents
      )
    );

    View::render(_('Step'), 'itinerary-step', $data);
  }

}

