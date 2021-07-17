<?php 
    namespace App\Classes\Regex;

    class Regex
    {
        private $verifMail;
        private $verifPassword;
        private $verifFirstName;

        public function __construct($Inputs = array()) // Tableau associatif qui va contenir les différents inputs d'un form
        {
            $this->verifMail = '%^[a-zA-Z]{3,10}%';
			$this->verifPassword = '#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i';
			$this->verifName = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
        }

        public function verifMail($mail)
        {
            if(isset($_POST['mail']))
                $mail = htmlspecialchars($mail);

            return preg_match($this->VerifMail,$mail);
        }

        public function verifPassword($password)
        {
            if(isset($password))
                $password = htmlspecialchars($password);

            return preg_match($this->VerifPassword,$password);
        }

        public function verifFirstName($firstName)
        {
            if(isset($firstName))
                $firstName = htmlspecialchars($firstName);

            return preg_match($this->VerifFirstName,$firstName);
        }

        public function verifLastName($lastName)
        {
            if(isset($lastName))
                $lastName = htmlspecialchars($lastName);
                
            return preg_match($this->VerifLastName,$lastName);
        }
    }
?>