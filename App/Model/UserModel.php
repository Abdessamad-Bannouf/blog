<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{



        public function addUser($lastName,$firstName,$mail,$password){  
            $addUser = parent::RequestInsert('user',array('lastName','firstName','mail','password','token','isAdmin'),array($lastName,$firstName,$mail,$password,'NULL',0)); 
 
            return $addUser; 
        }

        public function getUserInfo($mail,$password){

            $getUserInfo = parent::SelectFilter(array('lastName','firstName','mail','password','token','isAdmin'),'user',"mail = '$mail'");

            return $getUserInfo;
        }


        public function addPost($title,$chapo,$image,$content,$author,$date){
            $addPost = parent::RequestInsert('post',array('title','chapo','image','content','author','date','isValid'),array($title,$chapo,$image,$content,$author,$date,0));
        }

        public function updatePost($title,$chapo,$image,$content,$author,$date){
            $updatePost = parent::RequestModify('post',array('title','chapo','image','content','author','date','isValid'),array($title,$chapo,$image,$content,$author,$date,0),'post_id',22);
        }

        public function deletePost($id){
            $deletePost = parent::RequestDelete('post','post_id',$id);
        }

    }
?>
