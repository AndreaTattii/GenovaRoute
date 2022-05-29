<!DOCTYPE html>
<?php
session_start();

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "GenovaRoute";

$connessione = new mysqli($host, $user, $password, $database);

if ($connessione === false) {
    die("Errore di connessione: " . $connessione->connect_error);
}

$idPercorso = $connessione->real_escape_string($_REQUEST['idPercorso']);



$sql = "SELECT  nome FROM Percorso WHERE id = '" . $idPercorso . "'";

if ($result = $connessione->query($sql)) {
    $row = $result->fetch_assoc();
    $percorso = $row['nome'];
} else {
    echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
}


?>
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
    <link rel="icon" href="../../img/Admin.png" type="image/icon type">

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar  navbar-expand-lg" style="background-color: #B30000;">
        <div class="container">
            <div class="col">
                <a class="navbar-brand" style="font-family: 'Amiri', serif; color: white; font-weight: bold; text-align: center; " href="index.php">
                    <h1>GrovaGO Administration</h1>
                </a>
            </div>

        </div>
    </nav>
    <br>
    <br>
    <br>

    <div class="container">
        
            <div class="row">
                <div class="col-8">
                    <h1><?php echo $percorso ?></h1>
                </div>
                <div class="col-4">
                    
                </div>
       

    </div>
    <div class="row" style="border-color : black;  border-style: solid; border-width: 1px;">
        <div class="col-1">
            <h3>Id</h3>
        </div>
        <div class="col-2">
            <h3>Ordine</h3>
        </div>
        <div class="col-4">
            <h3>Nome</h3>
        </div>
        <div class="col-4">
            <h3>Via</h3>
        </div>
    </div>
    <?php



    $i = 0;
    //error_reporting(0);




    $sql = "SELECT  id, tappa.nome AS nome, tappa.via AS via, tappa_appartiene_percorso.ordine AS ordine 
        FROM tappa, tappa_appartiene_percorso 
        WHERE id_Percorso = '" . $idPercorso . "'
            AND tappa.id = tappa_appartiene_percorso.id_tappa
            ORDER BY ordine";

    if ($result = $connessione->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($i % 2 == 0) {
                    $sfondo = "background-color:#F0F0F0;";
                } else {
                    $sfondo = "background-color:white;";
                }
                echo "<div class='row' style='" . $sfondo . "; padding:10px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; ' >";
                    echo "<div class='col-1' style='border-right-style:solid; border-right-width:1px'>";
                        echo '<b>';
                            echo $row["id"];
                        echo '</b>';
                    echo "</div>";
                    echo "<div class='col-2'>";
                        echo $row["ordine"];
                    echo "</div>";
                    echo "<div class='col-4'>";
                        echo $row["nome"];
                    echo "</div>";
                    echo "<div class='col-4'>";
                        echo $row["via"];
                    echo "</div>";
                    echo "<div class='col-1'>";
                            echo "
                                    <center>
                                        <form action='visualizzaQR.php' method='POST'>
                                            <input type='hidden' name='idTappa' value='" . $row["id"] . "'>
                                            <input type='hidden' name='idPercorso' value='" . $idPercorso . "'>
                                            <input type='hidden' name='nomePercorso' value='" . $percorso . "'>
                                            <input type='hidden' name='ordine' value='" . $row["ordine"] . "'>
                                            <button type='submit' style='color:white; background-color:#B30000; width:50px; border-color:#B30000; border-radius:50px'> QR </button>
                                        </form>
                                    </center>
                                ";
                    echo "</div>";

                echo "</div>";
                $i++;
            }
        } else {
            echo "Nessun tappa è inclusa nel percorso";
        }
    } else {
        echo "Errore nella query: " . $sql . "<br>" . $connessione->error;
    }

    $connessione->close();

    if ($i % 2 == 0) {
        $sfondo = "background-color:#F0F0F0;";
    } else {
        $sfondo = "background-color:white;";
    }


    ?>
    <div class='row' style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
        <form action="includiT.php" action="POST">
            <div class="row">
                <div class="col-4">
                    <input type="text" name="idTappa" placeholder="Inserisci ID tappa" required>
                </div>
                <div class="col-6">
                    <input type="text" name="ordineTappa" placeholder="Inserisci l'ordine della tappa" style="width: 250px;" required>
                </div>
                <div class="col-2">
                    <input type="hidden" name="idPercorso" value="<?php echo $idPercorso ?>">
                    <button type="submit" style="color:white; background-color:#B30000; ; border-color:#B30000; width:150px;">Includi</button>
                </div>
            </div>

        </form>
    </div>

    <?php
    $i++;
    if ($i % 2 == 0) {
        $sfondo = "background-color:#F0F0F0;";
    } else {
        $sfondo = "background-color:white;";
    }
    ?>

    <div class='row' style="<?php echo $sfondo ?>; padding:10px; border-style:solid; border-width:1px; ">
        <form action="escludiT.php" action="POST">
            <div class="row">
                <div class="col-4">
                    <input type="text" name="idTappa" placeholder="Inserisci ID tappa" required>
                </div>
                <div class="col-4">
                    <input type="hidden" name="idPercorso" value="<?php echo $idPercorso ?>">
                    <button type="submit" style="color:white; background-color:#B30000; ; border-color:#B30000; width:150px;">Escludi</button>
                </div>
            </div>

        </form>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</body>
</html>