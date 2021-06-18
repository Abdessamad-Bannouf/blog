<?php 
    namespace App\Classes\Date;

    class Date
    {
        public static function GetDate() // Crée et retourne la date au formation AAAA-MM-JJ H:M:S
        {
            date_default_timezone_set('Europe/Paris');


            // Affichage de quelque chose comme : Monday
            
            // Affichage de quelque chose comme : Monday 8th of August 2005 03:12:46 PM
            $date = date('Y-m-d H:i:s');

            return $date;
        }
    }
?>