<?php
/**
* @author      Laurent Jouanneau
* @copyright   2019 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     MIT
*/

/**
 */
class newsModuleInstaller extends \Jelix\Installer\Module\Installer {


    function install(\Jelix\Installer\Module\API\InstallHelpers $helpers) {
        $daoMapper = new jDaoDbMapper();
        $daoMapper->createTableFromDao("news~news");
        //$helpers->database()->createTableFromDao("news~news");
    }
}
