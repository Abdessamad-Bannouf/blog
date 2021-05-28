<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{
        public function getUserInfo(){  
            $getUserInfo = parent::SelectFilter(array('lastName','firstName','mail','password','token','isAdmin'),'user',"mail = 'abdessamad.bannouf@laposte.net'"); 

            return $getUserInfo; 
        } 
    }
?>
