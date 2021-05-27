<?php 
    namespace App\Classes\Security;
    
    class Security{
        public function hashPassword($password){
            $finalPassword = password_hash($password,PASSWORD_BCRYPT);

            return $finalPassword;
        }
    }
?>