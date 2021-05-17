<?php 
    namespace App\Classes\Session;

    class Session
    {
        private $session;

        public function __construct($session = array()) // Crée un objet qui va contenir les différentes sessions
        {
            $this->session[] = $session;
            
        }

        public function GetSession() // Crée la ou les session(s)
        {
            foreach($this->session as $key => $session){
                $session[$key] = $_SESSION[$key];var_dump($session['lastName']);
            }
        }

        public function DeleteSession() // Détruit la ou les session(s)
        {
            unset($this->session);
        }
    }
?>