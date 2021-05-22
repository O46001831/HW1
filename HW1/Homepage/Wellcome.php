<!DOCTYPE html>
<?php 
    if(isset($_SESSION["username"])){
        //vai alla home
        header("Location: ../Homepage/Homepage.php");
        exit;
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
        <link rel="stylesheet" href="mhw1.css" />
    </head>

    <body>
        <header>
            <div id="overlay"></div>
            <div class='cont'>
                <div class='title'>TIMMUCCHI</div>
            </div>
            <div class='cont'>
                <div class='button'><a href="https://localhost/HW1/Login/Login.php">LOGIN</a></div>
                <div class='button'><a href="https://localhost/HW1/Signup/Signup.php">REGISTRATI</a></div>
            </div>
        </header>
        <article>
            <section class='text'>
                <h1>TIMMUCCHI, IL SUPERMERCATO DOVE VUOI TU</h1>
                <p>TIMMUCCHI, delivery market. Consegna dove vuoi tu.</p>
                <p> <a href="../Signup/Signup.php">Registrati</a> o effettua il <a href="../Login/Login.php"> login </a> per ricevere la spesa direttamente a casa tua!</p>
                <p>Prova i nostri prodotti: direttamente dai migliori rifornitori italiani.</p>
            </section>            
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