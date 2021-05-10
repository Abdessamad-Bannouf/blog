<?php 
    namespace App\Classes\Date;

    class Date
    {
        public static function GetDate() // Crée et retourne la date au formation AAAA-MM-JJ H:M:S
        {
            $Date = getdate();

            $RealHours = $Date['hours']+1;
            $RealSeconds = $Date['seconds'];
            if($RealSeconds >= 0 AND $RealSeconds <= 10)
                $RealSeconds = '0'.$RealSeconds;

            $Date = $Date['year'].'-'.$Date['mon'].'-'.$Date['mday'].' '.$RealHours.':'.$Date['minutes'].':'.$RealSeconds; 
            $Date = \DateTime::createFromFormat('Y-m-d H:i:s',$Date);  
            $Date = $Date->format('Y-m-d H:i:s');var_dump($Date);


            return $Date;
        }
    }
?>