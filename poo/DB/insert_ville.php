<?php
  var_dump($_POST);
  $sql = "INSERT INTO villes_france_free (ville_nom,ville_code_postal) VALUES ('".$_POST['ville_nom']."','".$_POST['ville_code_postal']."')";
  
    ini_set('display_errors', '1');
    ini_set('display_startup_error', '1');
    error_reporting(E_ALL);
    var_dump($_POST);
     try {
        $dbh = new PDO('mysql:host=localhost;dbname=souhaila', 'souhaila', 'plop');
    } catch (PDOExeption $e) {

    }
    
    $sql = "INSERT INTO villes_france_free (ville_nom,ville_code_postal,departement_id) VALUES ('".$_POST['ville_nom']."','".$_POST['ville_code_postal']."','".$_POST['dept_id']."')";
    echo $sql;
    $dbh->exec($sql);
?>
