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
                $getIdPost = $this->adminModel->updatePost($id);
                $getIdPost = $getIdPost->fetch(); 

                $this->session = new Session(array('idPost'), array($getIdPost));
                $this->session->GetSession();
            }

            if(isset($_SESSION['idPost']) AND isset($_POST['title']) AND isset($_POST['chapo']) AND isset($_FILES['image']) AND isset($_POST['content'])){ 

                $idPost = $getIdPost['post_id'];

                $title = htmlspecialchars($_POST['title']);
                $chapo = htmlspecialchars($_POST['chapo']);
                $image = htmlspecialchars($_FILES['image']['name']);
                $content = htmlspecialchars($_POST['content']);

                $author = $_SESSION['user_id'];
                
                $this->adminModel->updatePost($title,$chapo,$image,$content,$author,$this->date,$idPost);
                var_dump($this->adminModel->updatePost($title,$chapo,$image,$content,$author,$this->date,$idPost));

                parent::Render('App/View/AdminView.php',array(  
                                                                'title'=>$title,
                                                                'chapo'=>$chapo,
                                                                'image'=>$image,
                                                                'content'=>$content
                                                            ));
            }

            //var_dump($this->adminModel->updatePost($title,$chapo,$image,$content,$author,$this->date,$id));
            parent::Render('App/View/AdminUpdateView.php',array());
            
            
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