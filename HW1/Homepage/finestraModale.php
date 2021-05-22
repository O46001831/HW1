<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "Homework");
$user = $_SESSION["username"];
$idProdotto=$_POST["idProdotto"];

$query = "SELECT * FROM prodotti WHERE id=".$idProdotto;
$res = mysqli_query($conn, $query);

if(mysqli_num_rows($res) > 0 ){ //se la tabella è stata letta correttamente
    //leggiamo tutte le righe e le mettiamo in un array
    while ($row = mysqli_fetch_assoc($res)){
        $prodotti[] = $row;
    }
    //trasformiamo tutto in json:
    echo json_encode($prodotti);
}
else{//se c'è stato un errore nella query
    echo json_encode(-1);
}


?>