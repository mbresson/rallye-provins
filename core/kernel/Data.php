<?php
assert(defined('ROOT'));


/*****************************
         DEPENDENCIES
*****************************/

require_once __DIR__ . '/Kernel.php';
require_once __DIR__ . '/I18N.php';


/*****************************
            CLASS
*****************************/

/*
 * Data class contains utilities needed to load data from files
 * and other utilities to output it to HTML.
 */

class Data {

  /*****************************
              STATIC
  *****************************/

  /**
   * @return bool
   * True if the data file exists, false otherwise.
   */
  public static function exists($filename) {
    return file_exists("data/$filename.json");
  }

  /**
   * @param string $filename
   * the name of the config file to decode, excluding its extension
   *
   * @return array
   * the data loaded from the file, or NULL if this file doesn't exist
   *
   * Example usage: $cache = Data::load('cache') loads file data/cache.json.
   */
  public static function load($filename) {
    if(!file_exists("data/$filename.json")) {
      return NULL;
    }

    $contents = json_decode(file_get_contents("data/$filename.json"), true);

    return $contents;
  }

  /**
   * @param string $filename
   * the name of the config file to decode, excluding its extension
   *
   * @return array
   * the configuration loaded from the file, or NULL if it doesn't exist
   *
   * Example usage: $cache = Data::load('itineraries/example/information/information')
   * loads two files and merges their content:
   *
   * - data/itineraries/example/information/common/information.json (language-independent information)
   * - data/itineraries/example/information/fr/information.json (information in French, if the user's language is French)
   */
  public static function loadTranslated($filename) {
    $indexSep = strrpos($filename, '/') + 1;
    $directory = substr($filename, 0, $indexSep);
    $filename = substr($filename, $indexSep);

    $kernel = Kernel::getInstance();
    $I18N = $kernel->getI18N();
    $language = $I18N->getPreferredLanguage();

    $pathTranslation = $directory . "$language/$filename";

    $data = array();

    if(Data::exists($pathTranslation)) {
      $data = Data::load($pathTranslation);
    } else {
      $fallbackLanguage = $I18N->getDefaultLanguage();
      $pathFallback = $directory . "$fallbackLanguage/$filename";

      $data = Data::load($pathFallback);
      if(is_null($data)) {
        return NULL;
      }
    }

    $pathCommon = $directory . "common/$filename";
    if(Data::exists($pathCommon)) {
      $common = Data::load($pathCommon);
      $data = array_merge($data, $common);
    }

    return $data;
  }
}
