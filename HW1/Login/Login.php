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
        <link rel="stylesheet" href="Login.css" />        
    </head>

    <body>
        <?php require "../Templates/Header.php" ?>
        
        <?php require "verificaLogin.php" ?>
        

        <article>
        <h2> Accedi per iniziare ad acquistare con Timmucchi! </h2>
            
        <!-- QUA INSERISCO IL FORM PER IL LOGIN -->
        <main>
            <form id="form" name="login_form" method="post">
            <?php 
                if($errore == true){
                    echo "<h3 class='errore'> Username o password errati! </h3>";
                }
            ?>
            <label> Username: <input type="text" name="username"> </label>
            <label> Password: <input type="Password" name="password"> </label>
            <label>&nbsp;<input type="submit" name="invio" value="Login"> </label>
            </form> 
        </main>
        <h4>
            Se non sei ancora registrato <a href='../Signup/Signup.php'> clicca qui </a> per registrarti!
        </h4>
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