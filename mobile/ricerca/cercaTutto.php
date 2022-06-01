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
    $tipo = $connessione->real_escape_string($_POST['tipo']);

    $cartellaImmagine;
    $indiceImmagine;
    if($tipo=="tappa"){
        $cartellaImmagine="tappe";
        $indiceImmagine=".1.png";
    }
    else{
        if($tipo=="percorso"){
            $cartellaImmagine="percorsi";
            $indiceImmagine=".png";
        }


        

    }

    
    
    $sql = "SELECT * FROM ".$tipo." WHERE nome LIKE '%$search%'";
    //echo $sql;
    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            $i=0;
            while (($row = $result->fetch_array()) && ($i<13)) { 
                //echo $tipo;
                if($tipo=="utente"){
                    $cartellaImmagine="propics";
                    $email=$row['email'];
                    echo '
                    <div class="row" style="height:60px;  margin-top:10px; width:100%">
                        <div class="col-3" style="margin-left:10px">
                            <img style="width:50px;height:50px; border-radius: 50%" src="../../img/propics/'.$email.'.png">
                        </div>
                        <div class="col-8">
                            <h2 style=" font-size: 17px; color: #b30000; font-weight: bold; text-align: left; padding-top:10px; padding-bottom:10px">'.$row['nome'].'</h2>
                        </div>
                    </div>
                    
                ';
                }
                else{
                    if($tipo=="citta"){
                        echo '
                        <div class="row" style="height:60px;  margin-top:10px; width:100%">
                            <div class="col-3" style="margin-left:10px">
                                <img style="width:40px;height:40px; border-radius: 50%" src="../../img/icons/marker.png">
                            </div>
                            <div class="col-8">
                                <h2 style=" font-size: 17px; color: #b30000; font-weight: bold; text-align: left; padding-top:10px; padding-bottom:10px">'.$row['nome'].'</h2>
                            </div>
                        </div>                   
                    ';       
                    }
                    else{
                        if($tipo == "categoria"){
                            echo '
                                <div class="row" style="height:60px;  margin-top:10px; width:100%">
                                    
                                    <div class="col-8">
                                        <h2 style=" font-size: 17px; color: #b30000; font-weight: bold; text-align: left; padding-top:10px; padding-bottom:10px">'.$row['nome'].'</h2>
                                    </div>
                                </div>                   
                            '; 
                        }
                        else{
                            echo '
                            <a style="text-decoration:none; color:black;" href="tappaSpec.php?id=' . $row['id'] . '">
                                <div class="row" style="height:60px;  margin-top:10px; width:100%">
                                    <div class="col-3" style="margin-left:10px">
                                        <img style="width:50px;height:50px; border-radius: 50%" src="../../img/'.$cartellaImmagine.'/'.$row['id'].''.$indiceImmagine.'">
                                    </div>
                                    <div class="col-8">
                                        <h2 style=" font-size: 17px; color: #b30000; font-weight: bold; text-align: left; padding-top:10px; padding-bottom:10px">'.$row['nome'].'</h2>
                                    </div>
                                </div>
                            </a>                 
                            ';
                        }
                    }
                }
                $i++;
            
            }
            echo "<br><br><br><br>";

        } else {
            echo "Nessun risultato...";
        }
    } else {
        echo "Impossibile eseguire la query";
    }
?>