<?php

class Language
{
    private $currentLang = '';
    private $allLangs = ['lt', 'en', 'ru', 'pl'];

    public function __construct()
    {
        if (isset($_GET['lang']) && $this->_langIsAvailable($_GET['lang'])) {
            setcookie("lang", $_GET['lang'], time() + 3600 * 24 * 30);
            $this->currentLang = $_GET['lang'];
            return;
        }

        if (isset($_COOKIE['lang'])
            && $this->_langIsAvailable($_COOKIE['lang'])
        ) {
            $this->currentLang = $_COOKIE['lang'];
            return;
        }

        if (empty($this->currentLang)) {
            $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            if ($this->_langIsAvailable($browserLang)) {
                $this->currentLang = $browserLang;
                return;
            }
        }
        $this->currentLang = 'en';
    }

    public function getCurrentLang()
    {
        return $this->currentLang;
    }

    private function _langIsAvailable($lang)
    {
        return in_array($lang, $this->allLangs) && $this->_langFileExist($lang);
    }


    private function _langFileExist($lang)
    {
        return file_exists('langs/' . strtolower($lang . '.php'));

    }
}