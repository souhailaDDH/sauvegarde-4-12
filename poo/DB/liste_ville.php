<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        
<?php 

    ini_set('display_errors', '1');
    ini_set('display_startup_error', '1');
    error_reporting(E_ALL);
    // var_dump($_POST);
   
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=souhaila', 'souhaila', 'plop');
    } 
    catch (PDOExeption $e) {

    }
    
    $sql = "SELECT * FROM villes_france_free LIMIT 10";
    
    $result=$dbh->query($sql);
    
    $datas=$result->fetchAll();
    
    echo "<table>";
        echo "<caption>Noms des villes</caption>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>VILLES</th>";
            echo "</tr>";
        echo "</thead>";
        foreach($datas as $data){
            echo '<tr>';
                echo '<td>'. $data['ville_nom']. '</td>';
            echo '</tr>';
        }

    echo "</table>";
    ?>
    </body>

</html>