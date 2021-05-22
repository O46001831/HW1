<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "Homework");
$user = $_SESSION["username"];
$p = $_POST["prezzoTot"];
$prezzoTot = $p +0;

//con la prima query voglio trovare il numero_ordine dell'ultimo ordine effettuato
    //dall'utente:
$query = "SELECT * FROM ordini WHERE nome_utente='".$user."'";
$res = mysqli_query($conn, $query);
if (mysqli_num_rows($res) == 0){
    $lastOrdine = 0;
}
else{
    $query = "SELECT max(n_ordine) FROM ordini WHERE nome_utente='".$user."'";
    $res = mysqli_query($conn, $query);
    $max = mysqli_fetch_row($res);
    $lastOrdine = $max[0] +0;
}
$maxOrdine = $lastOrdine + 1;

//ora che abbiamo trovato il numero massimo di ordine, effettuiamo le query per 
    //gestire la tabella ordini:

$query = "INSERT INTO ordini (nome_utente, id_prodotto, quantita) SELECT * FROM elementocarrello WHERE nome_utente='".$user."'";
$res = mysqli_query($conn, $query);
if($res == true){
    //modifico nelle nuove righe create i valori di n_ordine e prezzo_tot:
    $query = "UPDATE ordini SET n_ordine='".$maxOrdine."', prezzo_tot='".$prezzoTot."' WHERE nome_utente='".$user."' and n_ordine = 0";
    $res = mysqli_query($conn, $query);
    if($res == true){
        //se nella tabella ordini ho tutto giusto, cancello gli ordini dal carrello:
        $query = "DELETE FROM elementocarrello WHERE nome_utente='".$user."'";
        $res = mysqli_query($conn, $query);
        if($res == true){
            echo json_encode(1);
        }else echo json_encode(-3);
    }   else{
            //se la query non è andata a buon fine, cancello tutto ciò che avevo 
            //precedentemente scritto sulla tabella ordini:
            $query = "DELETE FROM ordini WHERE nome_utente='".$user."' AND n_ordine= 0";
            $res = mysqli_query($conn, $query);
            echo json_encode(-2);
        }
}else echo json_encode(-1);

mysqli_close($conn);
?>