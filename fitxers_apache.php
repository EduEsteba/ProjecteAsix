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

    $insert = $connection->prepare("INSERT INTO sites (nom_site,usuari) values (:nomsite,'usuari2')");
    $insert->bindParam("nomsite",$nom_site,PDO::PARAM_STR);
    $insert->execute();

    echo $nom_site;
    $ruta=('/etc/var/www/' . $nom_site);

    echo $ruta;
    mkdir($ruta, 0777, true);

    header('Location: panell.html');
}








?>
