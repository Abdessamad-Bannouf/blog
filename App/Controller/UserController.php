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

            $this->security = new Security;
        } 

        public function login(){
            if(isset($_POST['mail']) AND isset($_POST['password'])){
                
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);

                $getUserInfo = $this->userModel->getUserInfo($mail);
                $getUserInfo = $getUserInfo->fetchAll();
                
                //Ajouter la verif password-verify
                $passwordVerified = $this->security->decryptPassword($password,$getUserInfo[0]['password']);

                if($passwordVerified){
                    $this->session = new Session(array("lastName","firstName","mail","isAdmin","user_id"),array($getUserInfo[0]['lastName'],$getUserInfo[0]['firstName'],$getUserInfo[0]['mail'],$getUserInfo[0]['isAdmin'],$getUserInfo[0][5]));
                    $this->session->GetSession();
                
                    if($getUserInfo[0]['isAdmin'])
                        header('location: '. WebSiteLink.'User/admin');

                        else
                            return $this->home();                
                }
            }

            parent::Render('App/View/loginView.php',array());
        } 

        public function register(){
            $confirmPassword = null;
            $isRegister = null;

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
            $getUserInfo = $this->userModel->getUserInfo($_SESSION['mail']);

            parent::Render('App/View/index.php',array('user'=>$getUserInfo));  
        }    

        public function sendMail(){

            if(isset($_POST['send'])){
            // Check for empty fields
                if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['phone']) AND !empty($_POST['message']) AND filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) != false)
                {
                    $name = strip_tags(htmlspecialchars($_POST['name']));
                    $email_address = strip_tags(htmlspecialchars($_POST['email']));
                    $phone = strip_tags(htmlspecialchars($_POST['phone']));
                    $message = strip_tags(htmlspecialchars($_POST['message']));
                        
                    // Create the email and send the message
                    $to = 'abdessamad.bannouf@laposte.net'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                    $email_subject = "Website Contact Form:  $name";
                    $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
                    $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                    $headers .= "Reply-To: $email_address";	

                    return true;	
                }		
            }
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
?>
