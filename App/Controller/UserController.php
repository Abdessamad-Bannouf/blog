<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\userModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

    use App\Classes\Date\Date;

    use App\Classes\Regex\Regex;

    class UserController extends Controller{
        private $userModel;
        private $session;
        private $form;
        private $date;
        private $regex;

        public function __construct(){
            $this->userModel = new userModel;

            $this->form = new Form;

            $this->date = Date::GetDate();

            $this->regex = new Regex;
        } 

        public function login(){
            $verifMail = null;
            $verifPassword = null;
            
            if(isset($_POST['mail']) AND isset($_POST['password'])){
                
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);

                $verifMail = $this->regex->verifMail($mail);;
                $verifPassword = $this->regex->verifPassword($password);
   
                if($verifMail AND $verifPassword){
                    $getUserInfo = $this->userModel->getUserInfo($mail,$password);
                    $getUserInfo = $getUserInfo->fetchAll();

                    $this->session = new Session(array("lastName","firstName", "user_id"),array($getUserInfo[0]['lastName'],$getUserInfo[0]['firstName'],$getUserInfo[0][5]));
                    $this->session->GetSession();

                    if($getUserInfo[0]['isAdmin'])
                        header('location: '. WebSiteLink.'User/admin');
                    }
                }

            parent::Render('App/View/LoginView.php',array('mail'=>$verifMail,'password'=>$verifPassword));
        } 

        public function logout(){
            $this->session = new Session([],[]);
            $this->session->deleteSession(array($_SESSION['firstName']));

            parent::Render('App/View/LoginView.php',array());
        }

        public function admin($action = false){    
            parent::Render('App/View/AdminView.php',array());
        }

        public function Update(){
            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);

                $author = $_SESSION['user_id'];
                
                $this->userModel->updatePost($title,$chapo,$image,$content,$author,$this->date);
            }
            
        }

        public function Add(){
            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);

                (int)$author = (int)$_SESSION['user_id'];
                
                $this->userModel->addPost($title,$chapo,$image,$content,$author,$this->date);
            }
        }

        public function Delete($id){
            var_dump($this->userModel->deletePost($id));
        }
    } 
?>
