<html>
    <head>
        <script defer src='bundle.js'></script>
    </head>
    <body onload="submitform()">
        <form name="myForm" id="myForm" action="interpretaStringa.php" method="POST">
            <input type="hidden" name="stringaQR" value="" id="stringaQR">
            <input type="submit" value="">
        </form>
        <script type="text/javascript">
                //var auto = setTimeout(function(){ autoRefresh(); }, 100);

                function submitform(){
                    document.getElementById("myForm").submit();
                }

                //function autoRefresh(){
                //   clearTimeout(auto);
                //   auto = setTimeout(function(){ submitform(); autoRefresh(); }, 10000);
                //}
        </script>
    </body>
</html>