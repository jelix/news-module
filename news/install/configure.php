<?php
/**
 * @author      Laurent Jouanneau
 * @copyright   2019 Laurent Jouanneau
 * @link        http://www.jelix.org
 * @licence     MIT
 */

/**
 */
class newsModuleConfigurator extends \Jelix\Installer\Module\Configurator
{

    public function getDefaultParameters()
    {
        return array('pathinfo' => '/news');
    }

    public function configure(\Jelix\Installer\Module\API\ConfigurationHelpers $helpers)
    {
        $this->parameters['pathinfo'] = $helpers->cli()->askInformation(
            "Url path to access to the module:",
            $this->parameters['pathinfo']);

        $helpers->getMainEntryPoint()->getUrlMap()->addUrlInclude(
            $this->parameters['pathinfo'], 'news', 'urls.xml');
    }
}