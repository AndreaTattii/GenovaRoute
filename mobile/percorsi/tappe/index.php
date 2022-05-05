<?php 
    session_start(); 
    $nomePercorso=$_POST['percorso'];
?>
<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Personale-->
    <link rel="stylesheet" href="../../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../../../img/G.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">


    <!-- NAVBAR -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-width: 4px; height: 70px;">
        <div class="row  justify-content-center" style="padding-top: 15px;">
            <div class="col s-4" >
                <center>
                    <a class="navbar-brand" href="../index.php" >
                        <img src="../../../img/icons/percorsoSfondo.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../../scanner/index.php ">
                        <img src="../../../img/icons/scannerizza.png">
                    </a>
                </center>

            </div>
            <div class="col s-4" style="padding-top: 15px; ">
                <center>
                    <a class="navbar-brand" href="../../profilo/index.php">
                        <img src="../../../img/icons/account.png">
                    </a>
                </center>

            </div>
        </div>


    </div>

    
    <!-- LOGO -->
    


    <!-- TITOLO PAGINA -->
    <br>
    <div style="border-top-color:#B30000;  border-top-style: solid; border-top-width: 2px; border-bottom-color:#B30000;  border-bottom-style: solid; border-bottom-width: 2px;">
        <center>
            <h1 style="color: #B30000;">Tappe<h1>
        </center>
    </div>
    <br>
    

    <!-- CONTENUTO PAGINA -->
    <?php

                    $host="127.0.0.1";
                    $user="root";
                    $pass="";
                    $database="genovaroute";
                
                    $connessione= new mysqli($host, $user, $pass , $database);
                    
                    //error_reporting(0);
            
                    if($connessione === false){
                        die("Errore: ".$connessione->connect_error);
                    }
                    $i = 0;
                    $sql = "SELECT tappa.nome FROM tappa, Tappa_Appartiene_Percorso, percorso WHERE percorso.nome = '".$nomePercorso."' AND Tappa_Appartiene_Percorso.id_tappa=tappa.id AND percorso.id=Tappa_Appartiene_Percorso.id_percorso ";
                    if($result = $connessione->query($sql)){
                        if($result->num_rows > 0){
                                    while($row=$result->fetch_array()){ //da risolvere il decentramento verticale del bottone in ogni card
                                        $i++;
                                        if($i%2==0){
                                            $coloreRiga="white";
                                        }
                                        else{
                                            $coloreRiga="#F0F0F0";
                                        }
                                        echo '
                                        <div class="col-sm align-self-center" style="width:100%;">       
                                            <div class="card text-center align-self-center" style="width:100%;  background-color: '.$coloreRiga.';">
                                                <div class="card-body">
                                                    <form action="tappaSpecifica/index.php" method="post">
                                                        <p class="card-title">
                                                            <input type="hidden" name="tappa" value="'.$row['nome'].'">
                                                            <input type="submit" value="'.$row['nome'].'" style="background-color: '.$coloreRiga.'; text-decoration: none; color: #B30000; font-size:18px; border: none; font-weight: bold; float: left;"> 
                                                            <button type="submit" class="btn btn-primary" style="background-color: #B30000; border-color:#B30000; font-size: 15px; color:white ; text-align: center; float: right;">Visualizza</button>
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>                                        
                                        </div>
                                        ';
                                    }
                        }else{
                            echo "Non ci sono tappe salvate nel database";
                        }
                    }else{
                        echo "Impossibile eseguire la query";
                    }
                ?>



</body>

</html>
<?php 
    //unset($nomePercorso);
?>