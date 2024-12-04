<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Méthode POST</title>
</head>
<body>
    <h1>Formulaire de login avec la methode POST</h1>

    <div>
        <form action="insertDpt.php" methode="post">
            <input name="nom" />
            <?php
                 try {
                    $dbh = new PDO('mysql:host=localhost;dbname=souhaila', 'souhaila', 'plop');
                } catch (PDOExeption $e) {
                
                }

                $sql = "SELECT * FROM départements"; 
                $ask = $dbh->query($sql);
                var_dump($ask->FetchAll());
            ?>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>