<?php session_start();


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
    <link rel="stylesheet" href="../../css/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Playfair Display' rel='stylesheet'>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@1,400;1,700&display=swap" rel="stylesheet">

    <title>Genova Route</title>
    <link rel="icon" href="../img/g.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container p-2">
            <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold;" href="./">
                <h1>Genova Route</h1>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="percorsi/index.php" style="color: white">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white">Percorsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profilo/index.php" style="color: white">Tappe</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CORPO -->

    <div class="container">
        
        <div class="row" style="padding:15px; margin:15px;">
            <div class="col">

            </div>
            <div class="col">
                <div class="row  " style="margin-top:100px;">
                    <form action="gestioneP.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:#B30000; width:100%; border-color:#B30000">Gestisci i percorsi</button>
                    </form>
                </div>
                <div class="row" style="margin-top:20px">
                    <form action="gestioneT.php" method="POST">
                        <button type="submit" class="btn btn-primary" style="background-color:#B30000; width:100%; border-color:#B30000">Gestisci le tappe</button>
                    </form>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
        <br>
        <br>
        <br>
        <!-- PERCORSI -->
        <div class="row" style="margin-top:20px; padding: 10px; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; border-bottom-color:#F0F0F0;  border-bottom-style: solid; border-bottom-width: 3px; ">
            <h2 style="color:#B30000; text-align:center;" >Percorsi</h2>
        </div>
        <br>
        <div class="container" style="border-color : black;  border-style: solid; border-width: 1px;">
            <div class="row" style="border-bottom-color : black;  border-bottom-style: solid; border-bottom-width: 1px;">
            <div class="col-2">
                    <h3>ID</h3>
                </div>
                <div class="col-5">
                    <h3>Nome</h3>
                </div>
                <div class="col-4">
                    <h3>Descrizione</h3>   
                </div>
            </div>
            <?php
        
                $host="127.0.0.1";
                $user="root";
                $pass="";
                $database="GenovaRoute";
                $connessione = new mysqli($host, $user, $pass , $database);

                $i=0;
                error_reporting(0);

                if($connessione === false){
                    echo "Errore: ".$connessione->error;
                }

                //stampa tutti i percorsi
                $sql = "SELECT * FROM percorso";
                $result = $connessione->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($i%2==0){
                            $sfondo = "background-color:#F0F0F0;";
                        }
                        else{
                            $sfondo = "background-color:white;";
                        }

                        echo "<div class='row' style='".$sfondo." '>";
                        echo "<div class='col-2'>";
                        echo $row["id"];
                        echo "</div>";
                        echo "<div class='col-5'>";
                        echo $row["nome"];
                        echo "</div>";
                        echo "<div class='col-4'>";
                        echo $row["descrizione"];
                        echo "</div>";
                        echo "</div>";
                        $i++;
                    }
                }else{
                    echo "Nessun percorso presente";
                }
                $connessione->close();

            ?>
        </div>
        <br>
        <br>
        <br>
        <!-- TAPPE -->
        <div class="row" style="margin-top:40px; padding: 10px; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; border-bottom-color:#F0F0F0;  border-bottom-style: solid; border-bottom-width: 3px; ">
            <h2 style="color:#B30000; text-align:center;" >Tappe</h2>
        </div>
        <br>
        <div class="container" style="border-color : black;  border-style: solid; border-width: 1px;">
            <div class="row" style="border-bottom-color : black;  border-bottom-style: solid; border-bottom-width: 1px;">
                <div class="col-1">
                    <h3>ID</h3>
                </div>
                <div class="col-2">
                    <h3>Nome</h3>
                </div>
                <div class="col-7">
                    <h3>Descrizione</h3>   
                </div>
                <div class="col-2">
                    <h3>Via</h3>   
                </div>
            </div>
            <?php
        
                $host="127.0.0.1";
                $user="root";
                $pass="";
                $database="GenovaRoute";
                $connessione = new mysqli($host, $user, $pass , $database);
        
                error_reporting(0);

                if($connessione === false){
                    echo "Errore: ".$connessione->error;
                }

                //stampa tutte le tappe
                $sql = "SELECT * FROM tappa";   
                $result = $connessione->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        if($i%2==0){
                            $sfondo = "background-color:#F0F0F0;";
                        }
                        else{
                            $sfondo = "background-color:white;";
                        }
                        //finisci
                        echo "<div class='row' style='".$sfondo." padding: 10px;'>";
                        echo "<div class='col-1'>";
                        echo $row["id"];
                        echo "</div>";
                        echo "<div class='col-2'>";
                        echo $row["nome"];
                        echo "</div>";
                        echo "<div class='col-7'>";
                        echo $row["descrizione"];
                        echo "</div>";
                        echo "<div class='col-2'>";
                        echo $row["via"];
                        echo "</div>";
                        echo "</div>";
                        $i++;
                    }
                }else{
                    echo "Nessuna tappa presente";
                }
                $connessione->close();


            ?>
        </div>
    </div>




    <!-- stampa tanti br -->
    <?php
        for($i=0; $i<15; $i++){
            echo "<br>";
        }   
    ?>
    <div class="footer-clean" style="background-color:white; border-top-color:#F0F0F0;  border-top-style: solid; border-top-width: 3px; margin-top: 40px; position:fixed; bottom:0px; width:100%;">
        <footer>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4 ">
                    </div>
                    <div class="col-4"></div>
                    <center>
                        <p style="text-decoration: none; color:black">Partita Iva: 02070920992</p>
                        <p>GenovaRoute ©</p>
                    </center>
                </div>
            </div>
    </div>
    </footer>
    </div>

</body>

</html>