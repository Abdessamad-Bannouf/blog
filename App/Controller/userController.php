<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\userModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

class UserController extends Controller{
        private $userModel;
        private $session;
        private $form;

        public function __construct(){
            $this->userModel = new userModel;

            $this->session = new Session(array("lastName","firstName"),array("Bannouf","Abdessamad"));

            $this->form = new Form;

            $this->session->GetSession();
        } 

        public function home(){
            if(isset($_POST['mail'])){

                $mail = htmlspecialchars($_POST['mail']);
                $this->userModel->getUser($mail);
            }
        }

        public function register(){
            if(isset($_POST['lastName']) AND isset($_POST['firstName']) AND isset($_POST['mail']) AND isset($_POST['password'])){
                $lastName = $_POST['lastName'];
                $firstName = $_POST['firstName'];
                $mail = $_POST['mail']; 
                $password = $_POST['password'];

                $submitForm = $this->userModel->subscribeUser($lastName,$firstName,$mail,$password);           
            }

            parent::Render('App/View/registerView.php',array());
        }
    } 
?>
