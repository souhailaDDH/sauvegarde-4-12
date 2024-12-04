<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>formulaire</title>
</head>
<body>
    <h1>Formulaire de Login avec la méthode GET</h1>
    <?php var_dump($_GET) ?>
    <div>
        <form action=""method="get">
            <input name="Login" />
            <input name="password" type="password"/>
            <button type="submit">Envoyer</button>
        </form>
    </div>
     <h1>Formulaire de Login avec la méthode POST</h1>
    <?php var_dump($_POST) ?>
    <div>
        <form action="receive_data.php"method="post">
            <input name="Login" />
            <input name="password" type="password"/>
            <button type="submit">Envoyer</button>
        </form>
    </div>        
</body>
</html>
