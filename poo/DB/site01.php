<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8">
    <!-- Importation de jquery -->
    <script src="query.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
    <!-- Importation de jquery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
   
</head>

<body>
    
    <?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "ville.php";
require "departement.php";


$dept = new Departement();
$ville = new Ville();

$datas=$ville->getAll();

echo "<table id='example' class='display' style='width:100%'>";
echo "<thead><tr><th>NOM</th><th>Chef Lieu</th><th>Code postal</th><th>Action</th></tr></thead><tbody>";

foreach ($datas as $data) {
    echo "<tr>";
    echo "<td>".$data["ville_slug"]."</td>";
    echo "<td>".$data["ville_nom"]."</td>";
    echo "<td>".$data["ville_code_postal"]."</td>";
    echo "<td><button class='opener' ville_id='".$data['id']."'>Voir</button></td>";
    echo "</tr>";
}

echo "</tbody></table>";
?>

<div id="dialog" title="Basic dialog">
  <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
<script>
new DataTable("#example");
$(".opener").on( "click", function() {
        $.ajax({
              method: "POST",
              url: "readVille.php",
              data: { ville_id: $(this).attr("ville_id") }
            })
            .done(function( msg ) {
                let ville=JSON.parse(msg);
                $("#dialog").html(ville.id);
                alert( "Data Saved: " + msg );
                $("#dialog").dialog("open");
            });
    })
                
    $( function() {
        $( "#dialog" ).dialog({
          autoOpen: false,
          show: {
            effect: "blind",
            duration: 1000
          },
          hide: {
            effect: "explode",
            duration: 1000
          }
        });
    });
    </script>
</body>
</html>