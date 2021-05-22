<?php
    //avvio sessione
    session_start();
    //elimino la sessione:
    session_destroy();
    //torniamo alla pagina di login:
    header("Location: ../Homepage/Wellcome.php");
?>