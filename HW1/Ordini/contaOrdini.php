<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "Homework");
$user = $_SESSION["username"];

$query = "SELECT max(n_ordine) FROM ordini WHERE nome_utente='".$user."'";
$res = mysqli_query($conn, $query);
$max = mysqli_fetch_row($res);
$lastOrdine = $max[0] +0;
echo json_encode($lastOrdine);

?>