<?php
            //verifica l'accesso:
            if(isset($_SESSION["username"])){
                //vai alla home
                header("Location: ../Homepage/Homepage.php");
                exit;
            }
            //Verifica l'esistenza di dati POST
            if(isset($_POST["username"]) && isset($_POST["password"])){
                //connessione al db
                $conn = mysqli_connect("localhost", "root", "", "Homework");                
                //escape dell'input:
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                //cerchiamo le credenziali:
                $query = "SELECT * FROM utenti WHERE username ='".$username."' AND password ='".$password."'";
                $res = mysqli_query($conn, $query);
                //verifichiamo che le credenziali siano all'interno del db:
                if(mysqli_num_rows($res) > 0 ){
                    //sono corrette! impostiamo la variabile di sessione:
                    $_SESSION["username"] = $_POST["username"];
                    //liberiamo lo spazio e andiamo alla home:
                    header("Location: ../Homepage/Homepage.php");
                    mysqli_free_results($res);
                    mysqli_close($conn);

                    exit;
                }
                else {
                    //flag di errore:
                    $errore = true;
                    //e liberiamo lo spazio:
                    //mysqli_free_results($res);
                    //mysqli_close($conn);
                }
            }
        ?>