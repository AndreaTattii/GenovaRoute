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
    $sql = "SELECT * FROM utente WHERE (nome LIKE '%$search%' OR cognome LIKE '%$search%' OR username LIKE '%$search%') AND email != '" . $_SESSION['email'] . "'";
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
                echo "<br><div class='card' style='background-color:white'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['nome'] . " " . $row['cognome'] . "</h5>";
                echo "<img style='width:100px;height:100px; border-radius: 50%' src='../../img/propics/".$row['email'].".png'>";
                echo "<p style='font-size:20px' class='card-text'>" . $row['username'] . "</p>";
                echo "<p class='card-text'></p>";
                echo "<p class='card-text'> 0<img style='width:25px' src='../../img/icons/cuorePieno.png'>   " . $tappe . "<img style='width:25px' src='../../img/icons/occhioAperto.png'>   " . $preferiti . "<img style='width:25px' src='../../img/icons/fullStarRed.png'>    </p>";
                echo "<p class='card-text'></p>";
                echo "<a href='index.php?emailUtente=" . $row['email'] . "' class='btn btn-primary' style='background-color:#B30000; border:none'>Vai al profilo</a>";
                echo "</div>";
                echo "</div>";
            }
            echo"<br><br><br><br>";
        } else {
            echo "Nessun profilo trovato ...";
        }
    } else {
        echo "Errore: ".$connessione->error;
    }
?>