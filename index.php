<?php 
    require 'vendor/autoload.php';
    require 'App/Config/Config.php';
    require 'vendor/autoload.php';

    session_start();
    
    use App\Controller\Controller; 

    $searchController = new Controller;
    $searchController->SearchController();  
?>