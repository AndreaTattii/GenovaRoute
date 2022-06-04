<?php
session_start();
/* ACCENTI */
//error_reporting(0);

$host = "127.0.0.1";
$user = "grovago";
$pass = "";
$database="my_grovago";

$connessione = new mysqli($host, $user, $pass, $database);

if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);

}

$idTappa = $_GET['idTappa'];
?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../img/G.png" type="image/icon type">
</head>

<body>


    <!-- NAVBAR BASSA-->
    

    <form action="pubblicaCommento.php" method="POST">
        <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 1px; padding-bottom:10px;">
            <div class="row  justify-content-start " style="padding-top: 15px; ">
                <div class="col-2">
                    <img style="width:50px;height:50px; border-radius: 50%" src="../../img/propics/<?php echo $_SESSION['email']; ?>.png<?php echo '?t='.time()?>">
                </div>
                <div class="col-10" >
                    <div class="row" style="border:1px solid black; border-radius:20px">
                        <div class="col-7" style="margin: 5px; ">
                            <textarea  id="commento"  name="commento" placeholder="Aggiungi un commento"  maxlength="2000" style="border: none; width:200px" required></textarea>
                        </div>
                        <div class="col-3">
                            <input type="hidden" value="<?php echo $_SESSION['email']; ?>" id="email" name="email">
                            <input type="hidden" value="<?php echo $idTappa; ?>" id="idTappa" name="idTappa">
                            <button style="margin: 5px; background-color:white; color:#B30000" >Pubblica</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    


    <!-- NAVBAR ALTA -->
    <div class="container fixed-top">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px;">

            <div class="col-2">
                <a href="index.php">
                    <img id="back" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8">
                <h1 style=" color: white; font-weight: bold; text-align: center;  font-size: 17px;">Commenti</h1>
            </div>
            <div class="col-2">
                
            </div>
        </div>
    </div>





    <!-- CONTENUTO PAGINA -->
    <div class="container" style="margin-top:70px;">
        <?php
            $sql = "SELECT DISTINCT commento, username, utente.email, data
                    FROM utente_percorre_tappa, utente
                    WHERE utente_percorre_tappa.email = utente.email
                        AND commento IS NOT NULL
                        AND id_tappa = ".$idTappa."
                    ORDER BY (data)DESC
            "; 
            if($result = $connessione->query($sql)){
                if($result->num_rows > 0){
                    while($row = $result->fetch_array()){
                        $data = $row['data'];
                        $arrayData = explode(' ', $data);
                        $giornoMeseAnno = explode('-', $arrayData[0]);
                        $anno = $giornoMeseAnno[0];
                        $mese = $giornoMeseAnno[1];
                        $giorno = $giornoMeseAnno[2];
                        echo'
                            <div class="row  justify-content-start " style="margin-top: 10px; margin: bottom 15px; ">
                                <div class="col-1">
                                    <img style="width:40px;height:40px; border-radius: 50%" src="../../img/propics/'.$row['email'].'.png?t='.time().'">
                                </div>
                                <div class="col-10" style="margin-left: 10px;">
                                    <p>
                                        <b>'.$row['username'].'</b>
                                        '.$row['commento'].'
                                        <br>
                                        
                                    </p>
                                    <p style="color:#909090; margin-bottom:30px; ">
                                            Visitata il '.$giorno.'/'.$mese.'/'.$anno.'

                                    </p>
                                </div>
                            </div>
                            
                        ';
                    }
                }else{
                    echo '<p style="color:#909090; margin-bottom:30px; ">Scrivi il primo commento</p>';
                }
            }else{
                echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
            }
        ?>
    </div>


    

   




    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="loader-wrapper">
        <div id="container">
            <svg viewBox="0 0 100 100">
                <defs>
                  <filter id="shadow">
                    <feDropShadow dx="0" dy="0" stdDeviation="1.5" 
                      flood-color="#fc6767"/>
                  </filter>
                </defs>
            <circle id="spinner" style="fill:transparent;stroke:#dd2476;stroke-width: 7px;stroke-linecap: round;filter:url(#shadow);" cx="50" cy="50" r="45"/>
            </svg>
        </div>
    </div>
    <script>
        $(window).on('load', function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>

</body>

</html>
