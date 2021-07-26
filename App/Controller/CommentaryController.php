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
            $this->commentaryModel = new CommentaryModel;

            $this->form = new Form;

            $this->date = Date::GetDate();

            $this->security = new Security;

            (bool) $this->isAdmin = (isset($_SESSION['isAdmin'])) ? $_SESSION['isAdmin'] : false;
        } 

        public function index(){
    
            $allPost = $this->commentaryModel->index();

            parent::Render('App/View/AdminView.php',array('post'=>$allPost)); 
        }

        public function show($id=false){

            if($id)
                $commentary = $this->commentaryModel->getCommentary($id);   

                    else
                        $commentary = $this->commentaryModel->getCommentary(); 
            
            parent::Render('App/View/CommentaryView.php',array('commentary'=>$commentary)); 

        }

        public function add(){
            if($this->isAdmin){
                $userId = $_SESSION['user_id'];
                $postId = $_POST['post_id'];
                if(isset($_POST['commentary'])){ 
                    $content = htmlspecialchars($_POST['commentary']);

                    $this->commentaryModel->addCommentary($content,$this->date,$userId,$postId,0);

                    header('location: '.WebSiteLink.'post/show');
                }
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