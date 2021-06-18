<?php 
    namespace App\Model;
    use App\Model\Model; 

    class UserModel extends Model{
        public function addPost($title,$chapo,$image,$content,$author,$date){
            $addPost = parent::RequestInsert('post',array('title','chapo','image','content','author','date','isValid'),array($title,$chapo,$image,$content,$author,$date,0));
        }

        public function updatePost($title,$chapo,$image,$content,$author,$date){
            $updatePost = parent::RequestModify('post',array('title','chapo','image','content','author','date','isValid'),array($title,$chapo,$image,$content,$author,$date,0),'post_id','24');
        }

        public function deletePost($id){
            $deletePost = parent::RequestDelete('post','post_id',$id);
        }
    }
?>