<?php
session_start();

$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "GenovaRoute";

$connessione = new mysqli($host, $user, $pass, $database);

if ($connessione === false) {
    echo "Errore: " . $connessione->error;
}
$i = 0;
$email = $_POST['email'];
$sql = "SELECT * FROM utente_percorre_tappa, tappa WHERE email = '" . $email . "' AND tappa.id=id_tappa AND piace IS NOT NULL ORDER BY (utente_percorre_tappa.data)DESC";
    $result = $connessione->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($i % 3 == 0 && $i!=0) {
                echo '</div>';
            }
            if ($i % 3 == 0 || $i = 0) {
                echo '<div class="row" style="width:100%; padding:0px; margin:0px;">';
            }
            echo   "
                            <div class='col-4' style='height: 90px; padding:0px; margin:0px;' >
                                <a  href='mostraTappa.php?idTappa=".$row['id']."&email=".$email."'>   <img src='../../img/tappe/" . $row['id'] . ".1.png' style='width:100%; height: 100%;padding:1px; margin:5px;' > </a>
                            </div>
                            
                        ";
            
            $i++;
        }
        
        echo "<br><br><br><br>";
    } else {
        if ($_SESSION['email'] == $email) {
            echo '
                <div class="row" style="margin-top:100px">
                    <div class="col-12" style="text-align:center">
                        <img src="../../img/icons/greyHearth.png" style="width:20%">
                    </div>
                </div>
                <div class="row" style="text-align:center">
                    <b><p style="color:#909090; margin-bottom:30px; ">Non hai ancora messo mi piace a nessuna tappa</p></b>
                </div>
            ';
        } else {
            echo '
                <div class="row" style="margin-top:100px">
                    <div class="col-12" style="text-align:center">
                        <img src="../../img/icons/greyHearth.png" style="width:20%">
                    </div>
                </div>
                <div class="row" style="text-align:center">
                    <b><p style="color:#909090; margin-bottom:30px; ">Non ha ancora messo mi piace a nessuna tappa</p></b>
                </div>
            ';
        }
    }


?>

