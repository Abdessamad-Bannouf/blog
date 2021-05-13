<?php 
    namespace App\Controllers;
    use App\Controllers\Controller;

    class UserController extends Controller{

        public function __construct(){

        } 

        public function viewProfil($id = false){
            echo $id ;
        }
    } 
?>
