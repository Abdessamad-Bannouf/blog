<?php 
namespace App\Classes\Regex;

class Regex
{
    private $verifMail;
    private $verifPassword;
    private $verifName;

    public function __construct() // Tableau associatif qui va contenir les différents inputs d'un form
    {
        $this->verifMail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        $this->verifPassword = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        $this->verifName = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{3,20}$/";
    }

    public function verifMail($mail)
    {
        if(isset($mail))
            $mail = htmlspecialchars($mail);

            return preg_match($this->verifMail,$mail);   
    }

    public function verifPassword($password)
    {
        if(isset($password))
            $password = htmlspecialchars($password);

        return preg_match($this->verifPassword,$password);
    }

    public function verifFirstName($firstName)
    {
        if(isset($firstName))
            $firstName = htmlspecialchars($firstName);

        return preg_match($this->verifName,$firstName);
    }

    public function verifLastName($lastName)
    {
        if(isset($lastName))
            $lastName = htmlspecialchars($lastName);
            
        return preg_match($this->verifName,$lastName);
    }
}
?>