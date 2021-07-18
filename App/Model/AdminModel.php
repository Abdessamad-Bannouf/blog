<?php 
    namespace App\Model;
    use App\Model\Model; 

    class AdminModel extends Model{
        public function index(){
            $allPost = parent::SelectAll(array(),'post');            

            return $allPost;
        }

        public function addPost($title,$chapo,$image,$content,$author,$date){
            $addPost = parent::RequestInsert('post',array('title','chapo','image','content','author','date'),array($title,$chapo,$image,$content,$author,$date));
        }

        public function updatePost($id=false,$title=false,$chapo=false,$image=false,$content=false,$author=false,$date=false){
            if($id != false)
                $updatePost = parent::SelectFilter(array('post_id','title','chapo','image','content','author','date'),'post','post_id='.$id.'');
                
                else{
                    $updatePost = parent::RequestModify('post',array('title','chapo','image','content','author','date'),array($title,$chapo,$image,$content,$author,$date),'post_id',$id);
                     die(array($title,$chapo,$image,$content,$author,$date));
                }
            return $updatePost;
        }

        public function deletePost($id){
            $deletePost = parent::RequestDelete('post','post_id',$id);
        }
    }