<?php
/**
* @package
* @subpackage
* @author
* @copyright
* @link
* @licence  http://www.gnu.org/licenses/gpl.html GNU General Public Licence, see LICENCE file
*/

class defaultCtrl extends jController {
    /**
    *
    */
    function index() {
        $rep = $this->getResponse('html');
        $rep->body->assign('MAIN','<h1>Homepage</h1>');
        return $rep;
    }
}

