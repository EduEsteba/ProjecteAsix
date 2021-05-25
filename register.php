<?php
// Include config file
require_once "./DB/config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["user2"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["user2"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                    header("location: login.html");

                } else{
                    $username = trim($_POST["user2"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                header("location: login.html");

            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password2"]))){
        $password_err = "Please enter a password.";
        header("location: login.html");
     
    } elseif(strlen(trim($_POST["password2"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
        header("location: login.html");

    } else{
        $password = trim($_POST["password2"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
        header("location: login.html");
     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
            header("location: login.html");

        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $longpalabra=8;
        for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
            $x = rand(0,$n);
            $pass.= $caracteres[$x];
        }

        for($passftp='', $n=strlen($caracteres)-1; strlen($passftp) < $longpalabra ; ) {
            $x = rand(0,$n);
            $passftp.= $caracteres[$x];
        }

        $sql1 = "INSERT INTO users (username, password, pass, site, ftp) VALUES (?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql1)){
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $pass, $param_username, $passftp);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if(mysqli_stmt_execute($stmt)){
                $ruta=('/var/www/' . $param_username);
                mkdir($ruta, 0777, true);
                shell_exec('chmod 777 /var/www/'.$param_username);
                shell_exec('mkdir /var/www/'.$param_username.'/log');
                shell_exec('sudo chmod -R 777 /var/www/'.$param_username.'/log');
                /*shell_exec('sudo chown '.$param_username.':ftp -R /var/www/'.$param_username.'/log');*/

                $servername = "localhost";
                $username = "root";
                $password = "1234";

                $conn2 = new PDO("mysql:host=$servername", $username, $password);
                $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $createdatabase = "CREATE DATABASE $param_username";
                $conn2->exec($createdatabase);

                $createuser = "CREATE USER '".$param_username."'@localhost IDENTIFIED BY '".$pass."'";
                $conn2->exec($createuser);

                $permisos = "GRANT ALL ON $param_username.* TO '".$param_username."'@'localhost'";
                $conn2->exec($permisos);

                shell_exec('sudo groupadd '.$param_username);
                shell_exec('sudo useradd '.$param_username.' -p 1234 -g ftp -d '.$ruta.' -s /bin/bash');
                shell_exec('sudo chown '.$param_username.':'.$param_username.' '.$ruta);


                //shell_exec('sudo openssl genrsa -out /certificats/'.$param_username.'.key 2048');
                //shell_exec('sudo openssl req -new -key /certificats/'.$param_username.'.key -out /certificats/'.$param_username.'.csr');
                //shell_exec('sudo openssl x509 -CA /certificats/projecte.crt -CAkey /certificats/projecte.key -req -in /certificats/'.$param_username.'.csr -days 365 -CAcreateserial -sha256 -out /certificats/'.$param_username.'.crt');

                shell_exec('/scripts/certificats.sh '.$param_username);

                shell_exec('sudo /passwd_change.sh '. $param_username.' '.$passftp);
                shell_exec('sudo /create_site.sh '. $ruta.' '.$param_username.' www.'.$param_username.'.com');
                shell_exec('sudo a2ensite '.$param_username.'.conf');
                shell_exec('sudo service apache2 reload');
                header('Location: login.html');

            } 
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
