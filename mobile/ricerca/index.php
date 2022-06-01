<?php
session_start();
//error_reporting(0);
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
    <link rel="icon" href="img/g.png" type="image/icon type">

    
</head>

<body class="d-flex flex-column min-vh-100">


        <!-- NAVBAR BASSA -->
    <div class="container fixed-bottom" style="background-color: white; border-top-color:black;  border-top-style: solid; border-top-left-radius: 25px;border-top-right-radius: 25px; border-top-width: 1px; height: 50px;">
        <div class="row  justify-content-center" >
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="../percorsi/index.php">
                        <img id="percorsoSfondo" src="../../img/icons/percorso.png">
                    </a>
                </center>

            </div>
            <div class="col s-3" style="padding-top:10px">
                <center>
                    <a class="navbar-brand" href="./">
                        <img id="ricercaNavImg" src="../../img/icons/searchRed.png">
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
    <div class="container fixed-top" style="background-color: white;">
        <div class="row justify-content-center align-items-center" style="background-color:#EFEFEF; height:40px; border-radius: 25px; margin-top:10px;">
            <div class="col-1" style="text-align: center;">
                <img id="account" src="../../img/icons/searchBlackBold.png" style="width:20px">    
            </div>
            <div class="col-11" >
                <input  style="width: 100%; border:none; background-color:#EFEFEF; outline:none;" value="" name="ricerca" id="query" type="text" placeholder="Cerca">
            </div>
        </div>

        <div class="row justify-content-center align-items-center" style=" height:30px; border-radius: 25px; margin-top:10px;">
            <div id="col-tappe" class="col-2" style="text-align: center;  border-bottom:2px solid #b30000;">
                <h1 style="font-size:13px">Tappe</h1>
            </div>
            <div id="col-percorsi"  class="col-3" style="text-align: center; border-bottom:none;">
                <h1 style="font-size:13px">Percorsi</h1>
            </div>
            <div id="col-citta"  class="col-2" style="text-align: center; border-bottom:none;">
                <h1 style="font-size:13px">Città</h1>
            </div>
            <div id="col-categorie"  class="col-3" style="text-align: center; border-bottom:none;">
                <h1 style="font-size:13px">Categorie</h1>
            </div>
            <div id="col-account"  class="col-2" style="text-align: center; border-bottom:none;">
                <h1 style="font-size:13px">Account</h1>
            </div>
        </div>
        
    </div>
    <br>
    <br>
    <br>
    <br>
    <div id="content">
            
    </div>
    <script>
        $(document).ready(function() {
            $("#col-tappe").click(function() {
                //css
                $("#col-tappe").css("border-bottom", "2px solid #b30000");
                $("#col-percorsi").css("border-bottom", "none");
                $("#col-citta").css("border-bottom", "none");
                $("#col-categorie").css("border-bottom", "none");
                $("#col-account").css("border-bottom", "none");

                $.ajax({
                    type: "POST",
                    url: "cercaTutto.php",
                    data: {
                        query: $("input[name=ricerca]").val(),
                        tipo: "tappa"
                    },
                    success: function(data) {
                        //alert("successo");
                        $("#content").html("");
                        $("#content").html(data);
                    }
                });
            });

            $("#col-percorsi").click(function() {
                //css
                $("#col-tappe").css("border-bottom", "none");
                $("#col-percorsi").css("border-bottom", "2px solid #b30000");
                $("#col-citta").css("border-bottom", "none");
                $("#col-categorie").css("border-bottom", "none");
                $("#col-account").css("border-bottom", "none");

                $.ajax({
                    type: "POST",
                    url: "cercaTutto.php",
                    data: {
                        query: $("input[name=ricerca]").val(),
                        tipo: "percorso"
                    },
                    success: function(data) {
                        //alert("successo");
                        $("#content").html("");
                        $("#content").html(data);
                    }
                });
            });

            $("#col-citta").click(function() {
                //css
                $("#col-tappe").css("border-bottom", "none");
                $("#col-percorsi").css("border-bottom", "none");
                $("#col-citta").css("border-bottom", "2px solid #b30000");
                $("#col-categorie").css("border-bottom", "none");
                $("#col-account").css("border-bottom", "none");

                $.ajax({
                    type: "POST",
                    url: "cercaTutto.php",
                    data: {
                        query: $("input[name=ricerca]").val(),
                        tipo: "citta"
                    },
                    success: function(data) {
                        //alert("successo");
                        $("#content").html("");
                        $("#content").html(data);
                    }
                });
            });

            $("#col-account").click(function() {
                //css
                $("#col-tappe").css("border-bottom", "none");
                $("#col-percorsi").css("border-bottom", "none");
                $("#col-citta").css("border-bottom", "none");
                $("#col-categorie").css("border-bottom", "none");
                $("#col-account").css("border-bottom", "2px solid #b30000");

                $.ajax({
                    type: "POST",
                    url: "cercaTutto.php",
                    data: {
                        query: $("input[name=ricerca]").val(),
                        tipo: "utente"
                    },
                    success: function(data) {
                        //alert("successo");
                        $("#content").html("");
                        $("#content").html(data);
                    }
                });
            });

            $("#col-categorie").click(function() {
                //css
                $("#col-tappe").css("border-bottom", "none");
                $("#col-percorsi").css("border-bottom", "none");
                $("#col-citta").css("border-bottom", "none");
                $("#col-categorie").css("border-bottom", "2px solid #b30000");
                $("#col-account").css("border-bottom", "none");

                $.ajax({
                    type: "POST",
                    url: "cercaTutto.php",
                    data: {
                        query: $("input[name=ricerca]").val(),
                        tipo: "categorie"
                    },
                    success: function(data) {
                        //alert("successo");
                        $("#content").html("");
                        $("#content").html(data);
                    }
                });
            });

            $("input[name='ricerca']").keyup(function() {
                //prendi l'attributo border del css della colonna con id col-tappe e salvalo in una variabile
                //var colTappe = $("#col-tappe").css("border-bottom");
                //alert(colTappe);
                if($("#col-tappe").css("border-bottom")!="0px none rgb(33, 37, 41)"){
                    tipo="tappa";
                    //alert("tappa");
                }
                else {
                    if($("#col-percorsi").css("border-bottom")!="0px none rgb(33, 37, 41)"){
                        tipo="percorso";
                        //alert("percorso");
                    }
                    else {
                        if($("#col-citta").css("border-bottom")!="0px none rgb(33, 37, 41)"){
                            tipo="citta";
                            //alert("citta");
                        }
                        else {
                            if($("#col-categorie").css("border-bottom")!="0px none rgb(33, 37, 41)"){
                                tipo="categoria";
                                //alert("categoria");
                            }
                            else {
                                if($("#col-account").css("border-bottom")!="0px none rgb(33, 37, 41)"){
                                    tipo="utente";
                                    //alert("account");
                                }
                            }
                        }
                    }
                }
                $.ajax({
                    type: "POST",
                    url: "cercaTutto.php",
                    data: {
                        query: $("input[name=ricerca]").val(),
                        tipo: tipo
                    },
                    success: function(data) {
                        //alert("successo");
                        $("#content").html("");
                        $("#content").html(data);
                    }
                });
            });
        });
    </script>
    
</body>

</html>