<?php
/**
 * @author       Laurent Jouanneau
 * @copyright    2024 Laurent Jouanneau
 * @link         https://jelix.org
 * @licence      MIT
 */

use Jelix\AdminUI\SideBar\JelixLinkMenuItem;

class news_adminListener extends jEventListener
{

    protected $eventMapping = array(
        'adminui.loading' => 'onAdminUILoading',
    );

    /**
    *
    */
    function onmasteradminGetMenuContent ($event)
    {
        if(jAcl2::check('news.view') || jAcl2::check('news.manage')) {
            $item = new masterAdminMenuItem('news',
                                            jLocale::get('news_admin~acl.admin.menu.item'),
                                            jUrl::get('news_admin~default:index'),
                                            10, 'toplinks');
            $event->add($item);
        }

        /*if(jAcl2::check('news.manage.categories')) {
            $item = new masterAdminMenuItem('newscat',
                                            jLocale::get('news_admin~acl.admin.cat.menu.item'),
                                            jUrl::get('news_admin~newscat:index'),
                                            10, 'refdata');
            $event->add($item);
        }*/
    }

    /**
     * @param jEvent $event
     */
    public function onAdminUILoading($event)
    {
        if(jAcl2::check('news.view') || jAcl2::check('news.manage')) {
            /** @var \Jelix\AdminUI\UIManager $uim */
            $uim = $event->uiManager;

            $uim->sidebar()->addMenuItem(new JelixLinkMenuItem(
                jLocale::get('news_admin~acl.admin.menu.item'),
                'news_admin~default:index'
            ));
        }
    }
}
