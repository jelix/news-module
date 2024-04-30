<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2007-2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  MIT
 */


class newsZone extends jZone {

    protected $_tplname='news';
    /*protected $_cacheTimeout = 60;
    protected $_useCache = true;*/

    protected function _prepareTpl()
    {
        $dao = jDao::get('news~news');
        $news = $dao->getBySlug($this->param('slug'));
        if (!$news) {
            jLog::log('News inconnu:'.$this->param('slug'));
        }
        $this->_tpl->assign('news',$news);
    }
}

