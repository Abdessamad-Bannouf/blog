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


        public function register(){
            if(isset($_POST['lastName']) AND isset($_POST['firstName']) AND isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirmPassword'])){
                $lastName = $_POST['lastName'];
                $firstName = $_POST['firstName'];
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);
                
                $this->userModel->getRegister($lastName,$firstName,$mail,$password);

            }

            parent::Render('App/View/registerView.php',array());
        }
        
        
    } 
?>