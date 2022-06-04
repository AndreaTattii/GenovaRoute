
    <?php
        
        session_start(); 
        
        $host ="localhost";
        $user="grovago";
        $pass="";
        $database="my_grovago";
    
        $connessione = new mysqli($host, $user, $pass , $database);
        
       // error_reporting(0);

        if($connessione === false){
            echo "Errore: ".$connessione->error;
        }
        if(!(isset($_POST['nome']))){
            $email = $_POST['mail'];
            $password = $_POST['password'];
            $password = hash("sha256", $password);

            $sql = "SELECT * FROM utente WHERE (email='$email' OR username='$email') AND psw='$password'";
            $result = mysqli_query($connessione, $sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                if($_SESSION['dispositivo']=='mobile'){
                    header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/mobile/percorsi/index.php");
                }
                else{
                    if($row['admn']==1){
                        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/admin/index.php");
                    }else{
                        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/index.php");
                    }
                }
                //header("Location: ".$_SESSION['dispositivo']."/percorsi/index.php");  
                /*
                header("Location: pc/index")
                */
            } else {
                $_SESSION['errore'] = 1;
                header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/index.php");
            }
        }
        else{
            $nome = $connessione->real_escape_string($_REQUEST['nome']);
            $cognome = $connessione->real_escape_string($_REQUEST['cognome']);
            $mail = $connessione->real_escape_string($_REQUEST['mail']);
            $password = $connessione->real_escape_string($_REQUEST['password']);
            $username= $connessione->real_escape_string($_REQUEST['username']);
            
            //hashing della password
            $password = hash("sha256", $password);
            
            $sql = "SELECT * FROM utente WHERE email='$email' OR username='$username'";
            $result = mysqli_query($connessione, $sql);

            if ($result->num_rows > 0) {
                    $_SESSION['erroreR']=12;
                    header("Location: index.php");
            }
            else{

                $sql = "INSERT INTO utente (nome, cognome, email, psw, username, livello, xp) VALUES 
                ('$nome','$cognome', '$mail', '$password','$username', 1, 0)";
            
                
                if($connessione->query($sql) === true){
                    $_SESSION['email']= $mail;
                    if($_SESSION['dispositivo']=='mobile'){
                        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/mobile/percorsi/index.php");
                    }
                    else{
                        header("Location: https://".$_SERVER['SERVER_ADDR']."/genovaroute/pc/index.php");
                    }
                    //header("location: ../".$_SESSION['dispositivo']."/percorsi/index.php");
                    echo "Utente inserito con successo";
                }else{
                    echo "Errore durante inserimento: ".$connessione->error;
                } 
                //automatically assign user the basic profile image by copying the default one
                $path = "img/propics/";
                $path = $path.$mail.".png";
                copy("img/propics/default.png", $path);
            }
        }
    ?>
		
