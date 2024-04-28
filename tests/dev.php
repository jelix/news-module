<?php
/**
 * @author   Laurent Jouanneau
 * @copyright 2024 Laurent Jouanneau
 * @link     https://jelix.org
 * @licence  http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
 */
use Jelix\DevHelper\JelixCommands;

require (__DIR__.'/application.init.php');

// Commands for the developer

$application = JelixCommands::setup();

// here you can add commands to $application


JelixCommands::launch($application);