<?php
assert(defined('ROOT'));


/*****************************
         DEPENDENCIES
*****************************/

require_once __DIR__ . '/Controllers.php';
require_once __DIR__ . '/Data.php';
require_once __DIR__ . '/I18N.php';


/*****************************
            CLASS
*****************************/

/*
 * The kernel is a singleton class responsible for handling routing.
 * It also setups localization (with I18N class) and Twig views.
 * Kernel::getInstance() creates a new kernel or returns the existing one.
 */

class Kernel {

  /*****************************
              STATIC
  *****************************/

  private static $instance = null;

  public static function getInstance() {
    if(Kernel::$instance === null) {
      Kernel::$instance = new Kernel();
    }

    return Kernel::$instance;
  }


  /*****************************
            ATTRIBUTES
  *****************************/

  private $app = null;
  private $I18N = null;

  /*
   * Example structure for $attributes:
   *
   * [
   *   "root" => "/path/to/the/project/directory",
   *
   *   "languages" => [ see I18N.php for more information... ],
   *
   *   "routes" => [
   *     [
   *       "path" => "/about",
   *       "type" => "GET",
   *       "controller" => "about"
   *     ],
   *
   *     [
   *       and so on...
   *     ]
   *   ]
   * ]
   */
  private $config = array();


  /*****************************
             METHODS
  *****************************/

  private function __construct() {
    // load config from data/config.json
    $this->config = Data::load('config');

    $_SERVER['REQUEST_SCHEME'] = 'https';
    $_SERVER['HTTPS'] = 'on';
    $_SERVER['SERVER_PORT'] = 443;

    date_default_timezone_set("Europe/Paris");

    // create Slim instance
    session_cache_limiter(false);
    session_start();

    $this->app = new \Slim\Slim(array(
      'templates.path' => 'core/views',
      'view' => new \Slim\Views\Twig(),
      'log.level' => \Slim\Log::ERROR,
      'log.enabled' => true,
      'log.writer' => new \Slim\Logger\DateTimeFileWriter(array(
        'path' => 'core/logs',
        'name_format' => 'Y-m-d'
      ))
    ));

    $this->bootViews();
    $this->bootI18N();
    $this->bootRoutes();
  }

  private function bootI18N() {
    $this->I18N = new I18N($this->config);
  }

  private function bootRoutes() {
    $app = $this->app;

    /*
     * Link each route listed in data/config.json[routes]
     * to a controller function located in Controller class (Controllers.php).
     */

    $app->notFound("Controllers::notFound");

    foreach($this->config['routes'] as $route) {
      switch($route['type']) {

        case 'GET':
          $app->get($route['path'], "Controllers::" . $route['controller']);
          break;

        case 'POST':
          $app->post($route['path'], "Controllers::" . $route['controller']);
          break;

        default: break;
      }
    }
  }

  private function bootViews() {
    $view = $this->app->view();

    $view->parserOptions = array(
      'charset' => 'utf-8',
      'cache' => realpath('core/views_cache'),
      'auto_reload' => true,
      'strict_variables' => true,
      'autoescape' => true
    );

    $view->parserExtensions = array(
      new \Slim\Views\TwigExtension(),
      'Twig_Extensions_Extension_I18n'
    );
  }

  public function run() {
    $this->app->run();
  }


  /*****************************
          GETTERS/SETTERS
  *****************************/

  public function getConfig() {
    return $this->config;
  }

  public function getI18N() {
    return $this->I18N;
  }

}

