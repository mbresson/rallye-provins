<?php
assert(defined('ROOT'));


/*****************************
         DEPENDENCIES
*****************************/

require_once __DIR__ . '/I18N.php';
require_once __DIR__ . '/Itineraries.php';
require_once __DIR__ . '/Kernel.php';


/*****************************
            CLASS
*****************************/

class View {

  /*****************************
              STATIC
  *****************************/

  /**
   * @return array
   * An array containing all the data needed by the template files.
   * - [I18N] (array) (from I18N class)
   * - [Router] (array) (from Kernel class)
   */
  public static function data() {
    $kernel = Kernel::getInstance();
    $I18N = $kernel->getI18N();
    $config = $kernel->getConfig();

    return array(
      'I18N' => array(
        'preferred_language' => $I18N->getPreferredLanguage(),
        'languages' => $I18N->getLanguages()
      ),

      'Router' => array(
        'routes' => $config['routes'],
        'root' => $config['root']
      )
    );
  }

  /**
   * @param string $title
   * The title of the page
   *
   * @param string $template
   * The name of the template file to render (without any extension)
   *
   * @param array $add_data
   * Additional data to transmit to the view
   *
   * Renders a template file with Twig.
   */
  public static function render($title, $template, $add_data = NULL) {
    $data = View::data();
    $data['page'] = array(
      'title' => $title,
      'id' => $template
    );

    $data['cookies'] = array();

    // if an itinerary is currently being run, add its id to the data
    $cookieItinerary = Itineraries::getItineraryFromCookie();

    if(is_string($cookieItinerary)) {
      $data['cookies']['itinerary'] = array(
        'id' => $cookieItinerary
      );
    }

    if(is_array($add_data)) {
      $data['data'] = $add_data;
    }

    $app = \Slim\Slim::getInstance();

    $app->view()->setData(
      'GLOB',
      $data
    );

    $app->render("page-$template.twig");
  }
}

