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
use PDO;
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
class Model
{
    private static $_driver;
    private static $_host;
    private static $_database;
    private static $_username;
    private static $_password;
    private static $_unix_socket;
    protected static $pdo;
    /**
    * Construct
    *
    * @return void
    */
    public function __construct()
    {
        $info = parse_ini_file(dirname(__FILE__) . "/../../app/config.ini");
        self::$_driver = $info["driver"];
        self::$_host = $info["host"];
        self::$_database = $info["database"];
        self::$_username = $info["username"];
        self::$_password = $info["password"];
        self::$_unix_socket = $info["unix_socket"];

        try
        {
            if (self::$_unix_socket == '') {
                self::$pdo = new PDO(self::$_driver . ':host=' . self::$_host . ';dbname=' . self::$_database, self::$_username, self::$_password);
            } else {
                self::$pdo = new PDO(self::$_driver . ':host=' . self::$_host . ';dbname=' . self::$_database . ';unix_socket=' . self::$_unix_socket, self::$_username, self::$_password);
            }
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>