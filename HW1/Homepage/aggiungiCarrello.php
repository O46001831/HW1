<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "Homework");
$nome_utente = $_SESSION["username"];
$p = $_POST["prodotto"];
//converto il numero del prodotto in un intero:
$id_prodotto = $p + 0; 

$query= "SELECT * from elementoCarrello WHERE nome_utente='".$nome_utente."' AND id_prodotto=".$id_prodotto;
$res = mysqli_query($conn, $query);

$flag=0;

if(mysqli_num_rows($res) > 0 ){ //se l'utente ha già nel carrello quel prodotto
    //aggiungiamo una quantità impostando $flag=1
    $flag=1;
    
}

if($flag===0){
    //se l'utente non ha ancora nel carrello il prodotto, lo aggiungiamo
    $query = "INSERT INTO elementocarrello VALUES ('".$nome_utente."',".$id_prodotto.", 1)";
    $res = mysqli_query($conn, $query);
    //echo json_encode($resInsert);

    if($res===true){
        echo json_encode(1);
    }
    else 
        echo json_encode(-1);
}
else{
    //se lo aveva già aggiorniamo la quantità:
    mysqli_free_result($res);
    $query = "UPDATE elementocarrello SET quantita=quantita+1 WHERE nome_utente='".$nome_utente."' AND id_prodotto=".$id_prodotto;
    $res = mysqli_query($conn, $query);
    if($res===true){
        echo json_encode(2);
    }
    else 
        echo json_encode(-2);
}

?>
