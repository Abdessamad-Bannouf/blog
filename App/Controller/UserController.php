<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\UserModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

class UserController extends Controller{
        private $userModel;
        private $session;
        private $form;

        public function __construct(){
            $this->userModel = new UserModel;

            $this->session = new Session(array("lastName","firstName"),array("Bannouf","Abdessamad"));

            $this->form = new Form;

            $this->session->GetSession();
        } 


        public function login(){
            if(isset($_POST['mail']) AND isset($_POST['password'])){
                
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);
                
                $this->userModel->getUser($mail,$password);

            }

            parent::Render('App/View/loginView.php',array());
        }
        
        
    } 
?>
