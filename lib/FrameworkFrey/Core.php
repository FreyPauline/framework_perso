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
use FrameworkFrey\Route;
use FrameworkFrey\Model;
use FrameworkFrey\exceptions\NotFoundException;
use Exception;
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

Class Core
{
    /**
    * RegisterAutoload
    *
    * @param string; $className class for autoload
    *
    * @return void
    */
    public static function registerAutoload($className)
    {
        $class = explode('\\', $className);
        if ($class[0] == 'FrameworkFrey') {
            unset($class[0]);
            $chemin = implode("/", $class);
            $str = "/" . $chemin . '.php';
        } elseif ($class[0] == 'app') {
            $str = '../..' .BASE_URL . SEPARATOR . $className .".php";
            $str = str_replace('\\', '/', $str);
        }
        include $str;
    }
    /**
    * Run
    *
    * @return void
    */
    public static function run()
    {
        spl_autoload_register(array(__CLASS__, 'registerAutoload'));
        try{
            if (isset($_GET['page']) && is_file("../app/controllers/".ucfirst(urldecode($_GET['page']))."Controller.php")) {

                include "../app/controllers/".ucfirst(urldecode($_GET['page']))."Controller.php";

                if (isset($_GET['paramStr']) && $_GET['paramStr'] !== "/" && !empty($_GET['paramStr'])) {

                    $paramAction = Route::parse($_GET['paramStr']);

                    $controller = "app\\controllers\\" . ucfirst(urldecode($_GET['page']))."Controller";
                    if ($paramAction === $_GET['page']) {
                        $action = $paramAction . "Action";
                    } else {
                        $action = $paramAction;
                    }

                    self::dispatch($controller, $action);

                } else {
                    throw new NotFoundException();
                }
            } else {
                throw new NotFoundException();
            }
        } catch (Exception $e) {
            if ($e instanceof NotFoundException) {
                self::dispatch("FrameworkFrey\ErrorController", "error404");
            } else {
                self::dispatch("FrameworkFrey\ErrorController", "error500");
            }
        }
    }
    /**
    * Dispatch
    *
    * @param string; $class  controller
    * @param string; $method action of controller
    *
    * @return void
    */
    public static function dispatch($class, $method)
    {
        $class = new $class;
        if (method_exists($class, $method)) {
            $class->$method();
        } else {
            echo "Cette methode n'existe pas";
        }
    }
}

?>
