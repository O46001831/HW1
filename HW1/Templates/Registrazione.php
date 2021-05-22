<?php
            //Verifica l'esistenza di dati POST
            if(isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["indirizzo"])
                && isset($_POST["cellulare"]) && isset($_POST["username"]) && isset($_POST["password"])){
                 
                $conn = mysqli_connect("localhost", "root", "", "Homework");
                //escape dell'input:
                $nome = mysqli_real_escape_string($conn, $_POST['nome']); 
                $cognome = mysqli_real_escape_string($conn, $_POST['cognome']); 
                $indirizzo = mysqli_real_escape_string($conn, $_POST['indirizzo']); 
                $cellulare = mysqli_real_escape_string($conn, $_POST['cellulare']); 
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $psw = mysqli_real_escape_string($conn, $_POST['password']);

                $username = strtolower($username);
               
                //verifichiamo che lo username non sia già in uso:  
                    $query = "SELECT * FROM utenti WHERE username ='".$username."'";
                    $res = mysqli_query($conn, $query);
                    if(mysqli_num_rows($res) > 0 ){ // SE LO USERNAME E' GIA' STATO USATO:
                        $errore = -1;

                        echo json_encode($errore);
                    }
                    else{//SE LO USERNAME NON E' MAI STATO USATO:
                        //liberiamo le variabili precedentemente allocate:
                       
                        //e le riallochiamo per fare un'altra richiesta:   */
                        
                        $query = "INSERT INTO utenti  VALUES ('','".$nome."','".$cognome."','".$indirizzo."','".$cellulare."','".$username."','".$psw."')";
                        $res = mysqli_query($conn, $query);
                        if($res === true){
                            //reindirizziamo l'utente in una pagina di conferma di registrazione che lo porterà al login
                            //liberiamo lo spazio:
                            $result = 1;
                            echo json_encode($result);
                        }
                        else{
                            //ricarico la pagina
                            mysqli_close($conn);
                            echo 2;
                        }

                        mysqli_close($conn);
                        
                    }
                
            }
        ?>