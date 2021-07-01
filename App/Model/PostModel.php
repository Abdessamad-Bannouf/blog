<?php 
    namespace App\Model;
    use App\Model\Model; 

    class PostModel extends Model{
        public function getPost(){
            $post = parent::selectFilter(array('title','chapo','image','content','author','date'),'post',false);

            return $post;
        }
    }
?>