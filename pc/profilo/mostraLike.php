<?php
    session_start(); 

    $host="127.0.0.1";
    $user="grovago";
    $pass="";
    $database="my_grovago";

    $connessione = new mysqli($host, $user, $pass , $database);

    if($connessione === false){
        echo "Errore: ".$connessione->error;
    }
    $email=$_POST['email'];
    $sql="SELECT * FROM utente_percorre_tappa, tappa WHERE email = '" . $email . "' AND tappa.id=id_tappa AND piace=1";
    $result = $connessione->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo   "<div class='row'>
                        <div class='col-sm-12'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h5 class='card-title'>".$row['nome']."</h5>
                                    <p class='card-text'>".$row['descrizione']."</p>
                                    <a href='../../percorso/mostraPercorso.php?id=".$row['id']."' class='btn btn-primary'>Vai alla tappa</a>
                                </div>
                            </div>
                        </div>
                    </div>";
        }
        echo"<br><br><br><br>";
    } else {
        if($_SESSION['email']==$email){
            echo "Non hai messo mi piace a nessuna tappa";
        }
        else{
            echo "Non ha messo mi piace a nessuna tappa";
        }
    }
?>