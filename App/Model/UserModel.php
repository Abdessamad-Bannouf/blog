<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{
        public function getRegister($mail,$password){
            $getUserInfo = parent::SelectFilter(array('mail','password'),'user',"user = $mail AND password = $password");

            $ifUserExists = $getUserInfo->rowCount();

            var_dump($getUserInfo);
        }
    }
?>