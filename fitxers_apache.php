<?php 
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

include "config.php";
include "db.php";

$nom_site=$_POST['site'];
$usuari_actual=$_SESSION["username"];
/*Mira si el site esta creat*/

$sql = $connection->prepare("SELECT * FROM sites where nom_site = :nomsite and usuari = :nomusuari");
$sql->bindParam("nomsite",$nom_site,PDO::PARAM_STR);
$sql->bindParam("nomusuari",$usuari_actual,PDO::PARAM_STR);
$sql->execute();

if ($sql->rowCount()>0){
    header('Location: formulari_nou_site.html');
}

else{
    /*CREEM DIRECTORI SITE*/
    echo $nom_site;
    $ruta=('/etc/var/www/' . $nom_site);
    echo $ruta;
    mkdir($ruta, 0777, true);

    /*Registrem a la taula el site creat*/
    $insert = $connection->prepare("INSERT INTO sites (nom_site,usuari) values (:nomsite,'$usuari_actual')");
    $insert->bindParam("nomsite",$nom_site,PDO::PARAM_STR);
    $insert->execute();

    header('Location: welcome.php');
}
?>
