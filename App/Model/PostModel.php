<?php 
    namespace App\Model;
    use App\Model\Model; 

    class PostModel extends Model{
        public function getPost($id = false){
            
            if($id == false)
                $post = parent::selectAll(array('post_id','title','chapo','image','content','author','date'),'post');

                else
                    //$post = parent::join(array('post.post_id','post.title','post.chapo','post.image','post.content','post.author','post.date','commentary.commentary_id','commentary.content','commentary.date','commentary.user_id','commentary.post_id','commentary.is_valid'),'post','post','commentary','commentary','post_id','post_id',$id);
                    //$post = parent::requestCustom("SELECT DISTINCT post.post_id,post.title,post.chapo,post.image,post.content,post.author,post.date FROM post AS post JOIN commentary AS commentary ON post.post_id=commentary.post_id WHERE post.post_id='$id'");
                    $post = parent::selectFilter(array('post_id','title','chapo','image','content','author','date'),'post',"post_id='$id'");

            return $post;
        }
    }
?>