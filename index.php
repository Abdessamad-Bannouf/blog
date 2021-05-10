<?php 
    require 'vendor/autoload.php';
    require 'App/Config/Config.php';
    require 'vendor/autoload.php';
    use App\Controllers\Controller; 

    $searchController = new Controller;
    $searchController->SearchController();       
?>