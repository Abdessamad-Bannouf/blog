<?php 
    require 'vendor/autoload.php';
    require 'App/Config/Config.php';
    require 'vendor/autoload.php';
    use App\Controller\Controller; 

    $searchController = new Controller;
    $searchController->SearchController();  
    $a=0;
?>