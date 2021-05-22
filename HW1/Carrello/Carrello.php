<!DOCTYPE html>
<?php 
session_start();
$login = false;
if(isset($_SESSION['username'])){
    $login = true;
}
else {
    header("Location: ../Carrello/Wellcome.php");
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
        <link rel="stylesheet" href="Carrello.css"/>
        <script src="Carrello.js" defer></script>        
        <script src="rimuoviDalCarrello.js" defer></script>        
        <script src="../Homepage/ricerca.js" defer></script>     
         
    </head>

    <body>
        <?php require "../Templates/Header.php" ?> 
        <article>

            <div class='barra'>
                <h1>Il tuo carrello:</h1>
                <div id="contTotale">
                    <div> Totale: 
                        <strong id="prezzoTotale"></strong> 
                    </div>
                    <button id="confermaOrdine">Conferma ordine</button>                    
                </div>  
            </div>
            <div id="carrelloVuoto" class="hide"> Il carrello è vuoto!
                <a href="../Homepage/Homepage.php">Clicca qui</a> per iniziare ad acquistare.
            </div>
            <div id='list' class='list'></div>
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