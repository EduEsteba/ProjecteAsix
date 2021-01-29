<?php 

include "db.php";

$nom_site=$_POST['site'];


$sql = $connection->prepare("SELECT * FROM sites where nom_site = :nomsite");
$sql->bindParam("nomsite",$nom_site,PDO::PARAM_STR);
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
    $insert = $connection->prepare("INSERT INTO sites (nom_site,usuari) values (:nomsite,'usuari2')");
    $insert->bindParam("nomsite",$nom_site,PDO::PARAM_STR);
    $insert->execute();

    /*Creem una base de dades pel site del client*/
    $servername = "localhost";
    $username = "root";
    $password = "1234";

    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $createdatabase = "CREATE DATABASE $nom_site";
    $conn->exec($createdatabase);

    $phpmyadmin = $connection->prepare("CREATE USER jaume1@'localhost' IDENTIFIED BY '1234'");
    $phpmyadmin->execute();

    $permisos = $connection->prepare("GRANT ALL PRIVILEGES ON :dbclient TO jaume1@localhost");
    $permisos -> bindParam(":dbclient", $nomsite,PDO::PARAM_STR);
    $permisos->execute();

    header('Location: panell.html');
}








?>
