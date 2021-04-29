<?php
require_once "config.php";
require_once "db.php";

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
                } else{
                    $username = trim($_POST["user2"]);
                }
            } 

            mysqli_stmt_close($stmt);
        }
    }
    if(empty(trim($_POST["password2"]))){
    }
    else{
        $password = trim($_POST["password2"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        /*Contrasenya per phpmyadmin usuari
        $caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $longpalabra=8;
        for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
            $x = rand(0,$n);
            $pass.= $caracteres[$x];
        }

        Creem l'usuari*/
        $sql = "INSERT INTO users (username, password,) VALUES (?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if(mysqli_stmt_execute($stmt)){
                header("location: login.html");
            } 

            mysqli_stmt_close($stmt);
        }

        /*Creem una base de dades pel site del client
        $servername = "localhost";
        $username = "root";
        $password = "1234";

        $conn = new PDO("mysql:host=$servername", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $createdatabase = "CREATE DATABASE $param_username";
        $conn->exec($createdatabase);

        /*Creem l'usuari a MYSQL client només amb accent a la seva base de dades
        $phpmyadmin = $connection->prepare("CREATE USER '$param_username'@'localhost' IDENTIFIED BY '$pass'");
        $phpmyadmin->execute();

        $permisos = $connection->prepare("GRANT ALL PRIVILEGES ON :dbclient TO '$usuari_actual'@localhost");
        $permisos -> bindParam(":dbclient", $param_username,PDO::PARAM_STR);
        $permisos->execute();

        /*CREEM DIRECTORI SITE
        $ruta=('/etc/var/www/' . $param_username);
        mkdir($ruta, 0777, true);

        header('Location: login.html');
        }*/
    }
    }
    mysqli_close($link);

?>
