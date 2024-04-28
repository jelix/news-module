<?php
/**
 * @author       Laurent Jouanneau
 * @copyright   2024 Laurent Jouanneau
 * @link        https://www.jelix.org
 * @licence     MIT
 */

class news_adminModuleInstaller extends \Jelix\Installer\Module\Installer {

    function install(\Jelix\Installer\Module\API\InstallHelpers $helpers)
    {
        try {
            jAcl2DbManager::addSubject('news.view', 'news_admin~acl.view');
            jAcl2DbManager::addSubject('news.manage', 'news_admin~acl.manage');
        }
        catch(Exception $e) {
            
        }
    }
}