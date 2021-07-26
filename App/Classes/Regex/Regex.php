<?php 
    namespace App\Classes\Regex;

    class Regex
    {
        private $VerifMail;
        private $VerifPassword;
        private $VerifFirstName;

        public function __construct() // Tableau associatif qui va contenir les différents inputs d'un form
        {
            $this->VerifMail = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';
			$this->VerifPassword = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/';
			$this->VerifName = '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/';
        }

        public function verifMail($mail)
        {
            if(isset($mail))
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