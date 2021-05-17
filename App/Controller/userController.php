<?php 
    namespace App\Controller;
    use App\Controller\Controller;
    use App\Model\userModel;
    use App\Classes\Session\Session;

class UserController extends Controller{
        private $userModel;
        private $session;

        public function __construct(){
            $this->userModel = new userModel;
            $this->session = new Session(array("lastName"=>"Bannouf","firstName"=>"Abdessamad"));
            $this->session->GetSession();
        } 

        public function home(){
            if(isset($_POST['mail'])){

                $mail = htmlspecialchars($_POST['mail']);
                $this->userModel->getUser($mail);
            }
        }
    } 
?>
