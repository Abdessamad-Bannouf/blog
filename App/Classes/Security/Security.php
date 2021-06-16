<?php 
    namespace App\Classes\Security;
    
    class Security{
        public function hashPassword($password){
            $finalPassword = password_hash($password,PASSWORD_BCRYPT);

            return $finalPassword;
        }

        public function decryptPassword($formPassword, $DBPassword){
            if(password_verify($formPassword, $DBPassword)) {
                echo 'Password is valid!';
            } 
                else {
                    echo 'Invalid password.';
                }
        }
    }
?>