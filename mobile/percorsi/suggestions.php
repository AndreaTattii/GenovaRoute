<?php
    session_start();
        $host = "127.0.0.1";
        $user = "root";
        $pass = "";
        $database = "genovaroute";

        $connessione = new mysqli($host, $user, $pass, $database);

        //error_reporting(0);

        if ($connessione === false) {
            die("Errore: " . $connessione->connect_error);
        }

        $search = $connessione->real_escape_string($_POST['query']);

        $i = 0;
        $sql = "SELECT * FROM percorso WHERE nome LIKE '%$search%' ORDER BY (SELECT COUNT(*) AS numero_tappe FROM percorso, tappa, tappa_appartiene_percorso WHERE id_percorso=percorso.id AND id_tappa=tappa.id)";
        if ($result = $connessione->query($sql)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) { //da risolvere il decentramento verticale del bottone in ogni card
                    $i++;
                    if ($i % 2 == 0) {
                        $coloreRiga = "white";
                    } else {
                        $coloreRiga = "#F0F0F0";
                    }

                    //query per vedere se utente ha completato percorso
                    $sql2 = "SELECT * FROM utente_percorre_tappa WHERE email = '" . $_SESSION['email'] . "' 
                             AND id_tappa IN (SELECT id_tappa FROM tappa_appartiene_percorso, percorso 
                                              WHERE id_percorso=" . $row['id'] . ");";
                    
                    //query per vedere quante tappe 
                    $quanteTappeQuery = "SELECT MAX(ordine)  
                        FROM  Tappa_Appartiene_Percorso
                        WHERE id_percorso =  " . $row['id'] . ";";
                    if ($risultato = $connessione->query($quanteTappeQuery)) {
                        $row3 = $risultato->fetch_assoc();
                        $quanteTappe = $row3['MAX(ordine)']+1;
                    } else {
                        echo "Impossibile eseguire la quante tappe query";
                    }

                    if ($result2 = $connessione->query($sql2)) {
                        $nTappeCompletate=$result2->num_rows;
                        if ($result2->num_rows == $quanteTappe) {
                            $completato=true;
                        } else {
                            $completato=false;
                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }



                    //query per vedere la prima città del percorso
                    $primaCittaQuery = "SELECT citta FROM tappa 
                                        WHERE id IN (SELECT Tappa.id 
                                                    FROM tappa_appartiene_percorso, tappa 
                                                    WHERE id_percorso = " . $row['id'] . " 
                                                            AND ordine = 0
                                                            AND tappa.id = tappa_appartiene_percorso.id_tappa
                                                    );
                                    ";
                    if ($risultato = $connessione->query($primaCittaQuery)) {
                        $riga = $risultato->fetch_assoc();
                        $primaCitta = $riga['citta'];
                    } else {
                        echo "Errore nella query: " . $primaCittaQuery . "<br>" . $connessione->error;
                    }
                    $border="border-top:none;";
                    if($i == 0){
                        $border = "";
                    }
                    //fai una query per vedere se l'utente ha aggiunto il percorso ai preferiti
                    $sql3 = "SELECT * FROM utente_preferisce_percorso 
                            WHERE email = '" . $_SESSION['email'] . "' 
                            AND id_percorso = " . $row['id'] . ";
                            ";
                    if ($result3 = $connessione->query($sql3)) {
                        if ($result3->num_rows > 0) {
                            $immagine = "../../img/icons/fullStarRed.png" ;
                        } else {
                            $immagine = "../../img/icons/emptyStarRed.png";
                        }
                    } else {
                        echo "Errore: " . $connessione->error;
                    }
                
                    echo '
                    <br>
                    <form action="tappe/index.php" method="post">
                        <div class="card " style="border:none;  text-align: left;">
                            <div class="card-header" style="background-color:white; margin-left:0px; padding-left:0px;border:none; ">
                                <p class="card-title"><img src="../../img/icons/marker.png" style="width: 30px; margin-bottom: 15px; ">'.$primaCitta.'</p>
                            </div>
                                <button style=" background-color: transparent; border:none;"><img style="';if($completato){echo 'filter: brightness(60%)';}echo';border: 3px solid #B30000; position: relative;z-index: 1;" src="../../img/percorsi/'.$row['id'].'.png" class="card-img-top" alt="..." style=" border-radius:0px;"></button>
                                <!--<img src="../../img/icons/tick.png" style="width:20%;  position: relative;z-index: 2;top: -150px;left: 150px;"> -->
                            <div class="card-body" style="text-align: center; border-bottom: 2px dotted black;">

                            <img class="preferito" id="' . $row['id'] . '" style="width:10%; margin:auto; padding-bottom:3px;" src= "'.$immagine.'" >
                                <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                <h5 class="card-title"><input type="submit" value=" ' . $row['nome'] . '" style=" text-decoration: none; color: #B30000; font-size:18px; border: none; background-color:white">';if($completato){echo '<img src="../../img/icons/tickBlack.png" style="width:10%;color:">';}echo'</h5>
                                <p class="card-text">'.$row['descrizione'].'</p>
                            </div>
                        </div>
                    </form>
                    ';
                }
            } else {
                echo "Nessun risultato...";
            }
        } else {
            echo "Impossibile eseguire la query";
        }
?>