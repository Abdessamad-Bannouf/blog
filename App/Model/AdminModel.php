<?php 
    namespace App\Model;
    use App\Model\Model; 

    class AdminModel extends Model{
        public function index(){
            $allPost = parent::SelectAll('*','post');
            
            return $allPost;
        }

        public function addPost($title,$chapo,$image,$content,$author,$date){
            $addPost = parent::RequestInsert('post',array('title','chapo','image','content','author','date','isValid'),array($title,$chapo,$image,$content,$author,$date,0));
        }

        public function updatePost(/*$title,$chapo,$image,$content,$author,$date,*/$id){
            //$updatePost = parent::RequestModify('post',array('title','chapo','image','content','author','date','isValid'),array($title,$chapo,$image,$content,$author,$date,0),'post_id',$id);
            $updatePost = parent::SelectFilter(array('post_id','title','chapo','image','content','author','date','isValid'),'post','post_id='.$id.'');
            
            return $updatePost;
        }

        public function deletePost($id){
            $deletePost = parent::RequestDelete('post','post_id',$id);
        }
    }
?>