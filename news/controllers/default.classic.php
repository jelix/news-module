<?php
/**
 * @author    Laurent Jouanneau
 * @copyright 2007-2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  MIT
 */

class defaultCtrl extends jController {
    /**
     *
     */
    function index()
    {
        $lang = jApp::config()->locale;
        if ($lang == 'fr_FR') {
            $link_lang = array('news~default:index', array('lang' => 'en_US'));
        } else {
            $link_lang = array('news~default:index', array('lang' => 'fr_FR'));
        }

        $offset = $this->intParam('o', 0, true);

        $rep = $this->getResponse('html');
        $rep->addMetaDescription(jLocale::get('news.description'));
        $rep->body->assign('page_title', jLocale::get('news.page_title'));
        $rep->body->assignZone('MAIN','news~listnews', array('lang'=>$lang, 'offset' => $offset));
        $rep->body->assign('heading','news');
        $rep->body->assign('link_lang', $link_lang);

        $rsslink = htmlspecialchars(jUrl::get('news~default:rss',array('lang'=>$lang),1));
        $rsstitle = htmlspecialchars(jLocale::get('news.link.title.rss'));
        $rep->addHeadContent('<link rel="alternate" type="application/rss+xml" title="'.$rsstitle.'" href="'.$rsslink.'" />');
        return $rep;
    }

    function article() {
        $lang = jApp::config()->locale;

        $url = $this->param('newsid');
        if ($url == null) {
            $rep = new jResponseRedirect();
            $rep->action = 'news~index';
            return $rep;
        }
        $dao = jDao::get('news');
        $news = $dao->getBySlugAndOnline($url);
        if (!$news) {
            throw new jHttp404NotFoundException("Article not found");
        }

        if ($lang == 'fr_FR')
            $link_lang = array('news~default:index',array('lang'=>'en_US'));
        else
            $link_lang = array('news~default:index',array('lang'=>'fr_FR'));

        $rep = $this->getResponse('html');
        $rep->addMetaDescription(jLocale::get('news.description'));
        $rep->body->assign('page_title',jLocale::get('news.page_title'));
        $rep->body->assignZone('MAIN','news~news', array(
            'news'=>$news, 'slug'=>$url,'lang'=>$lang));
        $rep->body->assign('heading','news');
        $rep->body->assign('link_lang', $link_lang);
        return $rep;
    }

    function rss(){
        $lang = jApp::config()->locale;
        if ($lang == 'fr_FR') {
            $link_param = array('lang' => 'fr_FR');
        }
        else {
            $link_param = array('lang' => 'en_US');
        }

        $rep = $this->getResponse('rss2.0');
        $rep->infos->title = jLocale::get('news.page_title');
        $rep->infos->webSiteUrl= jUrl::getFull('news~default:index', $link_param);
        $rep->infos->description = jLocale::get('news.description');

        if (isset(jApp::config()->news['copyright'])) {
            $rep->infos->copyright = jApp::config()->news['copyright'];
        }

        $newsdao = jDao::get('news');
        $first = $newsdao->getFirstOnlineByLang($lang);

        $rep->infos->updated = $first->date_create;
        $rep->infos->published = $first->date_create;
        $rep->infos->ttl=60;

        $list = $newsdao->findOnlineByLang($lang, 0, 15);
        foreach($list as $news){
            $url = jUrl::getFull('news~default:article', array('newsid'=>$news->slugurl, 'lang'=>$lang));
            $item = $rep->createItem($news->title,$url, $news->date_create);
            $item->published = $news->date_create;
            $item->authorName = $news->author;
            if($news->abstract =='')
                $item->content = $news->content;
            else
                $item->content = $news->abstract;
            $item->contentType='html';
            $item->idIsPermalink = false;
            $rep->addItem($item);
        }
        return $rep;
    }

}
