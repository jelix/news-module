<?php

/**
 * @package		www.jelix.org
 * @subpackage   news
 * @author    Laurent Jouanneau
 * @copyright 2007-2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  MIT
 */


class listNewsZone extends jZone {

    protected $_tplname='listnews';
    protected $_cacheParams = array ('lang');
    protected $_cacheTimeout = 60;
    protected $_useCache = true;

    protected function _prepareTpl(){
        $dao = jDao::get('news');
        $this->_tpl->assign('listnews',$dao->findAllByLang($this->param('lang','en_US')));
    }
}

?>