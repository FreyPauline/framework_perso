<?php
/**
* Lib for Framework
*
* PHP version 5
*
* @category Class
* @package  Non_Non_Npn
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
namespace FrameworkFrey;
use FrameworkFrey\Controller;
/**
* Lib for Framework
*
* PHP version 5
*
* @category Class
* @package  Non_Non_Npn
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
class ErrorController extends Controller
{
    /**
    * GetViewFile
    *
    * @param string; $controView view who want return
    *
    * @return void
    */
    public function getViewFile($controView)
    {
        $view = explode(':', $controView);

        $filename = dirname(__FILE__) . "/../../app/views/" . $view[0] . '/' . $view[1] . ".html";

        if (is_file($filename)) {
            return $filename;
        } else {
            return dirname(__FILE__) . "/../../lib/FrameworkFrey/views/" . $view[0] . '/' . $view[1] . ".html";
        }
    }

    /**
    * Error404
    *
    * @return void
    */
    public function error404()
    {
        header("HTTP/1.1 404 Not Found");

        $this->render('error:404');
    }
    /**
    * Error500
    *
    * @return void
    */
    public function error500()
    {
        header("HTTP/1.1 500 Internal Server Error");

        $this->render('error:500');
    }

}