<?php
session_start();
$risultato=$_GET['risultato'];
echo $risultato;

//$risultato contiene il risultato della scansione, cioè due numeri separati da un .
//Il primo numero è il numero del percorso, il secondo è il numero della tappa
//estrapola dalla variabile $risultato i due numeri
$pos = strpos($risultato, ".");
$_SESSION['nomePercorso'] = substr($risultato, 0, $pos);
$_SESSION['ordine'] = substr($risultato, $pos+1, strlen($risultato));

//echo 'il percorso è' . $percorso . ' e la tappa è ' . $tappa;
header("Location: ../percorsi/tappe/tappaSpecifica/index.php");
?>