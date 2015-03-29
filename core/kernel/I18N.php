<?php
assert(defined('ROOT'));


/*****************************
          CONSTANTS
*****************************/

// name of the cookie used to store the preferred language
// & name of the URL parameter used to change the preferred language
define('I18N_LOCALE_TAG', 'lc');

// 1 year
define('I18N_COOKIE_LIFETIME', (60 * 60 * 24 * 360));


/*****************************
            CLASS
*****************************/

/*
 * I18N is a class used to initialize gettext
 * and store information about the user's preferred language.
 * The preferred language is stored in a cookie.
 */

class I18N {

  /*****************************
            ATTRIBUTES
  *****************************/

  /*
   * Example structure for $languages:
   *
   * [
   *   "en" => [
   *     "name" => "English",
   *     "html" => "en",
   *     "code" => "en_US.UTF-8"
   *   ],
   *
   *   [
   *     and so on...
   *   ]
   * ]
   *
   * "name" is the name of the language as displayed to the user.
   * "html" is the language code inserted in <html lang="?">.
   * "code" is the language and encoding information needed by gettext.
   */
  private $languages = array();

  private $defaultLanguage = null;
  private $preferredLanguage = null;


  /*****************************
             METHODS
  *****************************/

  public function __construct($config) {
    $this->languages = $config['languages'];

    // the default language is the first item in the list of available languages
    $languageCodes = array_keys($this->languages);
    $this->defaultLanguage = $languageCodes[0];

    $language = $this->languages[$this->getPreferredLanguage()];

    setlocale(LC_ALL, $language['code']);

    bindtextdomain('default', 'core/l10n');
    textdomain('default');
  }

  /**
   * @param string $language
   * A language abbreviation code (e.g. en, fr)
   *
   * @retval bool
   */
  public function isLanguageSupported($language) {
    return in_array(
      $language,
      array_keys($this->languages)
    );
  }


  /*****************************
          GETTERS/SETTERS
  *****************************/
  
  /**
   * @param string $language
   * A language abbreviation code (e.g. en, fr)
   *
   * Stores the preferred language in a cookie.
   */
  public function setPreferredLanguage($language) {
    if($this->isLanguageSupported($language)) {
      $this->preferredLanguage = $language;

      $app = \Slim\Slim::getInstance();

      $app->setCookie(
        I18N_LOCALE_TAG,
        $language,
        time() + I18N_COOKIE_LIFETIME
      );
    }
  }

  /**
   * @return string
   * A language abbreviation code (e.g. en, fr)
   */
  public function getDefaultLanguage() {
    return $this->defaultLanguage;
  }

  /**
   * @return array
   */
  public function getLanguages() {
    return $this->languages;
  }

  /**
   * @return string
   * A language abbreviation code (e.g. en, fr)
   *
   * Retrieve the user's preferred language either from the URL or from a cookie.
   * If none of these options is available, fallbacks to the default language.
   */
  public function getPreferredLanguage() {
    if(!is_null($this->preferredLanguage)) {
      return $this->preferredLanguage;
    }

    $app = \Slim\Slim::getInstance();

    // first, use the URL locale parameter, if provided
    $get = $app->request->get(I18N_LOCALE_TAG);

    if(!is_null($get)) {
      if($this->isLanguageSupported($get)) {
        $this->setPreferredLanguage($get);

        return $get;
      }
    }

    // else, use the locale cooking if existing
    $cookie = $app->getCookie(I18N_LOCALE_TAG);

    if(!is_null($cookie)) {
      if($this->isLanguageSupported($cookie)) {
        return $cookie;
      }
    }

    // no preferred language, fallback to default one
    return $this->getDefaultLanguage();
  }
}

