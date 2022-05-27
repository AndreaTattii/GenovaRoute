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
    
    $search = $connessione->real_escape_string($_POST['query']);
    //seleziona tutti gli utenti che hanno un nome, cognome o username che contengono $search
    $sql = "SELECT * FROM utente WHERE (nome LIKE '%$search%' OR cognome LIKE '%$search%' OR username LIKE '%$search%') AND email != '" . $_SESSION['email'] . "' AND email!='admin@admin'";
    if($result = $connessione->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_array()){
                $sql2 = "SELECT COUNT(*) AS tappe FROM utente_percorre_tappa WHERE email = '" . $row['email'] . "'";
                if($result2 = $connessione->query($sql2)){
                    $row2 = $result2->fetch_array();
                    $tappe = $row2['tappe'];
                }
                else{
                    echo "Impossibile eseguire la query";
                }
                //fai una query per vedere quanti percorsi l'utente ha aggiunto ai preferiti
                $sql3 = "SELECT COUNT(*) AS preferiti FROM utente_preferisce_percorso WHERE email = '" . $row['email'] . "'";
                if($result3 = $connessione->query($sql3)){
                    $row3 = $result3->fetch_array();
                    $preferiti = $row3['preferiti'];
                }
                else{
                    echo "Impossibile eseguire la query";
                }
                //fai una query per vedere a quante tappe l'utente ha messo mi piace
                $sql4 = "SELECT COUNT(*) AS likeTappe FROM utente_percorre_tappa WHERE email = '" . $row['email'] . "' AND piace=1";
                if($result4 = $connessione->query($sql4)){
                    $row4 = $result4->fetch_array();
                    $likeTappe = $row4['likeTappe'];
                }
                else{
                    echo "Impossibile eseguire la query";
                }
                    echo"<br>
                    <a style='text-decoration:none; color:black;' href='index.php?emailUtente=" . $row['email'] . "'>
                        <div class='row' style='border-bottom:1px solid black'>
                            <div class='col-4'>
                                <img style='width:100px;height:100px; border-radius: 50%' src='../../img/propics/".$row['email'].".png'>

                                <span style='' class='position-absolute top10 start100 translate-middle badge rounded-pill bg-danger'>
                                    ".$row['livello']."
                                </span>

                            </div>
                            <div class='col-8'>
                                <h5>".$row['username']."</h5>
                                <p>".$row['nome']." ".$row['cognome']."</p>
                                <p class='card-text'>".$likeTappe."<img style='width:25px' src='../../img/icons/cuorePieno.png'>   " . $tappe . "<img style='width:25px' src='../../img/icons/occhioAperto.png'>   " . $preferiti . "<img style='width:25px' src='../../img/icons/fullStarRed.png'>    </p>
                                <br>
                            </div>    
                        </div>
                    </a>";
            }
            echo"<br><br><br><br>";
        } else {
            echo "Nessun profilo trovato ...";
        }
    } else {
        echo "Errore: ".$connessione->error;
    }
?>