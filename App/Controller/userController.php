<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\UserModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

    use App\Classes\Security\Security;

class UserController extends Controller{
        private $userModel;
        private $session;
        private $form;

        private $security;


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


        public function register(){
            $confirmPassword = null;
            $isRegister = null;

            $this->security = new Security;

            if(isset($_POST['lastName']) AND isset($_POST['firstName']) AND isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirmPassword'])){
                $lastName = $_POST['lastName'];
                $firstName = $_POST['firstName'];
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);
                $confirmPassword = isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : false;
                
                if($password == $confirmPassword){
                    $finalPassword = $this->security->hashPassword($password);
                    $isRegister = $this->userModel->addUser($lastName,$firstName,$mail,$finalPassword);
                }
            }

            parent::Render('App/View/registerView.php',array('isRegister'=>$isRegister,
                                                             'confirmPassword'=>$confirmPassword
                                                            ));
        }  

        public function home(){
            /*if(isset($_POST['mail'])){
                $mail = htmlspecialchars($_POST['mail']);
            }*/

            $getUserInfo = $this->userModel->getUserInfo();
            
            parent::Render('App/View/index.php',array('user'=>$getUserInfo)); 
        }
    }  
?>
