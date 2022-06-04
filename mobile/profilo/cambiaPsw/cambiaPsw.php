<?php
        
        session_start(); 
        
        $host="127.0.0.1";
        $user="grovago";
        $pass="";
        $database="my_grovago";
    
        $connessione = new mysqli($host, $user, $pass , $database);
        
        error_reporting(0);

        if($connessione === false){
            echo "Errore: ".$connessione->error;
        }
       

            
         
            $email = $_SESSION['email'];
            $vecchiaPsw = $_POST['vecchiaPsw'];
            $vecchiaPsw = hash("sha256", $vecchiaPsw);

            $nuovaPsw = $_POST['nuovaPsw'];
            $nuovaPsw = hash("sha256", $nuovaPsw);


            $sql = "SELECT email, psw FROM utente WHERE email='$email' AND psw='$vecchiaPsw'";
            $result = mysqli_query($connessione, $sql);

            if($vecchiaPsw==$nuovaPsw){
                $_SESSION['stessaPsw'] = true ;
            }else{
                if ($result->num_rows > 0) {
                    $_SESSION['successo'] = true ;
                    $sql="UPDATE utente SET psw= '".$nuovaPsw."'";
                    mysqli_query($connessione, $sql);
                    
                }else{
                    $_SESSION['errore'] = true ;
                }
            }
            header("Location: ./");
            
        

    ?>