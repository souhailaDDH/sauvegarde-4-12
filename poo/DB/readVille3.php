<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    require "ville.php";
    //echo"Lecture d'une ville de laz art de NULL";
    //var_dump($_POST['ville_id']);
    $villeDb = new Ville();
    $ville=$villeDb->getTen($_GET["term"]);
    //var_dump($ville);
    echo json_encode($ville);
?>