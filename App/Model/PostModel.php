<?php 
namespace App\Model;
use App\Model\Model; 
class PostModel extends Model
{
    public function getPost($id = false)
    {
        
        if($id == false)
            $post = parent::selectAll(array('post_id','title','chapo','image','content','author','date'),'post');

            else
                $post = parent::requestCustom("SELECT DISTINCT (post.post_id),post.title,post.chapo,post.image,post.content,post.author,post.date,commentary.commentary_id, commentary.content, commentary.date,commentary.user_id,commentary.post_id,commentary.is_valid, user.firstname FROM post AS post JOIN commentary AS commentary ON post.post_id=commentary.post_id JOIN user AS user ON commentary.user_id=user.user_id WHERE post.post_id='$id'");

        return $post;
    }
}
?>