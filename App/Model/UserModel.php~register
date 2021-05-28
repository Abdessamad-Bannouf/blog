<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{

        public function addUser($lastName,$firstName,$mail,$password){  
            $addUser = parent::RequestInsert('user',array('lastName','firstName','mail','password','token','isAdmin'),array($lastName,$firstName,$mail,$password,'NULL',0)); 
 
            return $addUser; 
        }

    }
?>
