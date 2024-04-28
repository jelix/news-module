<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
 */
require (__DIR__.'/application.init.php');

// Commands for the user of the application
\Jelix\Scripts\ModulesCommands::run();

