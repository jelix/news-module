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
    protected $_cacheParams = array ('lang', 'offset', 'pageSize');
    protected $_cacheTimeout = 60;
    protected $_useCache = false;

    protected function _prepareTpl(){
        $dao = jDao::get('news');
        $pageSize = $this->param('pageSize', 10);
        $offset =  $this->param('offset', 0);
        $lang = $this->param('lang','en_US');

        $this->_tpl->assign('listnews', $dao->findByLang($lang, $offset, $pageSize));
        $this->_tpl->assign('page', $offset > 0 ? $offset : null);
        $this->_tpl->assign('pageSize', $pageSize);
        $this->_tpl->assign('recordCount', $dao->countByLang($lang));
    }
}

?>