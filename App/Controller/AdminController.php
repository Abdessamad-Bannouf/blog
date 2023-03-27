<?php 
namespace App\Controller;

use App\Controller\Controller;
use App\Model\AdminModel;
use App\Classes\Session\Session;
use App\Classes\Form\Form;
use App\Classes\Date\Date;
use App\Classes\Security\Security;

class AdminController extends Controller
{
    private $adminModel;
    private $session;
    private $form;
    private $security;
    private $date;
    private $isAdmin;

    public function __construct()
    {
        $this->adminModel = new AdminModel;

        $this->form = new Form;

        $this->date = Date::GetDate();

        $this->security = new Security;

        (bool) $this->isAdmin = (isset($_SESSION['isAdmin'])) ? $_SESSION['isAdmin'] : false;
    } 

    public function index()
    {
        if($this->isAdmin){
            $allPost = $this->adminModel->index();

            $this->render('App/View/AdminView.php',array('post'=>$allPost));
        }
    }


    public function update($id=false)
    {
        if($this->isAdmin){
            if($id != false){
                $post = $this->adminModel->updatePost($id);
                $post = $post->fetch(); 

                $this->session = new Session(array('idPost'),array($id));
                $this->session->getSession();

                $this->render('App/View/AdminUpdateView.php',array("post"=>$post));
            }

            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);
                $author = $_SESSION['user_id'];
                $idPost = $_SESSION['idPost'];
                
                $this->adminModel->updatePost($idPost,$title,$chapo,$image,$content,$author,$this->date);

                header('location: '.WebSiteLink.'admin/index');
            }
        }
    }

    public function add()
    {
        if($this->isAdmin){
            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);

                (int)$author = (int)$_SESSION['user_id'];

                $this->adminModel->addPost($title,$chapo,$image,$content,$author,$this->date);

                header('location: '.WebSiteLink.'admin/index');
            }
        }
    }

    public function delete($id)
    {
        if($this->isAdmin){
            $this->adminModel->deletePost($id);

            header('location: '.WebSiteLink.'admin/index');
        }
    }
}