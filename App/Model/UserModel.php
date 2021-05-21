<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{
        public function getUser($mail,$password){
            $getUserInfo = parent::SelectFilter(array('mail','password'),'user',array('mail','password'),array($mail,$password));
        }
?>
