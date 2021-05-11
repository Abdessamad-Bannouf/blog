<?php 
    namespace App\Controllers;
    use App\Controllers\Controller;

    class UserController extends Controller{

        public function __construct($b,$c,$d){
            echo 'deeee'.$b.$c.$d;
        } 

        public function viewProfil($a = false){
            echo 'test'.$a ;
        }
    } 
?>