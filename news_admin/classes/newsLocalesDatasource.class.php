<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  MIT
 */

class newsLocalesDatasource implements jIFormsDatasource
{
    protected $formId = 0;

    protected $data = array();

    protected $labelLang = 'en';

    function __construct($id)
    {
        $this->formId = $id;

        $dao = jDao::get('news~news');

        $tableInfos = $dao->getTables()['news'];
        $table = $tableInfos['realname'];
        $field = $dao->getProperties()['lang']['fieldName'];

        $this->labelLang = jLocale::getCurrentLang();
        if ($this->labelLang != 'fr') {
            $this->labelLang = 'en';
        }

        foreach(jApp::config()->availableLocales as $locale) {
            $this->data[$locale] = $this->getLocalName($locale);
        }

        $db = jDb::getConnection();
        $rs = $db->query('SELECT DISTINCT('.$field.') FROM '.$table);
        foreach ($rs as $rec) {
            if (!isset($this->data[$rec->lang])) {
                $this->data[$rec->lang] = $this->getLocalName($rec->lang);
            }
        }
    }

    protected function getLocalName($locale)
    {
        $pos = strpos($locale, '_');
        if ($pos !== false) {
            $lang = substr($locale, 0, $pos);
        }
        else {
            $lang = $locale;
        }
        return jLocale::getLangName($lang, $this->labelLang);
    }


    public function getData($form)
    {
        return ($this->data);
    }

    public function getLabel($key)
    {
        if(isset($this->data[$key])) {
            return $this->data[$key];
        }
        return null;
    }

}