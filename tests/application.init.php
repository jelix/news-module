<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
 */

$appPath = __DIR__.'/';
require ($appPath.'vendor/autoload.php');

jApp::initPaths(
    $appPath
    //$appPath.'www/',
    //$appPath.'var/',
    //$appPath.'var/log/',
    //$appPath.'var/config/'
);
jApp::setTempBasePath(realpath($appPath.'temp/').'/');

require ($appPath.'vendor/jelix_app_path.php');

jApp::declareModulesDir(array(
                        __DIR__.'/modules/'
                    ));

jApp::declareModule(__DIR__.'/../news');

