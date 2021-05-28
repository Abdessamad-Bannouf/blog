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

        
    } 
?>
