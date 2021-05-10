<?php 
    namespace App\Classes\Session;

    class Session
    {
        private $Session;

        public function __construct($Session = array()) // Crée un objet qui va contenir les différentes sessions
        {
            $this->Session[] = $Session;
        }

        public function GetSession() // Crée la ou les session(s)
        {
            for($i=0;$i<count($this->Session);$i++)
                $this->Session[$i] = $_SESSION[$i];
        }

        public function DeleteSession() // Détruit la ou les session(s)
        {
            unset($this->Session);
        }
    }
?>