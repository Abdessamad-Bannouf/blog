<?php 
    namespace App\Classes\Date;

    class Date
    {
        public static function getDate() // Crée et retourne la date au formation AAAA-MM-JJ H:M:S
        {
            date_default_timezone_set('Europe/Paris');

            $date = date('Y-m-d H:i:s');

            return $date;
        }
    }
?>