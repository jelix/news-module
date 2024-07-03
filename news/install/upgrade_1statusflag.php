<?php
/**
 * @author     Laurent Jouanneau
 * @copyright  2024 Laurent Jouanneau
 * @licence    MIT
 */

class newsModuleUpgrader_1statusflag extends \Jelix\Installer\Module\Installer {

    protected $targetVersions = array('2.0.0-rc.2');
    protected $date = '2024-07-03';

    function install(\Jelix\Installer\Module\API\InstallHelpers $helpers)
    {
        $db = $helpers->database();
        $db->execSQLScript('sql/statusflag');
    }
}