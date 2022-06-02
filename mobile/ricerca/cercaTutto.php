<html>
    <head></head>
    <body>
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

                    //query
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

                    echo "<br>
                    <a style='text-decoration:none; color:black;' href='../profilo/index.php?emailUtente=" . $row['email'] . "'>
                        <div class='row' style='border-bottom:1px solid black; width:100%'>
                            <div class='col-4'>
                                <img style='z-index: 1;width:100px;height:100px; border-radius: 50%' src='../../img/propics/".$row['email'].".png'>
                                <span style='position: relative;z-index: 2;top: -100px;left: 75px;' class='badge rounded-pill bg-danger'>
                                    ".$row['livello']."
                                </span>
                            </div>
                            <div class='col-8'>
                                <h5>".$row['username']."</h5>
                                <p>".$row['nome']." ".$row['cognome']."</p>
                                <p class='card-text'>".$likeTappe."<img style='width:25px' src='../../img/icons/cuorePieno.png'>   " . $tappe . "<img style='width:25px' src='../../img/icons/occhioAperto.png'>   " . $preferiti . "<img style='width:25px' src='../../img/icons/fullStarRed.png'>    </p>
                            </div>    
                        </div>
                    </a>";
                    
                
                }
                else{
                    if($tipo=="citta"){
                        echo '
                        <a style="text-decoration:none; color:black;" href="mappaCitta.php?citta=' . $row['nome'] . '">
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
                            if($tipo == "percorso"){
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
                                        <div class="row" style="height:60px;  margin-top:10px; width:100%">
                                            <div class="col-3" style="margin-left:10px">
                                                <img style="width:50px;height:50px; border-radius: 50%" src="../../img/'.$cartellaImmagine.'/'.$row['id'].''.$indiceImmagine.'">
                                            </div>
                                            <div class="col-6">
                                                <h2 style=" font-size: 17px; color: #b30000; font-weight: bold; text-align: left; padding-top:10px; padding-bottom:10px">'.$row['nome'].'</h2>
                                            </div>
                                            <div class="col-2">
                                                <img class="preferito" id="' . $row['id'] . '" style="width:60%; margin:auto;padding-top:11px " src= "'.$immagine.'" >
                                            </div>
                                        </div>
                                ';
                                
                            }else{
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
    <script>
        $(document).ready(function() {
            $(".preferito").click(function(){
                //alert("cliccato");
                var idPercorso = $(this).attr("id");
                var id = $(this).attr("id");
                if($('#' + id).attr("src") == "../../img/icons/emptyStarRed.png"){ 
                    var url = "../percorsi/aggiungiPreferito.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idPercorso: idPercorso},
                        success: function(data){
                            $('#' + id ).attr("src","../../img/icons/fullStarRed.png");
                        }
                    });
                }
                else{ 
                var url = "../percorsi/rimuoviPreferito.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idPercorso: idPercorso},
                        success: function(data){
                            $('#' + id ).attr("src","../../img/icons/emptyStarRed.png");
                        }
                    });
                }
            });
        });
    </script>
    </body>
</html>