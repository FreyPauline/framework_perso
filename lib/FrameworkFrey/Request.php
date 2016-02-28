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
class Request
{

    protected static $data = array();
    /**
    * Slet
    *
    * @param string; $key key
    * @param string; $val val
    *
    * @return array; $data request result
    */
    public static function set($key, $val)
    {

        self::$data[$key] = $val;
    }
    /**
    * Get
    *
    * @param string; $val val
    *
    * @return array; $data request result
    */
    public static function get($val)
    {
        if (isset(self::$data[$val])) {
            return self::$data[$val];
        } else {
            return false;
        }
    }
    /**
    * All
    *
    * @return array; $data request result
    */
    public static function all()
    {
        return self::$data;
    }

}




?>