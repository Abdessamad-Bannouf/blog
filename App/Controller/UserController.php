<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\userModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

    use App\Classes\Date\Date;

    use App\Classes\Security\Security;

    class UserController extends Controller{
        private $userModel;
        private $session;
        private $form;
        private $security;
        private $date;


        public function __construct(){
            $this->userModel = new userModel;

            $this->form = new Form;

            $this->date = Date::GetDate();
        } 

        public function login(){
            if(isset($_POST['mail']) AND isset($_POST['password'])){
                
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);

                $getUserInfo = $this->userModel->getUserInfo($mail,$password);
                $getUserInfo = $getUserInfo->fetchAll();
                

                $this->session = new Session(array("lastName","firstName", "user_id"),array($getUserInfo[0]['lastName'],$getUserInfo[0]['firstName'],$getUserInfo[0][5]));
                $this->session->GetSession();

                if($getUserInfo[0]['isAdmin'])
                    header('location: '. WebSiteLink.'User/admin');

                    else
                        $this->home($getUserInfo[0]);
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

        public function home($userData = false){ 
            var_dump($userData);die();
                         
            parent::Render('App/View/index.php',array('user'=>$userData));  
        }    

        public function admin(){    
            parent::Render('App/View/adminView.php',array());
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
