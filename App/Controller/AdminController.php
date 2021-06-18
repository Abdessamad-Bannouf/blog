<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\userModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

    use App\Classes\Date\Date;

    use App\Classes\Security\Security;

    class AdminController extends Controller{
        private $userModel;
        private $session;
        private $form;
        private $security;
        private $date;


        public function __construct(){
            $this->userModel = new userModel;

            $this->form = new Form;

            $this->date = Date::GetDate();

            $this->security = new Security;
        } 

        public function admin(){    
            parent::Render('App/View/adminView.php',array());
        }

        public function update(){
            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);

                $author = $_SESSION['user_id'];
                
                $this->userModel->updatePost($title,$chapo,$image,$content,$author,$this->date);
            }
            
        }

        public function add(){
            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);

                (int)$author = (int)$_SESSION['user_id'];
                
                $this->userModel->addPost($title,$chapo,$image,$content,$author,$this->date);
            }
        }

        public function delete($id){
            var_dump($this->userModel->deletePost($id));
        }

    }