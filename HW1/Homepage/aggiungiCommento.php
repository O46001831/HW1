<?php
    session_start();
    $user = $_SESSION["username"];
    $idProdotto = $_POST["idProdotto"];
    $conn = mysqli_connect("localhost", "root", "", "Homework");
    $commento = mysqli_real_escape_string($conn, $_POST["commento"]);
    

    $query="INSERT INTO recensione VALUES( '', ".$idProdotto.", '".$user."', '".$commento."')";
    $res = mysqli_query($conn, $query);

    if($res == true){//il commento è stato aggiunto:
        echo json_encode($idProdotto);
    }
    elseif($res == false){
        echo json_encode(-1);
    }
?>