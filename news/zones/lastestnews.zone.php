<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2007-2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  MIT
 */



class lastestNewsZone extends jZone {

    protected $_tplname='lastestnews';
    protected $_cacheParams = array ('lang');
    protected $_cacheTimeout = 60;
    protected $_useCache = true;

    protected function _prepareTpl(){

        $dao = jDao::get('news');
        $this->_tpl->assign('news',$dao->getFirstByLang($this->param('lang','en_US')));
    }
}

?>