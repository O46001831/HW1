<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "Homework");
$user = $_SESSION["username"];
$idProdotto = $_POST["idProdotto"];

$query = "SELECT quantita FROM elementoCarrello WHERE nome_utente='".$user."' AND id_prodotto =".$idProdotto;
$res = mysqli_query($conn, $query);

$quantita = mysqli_fetch_row($res);

if($quantita[0] > 1 ){ //se ho più prodotti uguali, elimino una quantità
    $query ="UPDATE elementoCarrello SET quantita=quantita-1 WHERE nome_utente='".$user."' AND id_prodotto =".$idProdotto;
    $res = mysqli_query($conn, $query);
    if($res == true){
        echo json_encode("elemento diminuito di 1");
    }
    else{
        echo -1;
    }
}
elseif ($quantita[0] == 1){//se ho un solo prodotto, lo elimino definitivamente dal carrello
    $query="DELETE FROM elementoCarrello WHERE nome_utente='".$user."' AND id_prodotto =".$idProdotto;
    $res=mysqli_query($conn, $query);
    if($res == true){
        echo json_encode("elemento eliminato");
    }
    else{
        echo -1;
    }
}

?>