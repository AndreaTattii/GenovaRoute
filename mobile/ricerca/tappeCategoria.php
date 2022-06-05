<?php
session_start();
$_SESSION['arrivoDaTappeCategoria'] = true;
$host = "127.0.0.1";
$user = "root";
$pass = "";
$database = "genovaroute";
$connessione = new mysqli($host, $user, $pass, $database);
if ($connessione === false) {
    die("Errore: " . $connessione->connect_error);
}
//error_reporting(0);
unset($_SESSION['vengoDaMappa']);

$nomeCategoria = $_GET['categoria'];
?>
<!doctype html>
<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
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
    <link rel="icon" href="img/g.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center" >
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="percorsoSfondo" src="../../img/icons/percorsoRosso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../ricerca/index.php">
                        <img id="ricercaNavImg" src="../../img/icons/searchBlack.png">
                    </a>
                </center>

            </div>

            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../scanner/index.php ">
                        <img style="width:25px" src="../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsiPersonali/index.php ">
                        <img style="width:25px" src="../../img/icons/aggiungiPercorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../profilo/index.php">
                        <img id="account" src="../../img/icons/account.png">
                    </a>
                </center>
            </div>
        </div>
    </div>



    <!-- NAVBAR ALTA -->
    <div class="container fixed-top">
        <div class="row justify-content-center align-items-center" style="background-color: #B30000;  padding-top: 10px; height:60px">
            <div class="col-2" style=" padding: bottom 20px;">
                <a href="index.php" >
                    <img id="back" src="../../img/icons/back.png">
                </a>
            </div>
            <div class="col-8" >
                <h1  style=" color: white; font-weight: bold; text-align: center;"><?php echo $nomeCategoria ?></h1>
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    

    <!-- CONTENUTO PAGINA -->
    <?php
    $sql = "  
            SELECT nome, id 
            FROM tappa 
            WHERE categoria = '".$nomeCategoria."'
    ";
    if($result = $connessione->query($sql)){
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '
                        <a style="text-decoration:none; color:black;" href="tappaSpec.php?id=' . $row['id'] . '">
                            <div class="row" style="height:60px;  margin-top:10px; width:100%">
                                <div class="col-3" style="margin-left:10px">
                                    <img style="width:50px;height:50px; border-radius: 50%" src="../../img/tappe/'.$row['id'].'.1.png">
                                </div>
                                <div class="col-8">
                                    <h2 style=" font-size: 17px; color: #b30000; font-weight: bold; text-align: left; padding-top:10px; padding-bottom:10px">'.$row['nome'].'</h2>
                                </div>
                            </div>
                        </a>                 
                    ';
            }
        }else{
            echo '<p style="color:#909090;">Non sono ancora presenti tappe per questa categoria</p>';
        }
    }

    ?>


    

    
    
    <script>
        window.addEventListener("orientationchange", function() {
            if (window.orientation == 90 || window.orientation == -90) {
                alert("Gira lo schermo in verticale!!!")
                //window.orientation = 0;
                //document.getElementById("orientation").style.display = "none";
                //window.location.reload();
            }
        });

    </script>
</body>

</html>