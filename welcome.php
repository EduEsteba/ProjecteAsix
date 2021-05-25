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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>





    <style>
        body{ font: 14px sans-serif; text-align: center; overflow: hidden;}
       
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="border-radius:0 !important";>
  <a class="navbar-brand" href="#" style="color: white;">Montilivi Host</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="navbarDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
        Benvingut, <b style="color: #ffff00;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>        
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="navbarDropdown">
          <a class="dropdown-item" href="reset-password.php">Canviar la contrasenya</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="color: red ;" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Tancar la sessió</a>
        </div>
    </li>
</a> 
</nav>


<div class="m-0 vh-100 row justify-content-center align-items-center">

<div class="col-auto p-5 text-center">

<hr>
<h2>Panell de control</h2>

<hr>

<div class="card-columns">

<a href="./SERVEIS/mysql.php">
<div class="card carta" >
    <img src="./img/mysql.svg" class="card-img-top"  width="100px" height="100px">
    <div class="card-body">
        <h5 class="card-title">MYSQL</h5>
    </div>
 </div>
</a>
<a href="./SERVEIS/ftp.php">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


</html>