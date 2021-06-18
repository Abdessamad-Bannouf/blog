<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\PostModel;

    use App\Classes\Form\Form;

class PostController extends Controller{
        private $userModel;
        private $session;
        private $form;

        public function __construct(){
            $this->userModel = new PostModel;

            $this->form = new Form;
        } 

        public function post($id = false){
            $post = $this->userModel->getPost();

            parent::Render('App/View/PostView.php',array('post'=>$post));
        }
    } 
?>
