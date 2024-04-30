<?php

/**
 * @author    Laurent Jouanneau
 * @copyright 2007-2024 Laurent Jouanneau
 * @link     http://jelix.org
 * @licence  http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
 */


class newsZone extends jZone {

    protected $_tplname='news';
    /*protected $_cacheTimeout = 60;
    protected $_useCache = true;*/

    protected function _prepareTpl(){
        $dao = jDao::get('news');
        $news = $dao->getByUrlId($this->param('urlid'));
        if (!$news) {
            jLog::log('News inconnu:'.$this->param('urlid'));
        }
        $this->_tpl->assign('news',$news);
    }
}

