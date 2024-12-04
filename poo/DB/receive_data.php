<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body> 
    <style>
        #test { 
            border:1px solid red;
            border-border-collapse: collapse;
        }
        td {
            border: 1px solid red;
        }
    </style>
    <h1>Reception des données</h1>
    <img src="https://www.shutterstock.com/image-photo/funny-cat-flying-photo-playful-600nw-2315020963.jpg"/>
    <table id="test">
        <tr>
           <th>Clé</th> 
           <th>Valeur</th>
        </tr>
      
    <?php 
    foreach($_POST as $key => $value) {
        echo "<tr>";
            echo "<td>".$key. "</td>";
            echo "<td>".$value. "</td>";
        echo "</tr>";
    }
?>
    </table>
</body>
</html>
