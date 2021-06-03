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

            $this->form = new Form;

            $this->session->GetSession();
        } 

        public function login(){
            if(isset($_POST['mail']) AND isset($_POST['password'])){
                
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);

                $this->session = new Session(array("lastName","firstName"),array($mail,$password));

                $this->userModel->getUserInfo($mail,$password);
            }

            parent::Render('App/View/loginView.php',array());
        } 
    } 
?>
