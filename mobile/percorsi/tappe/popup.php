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
    $idPercorso = $_POST['idPercorso'];
    $nomeTappa = $_POST['nomeTappa'];

    $sql = 'SELECT tappa.id, tappa.ordine, percorso.id
            FROM Tappa, Percorso, Tappa_Appartiene_Percorso
            WHERE  Tappa.id = Tappa_Appartiene_Percorso.id_tappa
            AND  percorso.id = Tappa_Appartiene_Percorso.id_percorso 
            AND  percorso.id = '.$idPercorso.'
            AND tappa.nome = "'.$nomeTappa.'";';
    echo $sql;
    
    $result = $connessione->query($sql);
    $row = $result->fetch_assoc();
    echo'<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-body">
            Hello, world! This is a toast message.
            <div class="mt-2 pt-2 border-top">
              <button type="button" class="btn btn-primary btn-sm">Take action</button>
              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
            </div>
          </div>
        </div>';
?>