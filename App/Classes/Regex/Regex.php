<?php 
    namespace App\Classes\Regex;

    class Regex
    {
        private $VerifMail;
        private $VerifPassword;
        private $VerifFirstName;

        public function __construct($Inputs = array()) // Tableau associatif qui va contenir les différents inputs d'un form
        {
            $this->VerifMail = '%^[a-zA-Z]{3,10}%';
			$this->VerifPassword = '#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i';
			$this->VerifName = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
        }

        public function VerifMail($mail)
        {
            if(isset($_POST['mail']))
                $mail = htmlspecialchars($mail);

            return preg_match($this->VerifMail,$mail);
        }

        public function VerifPassword($password)
        {
            if(isset($password))
                $password = htmlspecialchars($password);

            return preg_match($this->VerifPassword,$password);
        }

        public function VerifFirstName($firstName)
        {
            if(isset($firstName))
                $firstName = htmlspecialchars($firstName);

            return preg_match($this->VerifFirstName,$firstName);
        }

        public function VerifLastName($lastName)
        {
            if(isset($lastName))
                $lastName = htmlspecialchars($lastName);
                
            return preg_match($this->VerifLastName,$lastName);
        }
    }
?>