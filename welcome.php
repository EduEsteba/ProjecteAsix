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
<link rel="stylesheet" href="./css/welcome.css">

    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="#" style="color: white;">Montilivi Host</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!--<li class="nav-item active">
        <a class="nav-link" href="./welcome.php">Inici <span class="sr-only">(current)</span></a>
      </li>-->
    </ul>
    <a class="nav-link" style="color:white;">Benvingut, <b style="color: #ffff00;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
  </div>
  <a class="nav-link" href="logout.php" style="color:white;">      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="fas fa-sign-out-alt"></i>  Sortir</button>
</a> 
</nav>
<div class="m-0 vh-100 row justify-content-center align-items-center">

<div class="col-auto p-5 text-center">

<hr>
<h2>Panell de control</h2>

<hr>

<div class="card-columns">

<a href="mysql.php">
<div class="card carta" >
    <img src="./img/mysql.svg" class="card-img-top"  width="100px" height="100px">
    <div class="card-body">
        <h5 class="card-title">MYSQL</h5>
    </div>
 </div>
</a>
<a href="ftp.php">
<div class="card carta">
    <img src="./img/ftp.svg" class="card-img-top"  width="100px" height="100px">
    <div class="card-body">
        <h5 class="card-title">FTP</h5>
    </div>
 </div>
</a>

 <div class="card carta">
    <img src="./img/ssl.svg" class="card-img-top"  width="100px" height="100px">
    <div class="card-body">
        <h5 class="card-title">SSL</h5>
    </div>
 </div>
</div>
<hr>

<div class="card-columns">

<a href="./CMS/wordpress.php">
<div class="card carta">
    <img src="./img/wordpress.svg" class="card-img-top"  width="100px" height="100px">
    <div class="card-body">
        <h5 class="card-title">Instal·lar Wordpress</h5>
    </div>
 </div>
</a>
<a href="./CMS/moodle.php">
<div class="card carta">
    <img src="./img/moodle.svg" class="card-img-top"  width="100px" height="100px">
    <div class="card-body">
        <h5 class="card-title">Instal·lar Moodle</h5>
    </div>
</div>
</a>

<a href="./CMS/prestashop.php">
<div class="card carta">
    <img src="./img/prestashop.svg" class="card-img-top"  width="100px" height="100px">
    <div class="card-body">
        <h5 class="card-title">Instal·lar Prestashop</h5>
    </div>
 </div>
</div>
</a>



<hr>
        <!--<a href="reset-password.php" class="btn btn-warning">Canviar Contrasenya</a>
        <a href="formulari_nou_site.html" class="btn btn-info">Crear site</a>-->
</div>
</div>
</body>
</html>