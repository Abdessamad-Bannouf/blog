<?php 
namespace App\Controller;
use App\Controller\Controller;
use App\Model\userModel;
use App\Classes\Session\Session;
use App\Classes\Form\Form;
use App\Classes\Form\Validate;
use App\Classes\Date\Date;
use App\Classes\Security\Security;
use App\Classes\Regex\Regex;

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

        $this->regex = new Regex;
    } 

    public function login()
    {
        $verifMail = null;
        $verifPassword = null;

        if(isset($_POST['mail']) AND isset($_POST['password'])){
            
            $mail = htmlspecialchars($_POST['mail']); 
            $password = htmlspecialchars($_POST['password']);

            $verifMail = $this->regex->verifMail($mail);;
            $verifPassword = $this->regex->verifPassword($password); 

            $getUserInfo = $this->userModel->getUserInfo($mail); 
            $getUserInfo = $getUserInfo->fetchAll();
            //Ajouter la verif password-verify
            if($verifMail AND $verifPassword){
                $passwordVerified = $this->security->decryptPassword($password,$getUserInfo[0]['password']);
                if($passwordVerified){
                    $this->session = new Session(array("lastName","firstName","mail","isAdmin","user_id"),array($getUserInfo[0]['lastName'],$getUserInfo[0]['firstName'],$getUserInfo[0]['mail'],$getUserInfo[0]['isAdmin'],$getUserInfo[0]['user_id']));
                    $this->session->GetSession();
                
                    if($getUserInfo[0]['isAdmin'])
                        header('location: '. WebSiteLink.'Admin/Index');
                        else
                            return $this->home();                
                }
            }
        }

        $this->render('App/View/LoginView.php',array('mail'=>$verifMail,'password'=>$verifPassword));
    }

    public function logout(){
        $this->session = new Session([],[]);
        $this->session->deleteSession(array($_SESSION['firstName']));

        header('location: '. WebSiteLink.'user/login');
    }

    public function register()
    {
        $confirmPassword = null;
        $isRegister = null;
        $errors = null;
        $repeatPassword = false;

        if(isset($_POST['lastName']) AND isset($_POST['firstName']) AND isset($_POST['mail']) AND isset($_POST['password']) AND isset($_POST['confirmPassword'])){
            
            // On vérifie sur le formulaire existe (méthode post)
            $form = new Form;
            if($form->exists($_SERVER['REQUEST_METHOD'])) {

                // On check si il y a des erreurs, ou non
                $validate = new Validate;
                $errors = $validate->check($_POST, ['firstName' => ['min' => 3, 'max' => 20], 'lastName' => ['min' => 3, 'max' => 20], 'mail' => ['min' => 5, 'max' => 50], 'password' => ['min' => 8, 'max' => 20]]);

                $lastName = $_POST['lastName'];
                $firstName = $_POST['firstName'];
                $mail = htmlspecialchars($_POST['mail']); 
                $password = htmlspecialchars($_POST['password']);
                
                $confirmPassword = isset($_POST['confirmPassword']) ? htmlspecialchars($_POST['confirmPassword']) : false;
                $repeatPassword = $password == $confirmPassword;

                if($repeatPassword AND $errors->errors() === null){
                    $finalPassword = $this->security->hashPassword($password);
                    $isRegister = $this->userModel->addUser($lastName,$firstName,$mail,$finalPassword);

                    // Redirection après l'inscription
                    header('location: '. WebSiteLink.'user/login');
                }
            }
        }

        $this->render('App/View/RegisterView.php',array(
                                                            'isRegister' => $isRegister,
                                                            'confirmPassword' => $confirmPassword,
                                                            'errors' => $errors,
                                                            'reapetPassword' => $repeatPassword 
                                                        ));
    }   

    public function home()
    { 
        $this->render('App/View/IndexView.php',array());  
    }    

    public function sendMail()
    {

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

                mail($to,$email_subject,$email_body,$headers);

                return true;	
            }		
        }
    }
    
    public function admin()
    {    
        $this->render('App/View/AdminView.php',array());
    }

    public function update()
    {
        if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
            $title = htmlspecialchars($_POST['title']);
            $chapo = htmlspecialchars($_POST['chapo']);
            $image = htmlspecialchars($_FILES['image']['name']);
            $content = htmlspecialchars($_POST['content']);

            $author = $_SESSION['user_id'];
            
            $this->userModel->updatePost($title,$chapo,$image,$content,$author,$this->date);
        }
        
    }

    public function add()
    {
        if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
            $title = htmlspecialchars($_POST['title']);
            $chapo = htmlspecialchars($_POST['chapo']);
            $image = htmlspecialchars($_FILES['image']['name']);
            $content = htmlspecialchars($_POST['content']);

            (int)$author = (int)$_SESSION['user_id'];
            
            $this->userModel->addPost($title,$chapo,$image,$content,$author,$this->date);
        }
    }

    public function delete($id)
    {
        $this->userModel->deletePost($id);
    }
} 
?>
