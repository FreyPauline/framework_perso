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
Class Route
{
    public static $mode = "rewrite";

    /**
    * Parse
    *
    * @param string; $str url
    *
    * @return array; $tab request result
    */
    public static function parse($str)
    {
        $tab = explode("/", trim($str, "/"));
        array_unshift($tab, 'inutle,');
        foreach ($tab as $key => $part) {
            if ($key % 2 === 0) {
                $cle = $part;
            } else {
                Request::set($cle, $part);
            }
        }
        return $tab[1];
    }
    /**
    * Assets
    *
    * @param string; $path path
    *
    * @return array; $data request result
    */
    public static function assets($path)
    {
        $basePath = substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
        return $basePath . "Views/image/" . $path;
    }
}
?>