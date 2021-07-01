<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    use App\Model\commentaryModel;

    use App\Classes\Session\Session;

    use App\Classes\Form\Form;

    use App\Classes\Date\Date;

    use App\Classes\Security\Security;

    class CommentaryController extends Controller{
        private $commentaryModel;
        private $session;
        private $form;
        private $security;
        private $date;
        private $isAdmin;


        public function __construct(){
            $this->commentaryModel = new commentaryModel;

            $this->form = new Form;

            $this->date = Date::GetDate();

            $this->security = new Security;

            (bool) $this->isAdmin = (isset($_SESSION['isAdmin'])) ? $_SESSION['isAdmin'] : false;
        } 

        public function index(){
            if($this->admin){
                $allPost = $this->commentaryModel->index();

                parent::Render('App/View/AdminView.php',array('post'=>$allPost));
            }
        }

        public function add(){
            if(isset($_POST['content'])){ 
                $content = htmlspecialchars($_POST['content']);

                $this->adminModel->addPost($content, $this->date);

                header('location: '.WebSiteLink.'post/post');
            }
        }

        public function accepted($id){
            if($this->isAdmin){

                /*if(isset($_POST['accept'])){*/ 
                    //$accept = htmlspecialchars($_POST['accept']);

                    $this->commentaryModel->acceptCommentary($id);

                    header('location: '.WebSiteLink.'admin/index');
                /*}*/
            }
        }

        public function refused($id){
            if($this->isAdmin){
                $this->commentaryModel->refuseCommentary($id);

                header('location: '.WebSiteLink.'admin/index');
                //parent::Render('App/View/AdminView.php',array());
            }
        }

    }