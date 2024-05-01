<?php
/**
 * @author       Laurent Jouanneau
 * @copyright   2024 Laurent Jouanneau
 * @link        https://www.jelix.org
 * @licence     MIT
 */

use Jelix\Installer\Module\API\ConfigurationHelpers;
use Jelix\Routing\UrlMapping\EntryPointUrlModifier;
use Jelix\Routing\UrlMapping\MapEntry\ModuleUrl;

class news_adminModuleConfigurator extends \Jelix\Installer\Module\Configurator
{
    public function getDefaultParameters()
    {
        return array( );
    }

    public function declareUrls(EntryPointUrlModifier $registerOnEntryPoint)
    {
        $registerOnEntryPoint->havingNameIfExists(
            'admin',
            array(
                new ModuleUrl('/newsadmin')
            )
        )
        ;
    }

    public function configure(ConfigurationHelpers $helpers)
    {

    }

}
