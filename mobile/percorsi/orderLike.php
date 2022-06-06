<html>
    <head>

    </head>
    <body>


<?php
        session_start();
        $host="localhost";
        $user="grovago";
        $pass = "";
        $database="my_grovago";

        $connessione = new mysqli($host, $user, $pass, $database);

        echo'<div id="contenuto">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Ordina
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div id="orderLike" class="accordion-body"><button type="text" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Più like</button></div>
                  </div>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"><button type="text" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">Più recenti</button></div>
                  </div>
                </div>
            </div>';

        //error_reporting(0);

        if ($connessione === false) {
            die("Errore: " . $connessione->connect_error);
        }

        $sql = "SELECT * FROM percorso";
        if ($result = $connessione->query($sql)) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array()) { 
                    $sql2="UPDATE percorso SET like_tot=(SELECT COUNT(*)
                                                         FROM utente_percorre_tappa, percorso, tappa_appartiene_percorso
                                                         WHERE tappa_appartiene_percorso.id_percorso=".$row['id']."
                                                         AND tappa_appartiene_percorso.id_percorso=percorso.id
                                                         AND tappa_appartiene_percorso.id_tappa=utente_percorre_tappa.id_tappa
                                                         AND utente_percorre_tappa.piace=1)
                           WHERE id=".$row['id'].";";
                    $result2 = $connessione->query($sql2);
                }
            }
        }

        $i = 0;
        $sql = "SELECT * FROM percorso ORDER BY (like_tot)DESC";
        if ($result = $connessione->query($sql)) {
            if ($result->num_rows > 0) {
                echo '<div id="mostra">';
                while ($row = $result->fetch_array()) { 
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
                        FROM  tappa_appartiene_percorso
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
                    $percentuale=($nTappeCompletate/$quanteTappe)*100;
                    if($percentuale<=50){
                        $colorePercentuale="progress-bar bg-danger";
                    }else if($percentuale<=99){
                        $colorePercentuale="progress-bar bg-warning";
                    }else{
                        $colorePercentuale="progress-bar bg-success";
                    }

                    //query per vedere la prima città del percorso
                    $primaCittaQuery = "SELECT citta FROM tappa 
                                        WHERE id IN (SELECT tappa.id 
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
                                    <button style=" background-color: transparent; border:none;"><img style="border: 3px solid #B30000; position: relative;z-index: 1;" src="../../img/percorsi/'.$row['id'].'.png" class="card-img-top" alt="..." style=" border-radius:0px;"></button>
                                    <!--<img src="../../img/icons/tick.png" style="width:20%;  position: relative;z-index: 2;top: -150px;left: 150px;"> -->
                                <div class="card-body" style="text-align: center; margin-bottom:20px">
                                    <div class="progress">
                                        <div class="'.$colorePercentuale.'" role="progressbar" style="width: '.$percentuale.'%" aria-valuenow="'.$percentuale.'" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>'.$nTappeCompletate.'/'.$quanteTappe.'</p>
                                    <img class="preferito" id="' . $row['id'] . '" style="width:10%; margin:auto; padding-bottom:3px;" src= "'.$immagine.'" >
                                    <input type="hidden" name="idPercorso" value="' . $row['id'] . '">
                                    <h5 class="card-title"><input type="submit" value=" ' . $row['nome'] . '" style=" text-decoration: none; color: #B30000; font-size:18px; border: none; background-color:white"></h5>
                                    <p class="card-text">'.$row['descrizione'].'</p>
                                </div>
                            </div>
                        </form>
                    ';
                }
                echo'</div></div>';
            } else {
                echo "Non ci sono percorsi salvati nel database";
            }
        } else {
            echo "Impossibile eseguire la query";
        }
    
    ?>
    <script>
        $(function(){
    
            // opzionale, refresha all'infinito la pagina
            $.ajaxSetup ({
                cache: false
            });
           
            //quando clicco il bottone eseguo la query con ajax
            $(".preferito").click(function(){
                var idPercorso = $(this).attr("id");
                //alert(idPercorso);
                var id = $(this).attr("id");
                if($('#' + id).attr("src") == "../../img/icons/emptyStarRed.png"){ //se stella è vuota e quindi devo inserire il preferito
                    var url = "aggiungiPreferito.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idPercorso: idPercorso},
                        success: function(data){
                            $('#' + id).attr("src","../../img/icons/fullStarRed.png");
                        }
                    });
                }
                else{ //se stella è piena e quindi devo togliere il preferito
                var url = "rimuoviPreferito.php";
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {idPercorso: idPercorso},
                        success: function(data){
                            $('#' + id).attr("src","../../img/icons/emptyStarRed.png");
                        }
                    });
                }
            });
            //quando viene cliccato l'id orderLike, eseguo la query con ajax
            $("#orderLike").click(function(){
                var url = "orderLike.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {},
                    success: function(data){
                        $("#contenuto").html('');
                        $("#contenuto").html(data);
                    }
                });
            });
            $("#orderTime").click(function(){
                //alert("like");
                var url = "orderTime.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {},
                    success: function(data){
                        $("#contenuto").html('');
                        $("#contenuto").html(data);
                    }
                });
            });
        });
    </script>
    </body>
</html>