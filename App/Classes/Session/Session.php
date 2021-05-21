<?php 
    namespace App\Classes\Session;

    class Session
    {
        private $name = array();
        private $value = array();

        public function __construct($name = array(), $value = array()){ // Crée un objet qui va contenir les différentes sessions
            $this->name = $name;
            $this->value = $value;
        }

        public function GetSession(){ // Crée la ou les session(s)
            for($i=0; $i<count($this->name); $i++){
                $_SESSION[$this->name[$i]] = $this->value[$i];
            }     
        }

        public function DeleteSession(){ // Détruit la ou les session(s)
            unset($this->session);
        }
    }
?>