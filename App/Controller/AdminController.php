<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\AdminModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

    use App\Classes\Date\Date;

    use App\Classes\Security\Security;

    class AdminController extends Controller{
        private $adminModel;
        private $session;
        private $form;
        private $security;
        private $date;


        public function __construct(){
            $this->adminModel = new AdminModel;

            $this->form = new Form;

            $this->date = Date::GetDate();

            $this->security = new Security;
        } 

        public function index(){    
            $allPost = $this->adminModel->index();

            parent::Render('App/View/AdminView.php',array('post'=>$allPost));
        }

        public function update($id=false){

            if($id != false){
                $getPost = $this->adminModel->updatePost($id);
                $getPost = $getPost->fetch(); 

                $this->session = new Session(array('idPost'),array($id));
                $this->session->getSession();

                parent::Render('App/View/AdminUpdateView.php',array("post"=>$getPost));
            }

            if(isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 
 
                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);

                $author = $_SESSION['user_id'];
                $idPost = $_SESSION['idPost'];
                var_dump($title);
                
                $this->adminModel->updatePost($idPost,$title,$chapo,$image,$content,$author,$this->date);
                //var_dump($this->adminModel->updatePost($title,$chapo,$image,$content,$author,$this->date,$idPost));

                header('location: '.WebSiteLink.'admin/index');
            }

            //var_dump($this->adminModel->updatePost($title,$chapo,$image,$content,$author,$this->date,$id));             
        }

        public function add(){
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

        public function delete($id){
            $this->adminModel->deletePost($id);

            header('location: '.WebSiteLink.'admin/index');
            //parent::Render('App/View/AdminView.php',array());
        }

    }