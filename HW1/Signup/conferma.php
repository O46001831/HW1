<!DOCTYPE html>
<?php 
$login = false;
$errore = false;
session_start();
if(isset($_SESSION['username'])){
    $login = true;
}
?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homework WP: O46001831</title>
        <link rel="stylesheet" href="../Login/Login.css"/>  
    </head>

    <body>
        <?php require "../Templates/Header.php" ?>
        
        <?php
            //verifica l'accesso:
            if(isset($_SESSION["username"])){
                //vai alla home
                header("Location: ../Homepage/Homepage.php");
                exit;
            }
        ?>

        <article>
        <h2> Registrazione avvenuta con successo! </h2>
        <h2> Si prega di effettuare il <a href='../Login/Login.php'> login</a> per proseguire </h2>
        </article>
        
        <footer>
            <a href="https://i.ytimg.com/vi/HO8ctP_QNZc/maxresdefault.jpg">
                LAVORA CON NOI
            </a>
            <div>
                Powered by:<strong>Cataldo Cristian O46001831</strong>
            </div>
        </footer>
    </body>
</html>