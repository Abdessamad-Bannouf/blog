<?php 
    namespace App\Classes\Regex;

    class Regex
    {
        private $VerifMail;
        private $VerifPassword;
        private $VerifName;

        public function __construct($Inputs = array()) // Tableau associatif qui va contenir les différents inputs d'un form
        {
            $this->VerifMail = '%^[a-zA-Z]{3,10}%';
			$this->VerifPassword = '#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i';
			$this->VerifName = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
        }

        public function VerifMail()
        {
            return preg_match($VerifMail,Inputs['Mail']);
        }

        public function VerifPassword()
        {
            return preg_match($VerifPassword,Inputs['Password']);
        }

        public function VerifName()
        {
            return preg_match($VerifName,Inputs['Name']);
        }
    }
?>