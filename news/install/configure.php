<?php
/**
 * @author      Laurent Jouanneau
 * @copyright   2019-2024 Laurent Jouanneau
 * @link        https://www.jelix.org
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
        $helpers->getMainEntryPoint()->getUrlMap()->addUrlInclude(
            $this->parameters['pathinfo'], 'news', 'urls.xml');
    }
}