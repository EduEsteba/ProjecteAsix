<?php
include "db.php";
$usuari=$_POST['usuari'];
$contrasenya=$_POST['contrasenya'];


$sql = $connection->prepare("SELECT * FROM usuaris WHERE nom_usuari = :usuari AND contrasenya = :pass");
$sql->bindParam("usuari",$_POST['usuari'],PDO::PARAM_STR);
$sql->bindParam("pass",$_POST['contrasenya'],PDO::PARAM_STR);
$sql->execute();

if ($sql->rowCount()>0){
    header('Location: panell.html');
}else{
    header("Location: login.html");
}
?>