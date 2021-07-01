<?php 
    namespace App\Model;
    use App\Model\Model; 

    class CommentaryModel extends Model{
        public function index(){
            $allCommentary = parent::SelectAll('*','commentary');
            
            return $allCommentary;
        }

        public function acceptCommentary($id){
            $addCommentary = parent::requestModify('commentary',array('is_valid'),array($id),'commentary_id',$id);
        }


        public function refuseCommentary($id){
            $deleteCommentary = parent::RequestDelete('commentary','commentary_id',$id);
        }
    }
?>