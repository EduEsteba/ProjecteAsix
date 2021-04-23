<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panell de control</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Benvingut al teu panell de control.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Canviar Contrasenya</a>
        <a href="logout.php" class="btn btn-danger ml-3"><i class="fas fa-sign-out-alt"></i>Tancar Sessió</a>
        <a href="formulari_nou_site.html" class="btn btn-info">Crear site</a>
        <a href="mysql.php" class="btn btn-info">Base de dades</a>

    </p>
</body>
</html>