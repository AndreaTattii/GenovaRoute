
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
       
        
        
        if (isset($_SESSION['email'])) {           
            header("Location: ".$_SESSION['dispositivo']."/index.php");
        }  
            $email = $_POST['mail'];
            $password = $_POST['password'];
            $password = hash("sha256", $password);

            $sql = "SELECT * FROM utente WHERE email='$email' AND psw='$password'";
            $result = mysqli_query($connessione, $sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                if($_SESSION['dispositivo']=='mobile'){
                    header("Location: mobile/percorsi/index.php");
                }
                else{
                    if($row['admn']==1){
                        header("Location: pc/admin/index.php");
                    }else{
                        header("Location: pc/index.php");
                    }
                }
                //header("Location: ".$_SESSION['dispositivo']."/percorsi/index.php");  
                /*
                header("Location: pc/index")
                */
            } else {
                $_SESSION['errore'] = 1;
                header("Location: index.php");
            }
        
    ?>
		
