<?php

use Jelix\AdminUI\SideBar\JelixLinkMenuItem;

class adminListener extends jEventListener
{
    protected $eventMapping = array(
        'adminui.loading' => 'onAdminUILoading',
    );

    /**
     * @param jEvent $event
     */
    public function onAdminUILoading($event)
    {
        /** @var \Jelix\AdminUI\UIManager $uim */
        $uim = $event->uiManager;

        $accountMenu = $uim->navbar()->accountMenu();
        if (!jAuthentication::isCurrentUserAuthenticated()) {
            // FIXME : ajouter url de la page en cours, en paramètre, pour url de retour,  si pas requete post
            $accountMenu->setNotAuthenticated(jAuthentication::getSigninPageUrl());

            return;
        }

        $user = jAuthentication::getCurrentUser();
        $accountMenu->setAuthenticated(
            $user->getUserId(),
            $user->getName(),
            jAuthentication::getSignoutPageUrl(),
            '#profile'
        );
        $uim->sidebar()->addMenuItem(new JelixLinkMenuItem('Droits', 'jacl2db_admin~groups:index', null, 'user-lock'));
    }
}
