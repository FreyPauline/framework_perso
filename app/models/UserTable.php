<?php
/**
* Model userTable for Framework
*
* PHP version 5
*
* @category Class
* @package  Non_Non_Npn
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
namespace app\models;
use FrameworkFrey\Model;
/**
* Model userTable for Framework
*
* PHP version 5
*
* @category Class
* @package  Non_Non_Npn
* @author   Frey Pauline <pauline1.frey@epitech.eu>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.nononon.com
*/
class UserTable extends Model
{
    /**
    * FindOne
    *
    * @param string; $str string whit param of requette
    * @param array;  $tab array whit key of search
    *
    * @return array; $dataUser request result
    */
    public function findOne($str, $tab = array())
    {
        $nbParam = substr_count($str, '?');
        $nbParamTab = count($tab);
        if ($nbParam == $nbParamTab) {
            $selectUser = "SELECT * FROM user WHERE " . $str ;
            $requeteUser =  parent::$pdo->prepare($selectUser);
            for ($i=0; $i < count($tab); $i++) {
                $requeteUser->bindValue($i + 1, $tab[$i]);
            }
            $requeteUser->execute();
            $dataUser = $requeteUser->fetch();
            return $dataUser;
        } else {
            echo "<p>Le nombre de paramètre de recherche et de condition ne correspondent pas. <br> Les '?' dans la chaîne de caratère sont remplacé par le tableau de paramètre</p>";
        }
    }
}