<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Genova Route</title>
    <link rel="icon" href="img/g.png" type="image/icon type">
</head>

<body class="d-flex flex-column min-vh-100">

        <!-- CONTENUTO PAGINA -->
        <input type="text" name="ricerca">
        <button id="cerca">Cerca</button>

        <div id="contenuto"></div>

    </div>
    <script>
        $(document).ready(function() {           
            // opzionale, refresha all'infinito la pagina
            $.ajaxSetup ({
                cache: false
            });
            //refresha ogni volta che l'utente scrive una lettera
            $("input[name='ricerca']").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "suggestions.php",
                    data: {
                        query: $("input[name=ricerca]").val()
                    },
                    success: function(data) {
                        $("#contenuto").html(data);
                    }
                });
            });
        });
    </script>
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