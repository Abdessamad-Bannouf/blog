<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{
        public function getUser($mail){
            $getUserInfo = parent::SelectFilter(array('lastName','firstName'),'user','mail',$mail);
        }
    }
?>
