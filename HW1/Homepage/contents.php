<?php
//con questo file vogliamo tornato un json uguale al vecchio file contents.js 

$conn = mysqli_connect("localhost", "root", "", "Homework");
$query = "SELECT * FROM prodotti";
$res = mysqli_query($conn, $query);

if(mysqli_num_rows($res) > 0 ){ //se la tabella è stata letta correttamente
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
else{//se c'è stato un errore nella query
    echo -1;
}

?>