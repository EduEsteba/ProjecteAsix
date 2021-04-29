<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}

shell_exec('cp -r /home/eduard/wordpress /var/www/'.$_SESSION["username"].'');
header('Location: wordpress.php');


?>
