<!DOCTYPE html>
<?php 
$login = false;
$errore = false;
$successo = false;
session_start();
if(isset($_SESSION['username'])){
    header("Location: ../Homepage/Homepage-php");
    exit;
}
?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="..\font-awesome-4.7.0\css\font-awesome.min.css">
        <link rel="stylesheet" href="..\font-awesome-4.7.0\css\font-awesome.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homework WP: O46001831</title>
        <link rel="stylesheet" href="Signup.css" />
        <script src='signup.js' defer></script>
    </head>

    <body>
       <?php require "../Templates/Header.php" ?>     

        <article>
        <h2> Registrati per iniziare ad acquistare con Timmucchi! </h2>
        <main>  
            <!-- QUA INSERISCO IL FORM PER LA REGISTRAZIONE -->
            <form id="signup_form" name="signup_form" method="post">
            <?php 
                if($errore == true){
                    echo "<h3 class='errore'> Username già in uso! Si prega di sceglierne un altro. </h3>";
                }
                if($successo == true){
                    echo "<h3 class='errore'> La registrazione ha avuto successo! Si prega di effettuare il Login. </h3>";
                }
            ?>
            <label id="secret"></label>
            <label> Nome: <input type="text" name="nome"> </label>
            <label> Cognome: <input type="text" name="cognome"> </label>
            <label> Indirizzo di residenza: <input type="text" name="indirizzo"> </label>
            <label> Numero di cellulare: <input type="text" name="cellulare"> </label>
            <label> Username: <input type="text" name="username"> </label> 
            <label> Password: <input type="Password" name="password"> </label>
            <label> Conferma Password: <input type="Password" name="conferma"> </label>
            <label>&nbsp;<input type="submit" name="invio" value="Registrati"> </label>
            </form>             
        </main>
        <h4> La password deve essere lunga almeno 8 caratteri e deve contenere almeno un carattere speciale 
                (Es: ! ? $ % ^ & # _ @).</h4>
        <h4> Se sei già registrato <a href='../Login/Login.php'> clicca qui </a> per effettuare l'accesso!</h4>
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