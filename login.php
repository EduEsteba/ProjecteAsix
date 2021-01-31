<?php
/*--------------CONEXIÓ BASE DE DADES----------------*/
$servername = "localhost";
$database = "projecte";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

/*------------------------------*/
$usuari=$_POST['usuari'];
$contrasenya=$_POST['contrasenya'];

$consulta = mysqli_query ($conn, "SELECT * FROM proejcte WHERE nom_usuari = '$usuari' AND contrasenya = '$contrasenya'");  

?>
