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
    $email=$_POST['email'];
    $i = 0;
    //mostra i percorsi aggiunti ai preferiti
    $sql = "SELECT * FROM utente_preferisce_percorso, percorso WHERE email = '" . $email . "' AND percorso.id=id_percorso ORDER BY (data)DESC";
    $result = $connessione->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($i % 3 == 0 && $i!=0) {
                echo '</div>';
            }
            if ($i % 3 == 0 || $i = 0) {
                echo '<div class="row" style="width:100%; padding:0px; margin:0px;">';
            }
            echo   "
                    <div class='col-4' style='height: 90px; padding:0px; margin:0px;' onclick='submit()'>
                        <a  href='../percorsi/tappe/index.php?idPercorso=".$row['id']."'>
                            <img src='../../img/percorsi/" . $row['id'] . ".png' style='width:100%; height: 100%;padding:1px; margin:5px;' >
                        </a>
                    </div>
                    
                ";
            
            $i++;
        }
        echo"<br><br><br><br>";
    } else {
        if($_SESSION['email']==$email){
            echo '
                <div class="row" style="margin-top:100px">
                    <div class="col-12" style="text-align:center">
                        <img src="../../img/icons/greyStar.png" style="width:20%">
                    </div>
                </div>
                <div class="row" style="text-align:center">
                    <b><p style="color:#909090; margin-bottom:30px; ">Non hai ancora messo tra i preferiti nessun percorso</p></b>
                </div>
            ';
        }
        else{
            echo '
                <div class="row" style="margin-top:100px">
                    <div class="col-12" style="text-align:center">
                        <img src="../../img/icons/greyStar.png" style="width:20%">
                    </div>
                </div>
                <div class="row" style="text-align:center">
                    <b><p style="color:#909090; margin-bottom:30px; ">Non ha ancora messo tra i preferiti nessun percorso</p></b>
                </div>
            ';
        }
    }

    //header("Location: ../percorsi/index.php");

?>
