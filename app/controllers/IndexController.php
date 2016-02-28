<?php
/**
* Controller for Framework
*
* PHP version 5
*
* @category Class
* @package  Non_Non_Npn
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
namespace app\controllers;

use app\models\UserTable;
use FrameworkFrey\Controller;
use FrameworkFrey\Request;
use FrameworkFrey\Route;
/**
* Controller for Framework
*
* PHP version 5
*
* @category Class
* @package  Non_Non_Npn
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
Class IndexController extends Controller
{
    /**
    * IndexAction
    *
    * @return void
    */
    public function indexAction()
    {
        $u = new UserTable();
        $userReche = $u->findOne('login = ?', array('Pow'));
        $this->render("IndexController:main", $userReche);
    }
    /**
    * ShowPage
    *
    * @return void
    */
    public function showPage()
    {
        $this->render("TesteController:page");
    }
}
?>