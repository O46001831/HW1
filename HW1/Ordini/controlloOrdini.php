<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "Homework");
$user = $_SESSION["username"];

$query = "SELECT id, titolo, immagine, quantita, n_ordine, prezzo_tot FROM prodotti JOIN ordini ON prodotti.id=ordini.id_prodotto WHERE nome_utente='".$user."'";
$res = mysqli_query($conn, $query);

if(mysqli_num_rows($res) > 0){//se la tabella è stata letta correttamente
    //leggiamo tutte le righe e le mettiamo in un array
    while ($row = mysqli_fetch_assoc($res)){
        $prodotti[] = $row;
    }

    //chiudiamo la connessione:
    mysqli_free_result($res);
    mysqli_close($conn);
    //trasformiamo tutto in json:
    echo json_encode($prodotti);
}
else{
    //se l'utente non ha ancora effettuato ordini:
    echo json_encode(-1);
}
?>