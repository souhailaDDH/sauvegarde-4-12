<?php 
    ini_set('display_errors', '1');
    ini_set('display_startup_error', '1');
    error_reporting(E_ALL);
    // var_dump($_POST);
     try {
        $dbh = new PDO('mysql:host=localhost;dbname=souhaila', 'souhaila', 'plop');
    } catch (PDOExeption $e) {

    }
    
    $sql = "SELECT * FROM departements";
    
    $result=$dbh->query($sql);
    
    $datas=$result->fetchAll();
    
    echo "<form action='insert_ville.php' method='POST'>";
    echo "<input name='ville_nom'/>";
    echo "<input name='ville_code_postal'/>";
    
    echo "<select name='dept_id'>";
    
    
    //echo "<FORM action='' method='POST'>";
    
    //echo "<SELECT name='dept'>";
    
    foreach($datas as $data) {
        

        //echo $data['id']."=>".$data['nom']; 
        
        //echo "<br>============<br>";
        echo "<option value=".$data['id'].">".$data['nom']. "</option>";
    }
    echo "</select>";
    echo "<button value='submit'>Envoyer</button>";
    echo "</form>";
    
    ?>
    