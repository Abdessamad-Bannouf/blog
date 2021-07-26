<?php 
    namespace App\Model;
    use App\Model\Model; 

    class CommentaryModel extends Model{
        public function index(){
            $allCommentary = parent::SelectAll('*','commentary');
            
            return $allCommentary;
        }
        
        public function getCommentary($id = false){
            if($id != false)
                $getCommentary = parent::selectFilter(array('commentary_id','content','date','user_id','post_id','is_valid'),'commentary','commentary_id="'.$id.'"');
                
                else
                    $getCommentary = parent::selectAll(array('commentary_id','content','date','user_id','post_id','is_valid'),'commentary');

            return $getCommentary;
        }

        public function addCommentary($content,$date,$userId,$postId,$isValid){
            $addCommentary = parent::requestInsert('commentary',array('content','date','user_id','post_id','is_valid'),array($content,$date,$userId,$postId,$isValid));
        }

        public function acceptCommentary($id){
            $acceptCommentary = parent::requestModify('commentary',array('is_valid'),array(1),'commentary_id',$id);
        }

        public function refuseCommentary($id){
            $deleteCommentary = parent::RequestDelete('commentary','commentary_id',$id);
        }
    }
?>