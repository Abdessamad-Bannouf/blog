<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{
        public function getUser($mail,$password){
            $getUserInfo = parent::SelectFilter(array('mail','password'),'user',"user = $mail AND password = $password");
            var_dump($getUserInfo);
        }
    }
?>
