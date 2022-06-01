<?php
    session_start();
    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $database = "genovaroute";
    $connessione = new mysqli($host, $user, $pass, $database);
    if ($connessione === false) {
        die("Errore: " . $connessione->connect_error);
    }
    $search = $connessione->real_escape_string($_POST['query']);
    $sql = "SELECT * FROM tappa WHERE nome LIKE '%$search%'";
    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) { 
                echo '
                    <div class="row" style="height:60px;  margin-top:10px; width:100%">
                        <div class="col-3" style="margin-left:10px">
                            <img style="width:50px;height:50px; border-radius: 50%" src="../../img/tappe/'.$row['id'].'.1.png?t='.time().'">
                        </div>
                        <div class="col-8">
                            <h2 style=" font-size: 17px; color: #b30000; font-weight: bold; text-align: left; padding-top:10px; pdding-bottom:10px">'.$row['nome'].'</h2>
                        </div>
                    </div>
                    
                ';
            }
            echo "<br><br><br><br>";

        } else {
            echo "Nessun risultato...";
        }
    } else {
        echo "Impossibile eseguire la query";
    }
?>