<?php
require_once "config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["user2"]))){

    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["user2"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    header("location: login.html");

                } else{
                    $username = trim($_POST["user2"]);

                }
            } 

            mysqli_stmt_close($stmt);
        }
    }
 
    if(empty(trim($_POST["confirm_password"]))){
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
        }
    }
    
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
        echo "hola";

        if($stmt = mysqli_prepare($link, $sql1)){
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $pass, $param_username, $passftp);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            echo "hola";

            if(mysqli_stmt_execute($stmt)){
                $ruta=('/var/www/' . $param_username);
                mkdir($ruta, 0755, true);
                echo "hola";

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
                shell_exec('sudo /home/eduard/passwd_change.sh '. $param_username.' '.$passftp);
                shell_exec('sudo /home/eduard/create_site.sh '. $ruta.' '.$param_username.' www.'.$param_username.'.com');
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