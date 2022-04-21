
    <?php
        
        session_start(); 
        
        $host="127.0.0.1";
        $user="root";
        $pass="";
        $database="getnbite";
    
        $connessione = new mysqli($host, $user, $pass , $database);
        
        error_reporting(0);

        if($connessione === false){
            echo "Errore: ".$connessione->error;
        }
       
        
        
        if (isset($_SESSION['email'])) {           
            header("Location: ../../../index.php");
        }  
            $email = $_POST['mail'];
            $password = $_POST['password'];
            $password = hash("sha256", $password);

            $sql = "SELECT email, pass FROM utente WHERE email='$email' AND pass='$password'";
            $result = mysqli_query($connessione, $sql);

            if ($result->num_rows > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['email'] = $row['email'];
                header("Location: ../../../index.php");
            } else {
                $_SESSION['errore'] = 1;
                header("Location: formLogin.php");
            }
        

    ?>
		
