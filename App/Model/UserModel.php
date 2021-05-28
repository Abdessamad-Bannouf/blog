<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{

        public function getUser($mail,$password){
            $getUserInfo = parent::SelectFilter(array('mail','password'),'user',"user = $mail AND password = $password");

            $ifUserExists = $getUserInfo->rowCount();
        }

        public function addUser($lastName,$firstName,$mail,$password){
            $addUser = parent::RequestInsert('user',array('lastName','firstName','mail','password','token','isAdmin'),array($lastName,$firstName,$mail,$password,'NULL',0));

            return $addUser;
        }
    }
?>

