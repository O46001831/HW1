<!DOCTYPE html>
<?php 
session_start();
$login = false;
if(isset($_SESSION['username'])){
    $login = true;
}
else {
    header("Location: ../Homepage/Wellcome.php");
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
        <link rel="stylesheet" href="Homepage.css"/>
        <script src="Homepage.js" defer></script>        
        <script src="ricerca.js" defer></script>             
        <script src="ModalBox/recensioni.js" defer></script>           
         
    </head>

    <body>
        <?php require "../Templates/Header.php" ?> 
        <article>
            <div class='barra'>
                <h1>I nostri prodotti:</h1>
                <div>Cerca: <input type="text" id="ricerca" onkeyup="ricerca()"></div>  
            </div>
            <div id='list' class='list'></div>  <!-- usato per la lista completa -->
        </article>
        <div id="modalBox" class="hide">
            <div id="info">
                <img id="modalImg"></img>
                <div id="modalInfoProdotto">
                    <div id="modalTitle"></div>
                    <div id="modalPrezzo"></div>
                    <div id="modalDescrizione"></div>
                    <div id="modalAcquista"></div>
                    <div id="modalConferma" class="hideConferma"> Prodotto aggiunto al carrello!</div>
                </div>
            </div>      
            <div id="modalRecensioni">
                <div> Scrivi una recensione: </div>
                <div id="textCommento">
                    <textarea id="addComment" rows="5" cols="30"></textarea>
                    <button id="inviaRecensione"> Invia </button>
                </div>
                <div> Recensioni: </div>
                <div id="recensioni"></div>
            </div>
        </div>

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