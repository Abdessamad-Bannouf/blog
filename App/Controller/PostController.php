<?php

namespace App\Controller;

    use App\Controller\Controller;
    use App\Model\PostModel;
    use App\Classes\Form\Form;

    class PostController extends Controller
    {
        private $userModel;
        private $session;
        private $form;

        public function __construct()
        {
            $this->userModel = new PostModel;
            $this->form = new Form;
        } 

        public function show($id=false)
        {
            if($id){
                $post = $this->userModel->getPost($id);  
                $this->render('App/View/SinglePostView.php',array('post'=>$post)); 
            } 

                    else{
                        $post = $this->userModel->getPost(); 
                        $this->render('App/View/PostView.php',array('post'=>$post)); 
                    }
        }
    } 
?>
