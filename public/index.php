<?php
/**
* Index of Framework
*
* PHP version 5
*
* @category Class
* @package  Non_Non_Npn
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
define('PUBLICS', dirname(__FILE__));
define('ROOT', dirname(PUBLICS));
define('SEPARATOR', DIRECTORY_SEPARATOR);
define('FRAMEWORK', ROOT . SEPARATOR . 'lib');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
ini_set("display_errors", 1);
require FRAMEWORK . "/FrameworkFrey/Core.php";
FrameworkFrey\Core::run();

?>