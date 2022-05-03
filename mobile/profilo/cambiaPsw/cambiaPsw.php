<?php
        
        session_start(); 
        
        $host="127.0.0.1";
        $user="root";
        $pass="";
        $database="GenovaRoute";
    
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

            if ($result->num_rows > 0) {
                $_SESSION['successo'] = true ;
                $sql="UPDATE utente SET psw= '".$nuovaPsw."'";
                mysqli_query($connessione, $sql);
                
            } else {
                $_SESSION['successo'] = false ;
                
            }
            
            header("Location: ./");
            
        

    ?>