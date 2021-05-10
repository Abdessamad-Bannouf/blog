<?php 
    namespace App\Classes\Form;
    
    class Form
    {
        public static function Exists($Type = 'post') // Vérifie si une requête de type post ou get existe et retourne true si celle-ci existe, sinon elle retourne false
        {   
            switch($Type)
            {
                case 'post':
                    return(!empty($_POST)) ? true : false;
                break;

                case 'get':
                    return(!empty($_GET)) ? true : false;
                default:
                    return false;
                break;
            }
        }

        public static function Get($Item) // Obtient les données de chaque input d'un form
        {
            if(isset($_POST[$Item]))
                return $_POST[$Item];

                else if (isset($_GET[$Item]))
                    return $_GET[$Item];
        }
    
    }
?>