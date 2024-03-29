<?php 
namespace App\Classes\Form;
class Form
{
    public static function exists($type = 'POST') // Vérifie si une requête de type post ou get existe et retourne true si celle-ci existe, sinon elle retourne false
    {   
        switch($type)
        {
            case 'POST':
                return(!empty($_POST)) ? true : false;
            break;

            case 'GET':
                return(!empty($_GET)) ? true : false;
            default:
                return false;
            break;
        }
    }

    public static function get($item) // Obtient les données de chaque input d'un form
    {
        if(isset($_POST[$item]))
            return $_POST[$item];

            else if (isset($_GET[$item]))
                return $_GET[$item];
    }

}
?>