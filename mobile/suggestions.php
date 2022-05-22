<?php
                    session_start(); 
        
                    $host="127.0.0.1";
                    $user="root";
                    $pass="";
                    $database="GenovaRoute";
                
                    $connessione = new mysqli($host, $user, $pass , $database);
            
                    if($connessione === false){
                        echo "Errore: ".$connessione->error;
                    }
            // if the user has entered a search term
            if(isset($_POST['query'])){
                // clean it
                $search = $connessione->real_escape_string($_POST['query']);
                // get the search term
                $sql = "SELECT * FROM utente WHERE nome LIKE '%$search%' OR cognome LIKE '%$search%' OR username LIKE '%$search%'";
                // execute the query
                $result = $connessione->query($sql);
                // if we have results
                if($result->num_rows > 0){
                    echo "";
                    // output data of each row
                    while($row = $result->fetch_assoc()){
                        echo "
                        Username: " . $row["username"]. " - Name: " . $row["nome"]. " " . $row["cognome"]. "<br>";
                    }
                    echo"";
                }
                else{
                    echo "Nessun risultato...";
                }
            }
        ?>