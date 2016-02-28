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
abstract class Controller
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

        return dirname(__FILE__) . "/../../app/views/" . $view[0] . '/' . $view[1] . ".html";
    }

    /**
    * Render
    *
    * @param string; $controView view who want return
    * @param array;  $params     array whit param
    *
    * @return void
    */
    public function render($controView, $params = null)
    {
        $filename = $this->getViewFile($controView);
        if ($params !== null) {
            $file = fopen($filename, 'r');
            $size = filesize($filename);
            $filestr = fread($file, $size);
            foreach ($params as $key => $value) {
                $filestr = str_replace('{{ '.$key.' }}', $value, $filestr);
            }
            echo $filestr;
        } else {
            include $filename;
        }
    }
}
?>