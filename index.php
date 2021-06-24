<?php 
    require 'vendor/autoload.php';
    require 'App/Config/Config.php';
    require 'vendor/autoload.php';

    use App\Controller\Controller; 

    session_start();

    $searchController = new Controller;
    $searchController->searchController();  
?>