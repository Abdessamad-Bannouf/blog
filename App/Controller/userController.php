<?php 
    namespace App\Controller;
    use App\Controller\Controller;

    class UserController extends Controller{

        public function __construct(){

        } 

        public function viewProfil($id = false){
            echo $id ; 
        }
    } 
?>
