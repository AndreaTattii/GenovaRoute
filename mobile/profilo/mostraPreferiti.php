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

    //mostra i percorsi aggiunti ai preferiti
    $sql = "SELECT * FROM utente_preferisce_percorso, percorso WHERE email = '" . $_SESSION['email'] . "' AND percorso.id=id_percorso";
    $result = $connessione->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo   "<div class='row'>
                        <div class='col-sm-12'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$row['nome']."</h5>
                                    <p class='card-text'>".$row['descrizione']."</p>
                                    <a href='../../percorso/mostraPercorso.php?id=".$row['id']."' class='btn btn-primary'>Vai al percorso</a>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        echo"<br><br><br><br>";
    } else {
        echo "Non hai aggiunto nessun percorso ai preferiti";
    }

    //header("Location: ../percorsi/index.php");

?>