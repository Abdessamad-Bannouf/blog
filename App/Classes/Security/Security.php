<?php 
namespace App\Classes\Security;

class Security
{
    public function hashPassword($password)
    {
        $finalPassword = password_hash($password,PASSWORD_BCRYPT);

        return $finalPassword;
    }

    public function decryptPassword($formPassword, $DBPassword){
        return password_verify($formPassword, $DBPassword);

    }
}
?>