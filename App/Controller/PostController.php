<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\PostModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

class PostController extends Controller{
        private $userModel;
        private $session;
        private $form;

        public function __construct(){
            $this->userModel = new PostModel;

            $this->session = new Session(array("lastName","firstName"),array("Bannouf","Abdessamad"));

            $this->form = new Form;

            $this->session->GetSession();
        } 

        public function post($id = false){
            /*if(isset($_POST['mail'])){
                $mail = htmlspecialchars($_POST['mail']);
            }*/

            $post = $this->userModel->getPost();

            parent::Render('App/View/post.php',array('post'=>$post));


        }
    } 
?>
