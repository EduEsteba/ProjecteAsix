<?php
require_once "../DB/config.php";
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}


$sql="SELECT * FROM users where username = '".$_SESSION["username"]."'";
$result = mysqli_query($link,$sql);
while($mostrar = mysqli_fetch_array($result)){
    shell_exec('cp -r /home/eduard/prestashop /var/www/'.$_SESSION["username"].'');
    shell_exec('sudo chmod -R 777 /var/www/'.$_SESSION["username"].'/prestashop');
    shell_exec('sudo chown '.$_SESSION["username"].':ftp -R /var/www/'.$_SESSION["username"].'/prestashop');
}



header('Location: prestashop.php');



?>
