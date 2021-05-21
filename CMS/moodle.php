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




    <style>
        body{ font: 14px sans-serif; text-align: center; overflow: hidden;}
       
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="border-radius:0 !important";>
  <a class="navbar-brand" href="../welcome.php" style="color: white;">Montilivi Host</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <li class="nav-item dropdown ml-auto">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
        Benvingut, <b style="color: #ffff00;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>        
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../reset-password.php">Canviar la contrasenya</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" style="color: red ;" href="../logout.php"><i class="fas fa-sign-out-alt"></i>Tancar la sessió</a>
        </div>
      </li>
</a> 
</nav>

<div class="container">
  <div class="row justify-content-center align-items-center minh-100">
    <div class="col-lg-12">
      <div>
      
<h1>Benvingut al instal·lador de <b>Moodle</b></h1>
<p>Voleu instal·lar Moodle?</p><br>
<p>Al clicar sobre el botó es creara una carpeta moodle en el vostre directori</p>
<a href="" class="btn btn-warning" style="color: black !important;"><i class="fas fa-level-up-alt"></i>  Instal·lar</a>
<br><br>
<p>Per qualsevol dubte podeu consultar la pàgina oficial de <a href="https://docs.moodle.org/all/es/Instalación_de_Moodle">Moodle</a></p>
      </div>

    </div>

  </div>
</div>

<style>
.minh-100 {
  height: 100vh;
}
</style>



 

</body>


</style>

</html>