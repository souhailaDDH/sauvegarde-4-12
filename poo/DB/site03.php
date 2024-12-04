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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>
    <h1>Bonjour bienvenue !</h1>
    <h2>Veuillez vous inscrire ci-dessous s'il vous plaît</h2>
    <label for="name">Prénom :</label>

<input type="text" id="name" name="name" />
    <p>Date de naissance: <input type="text" id="datepicker"></p>   
     <div class="ui-widget">
         
     <fieldset>
    <legend>Selectionner un genre: </legend>
    <label for="radio-1">Homme</label>
    <input type="radio" name="radio-1" id="radio-1">
    <label for="radio-2">Femme</label>
    <input type="radio" name="radio-1" id="radio-2">
    <label for="radio-3">Autre</label>
    <input type="radio" name="radio-1" id="radio-3">
  </fieldset>
  
  <label for="villes">Villes: </label>
  <input id="villes">
  
  
</div>
    
    <?php

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    ?>

    <script>
    $(function(){
    function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
        $("#villes").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "readVille3.php",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function (data) {
                        let ville=JSON.parse(data);
                        console.log(ville);
                        response(ville);
                    }
                });
            },
            minLength: 2,
            select: function (event, ui) {
                console.log(ui);
                log("Selected: " + ui.item.value + " " + ui.item.id);
                
            }
        });
});
    </script>
    
    <div class="widget">
  <button>Envoyer</button> 
  
</body>

</html>