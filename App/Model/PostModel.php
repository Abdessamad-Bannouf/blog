<?php 
    namespace App\Model;
    use App\Model\Model; 

    class PostModel extends Model{
        public function getPost(){
            $post = parent::selectFilter(array('post_id','title','chapo','image','content','author','date'),'post',false);

            return $post;
        }
    }
?>