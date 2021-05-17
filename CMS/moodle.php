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
  <a class="navbar-brand" href="../welcome.php" style="color: white;">Montilivi Host</a>
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

<div class="container">
  <div class="row justify-content-center align-items-center minh-100">
    <div class="col-lg-12">
      <div>
      
<h1>Benvingut al instal·lador de <b>Moodle</b></h1>
<p>Voleu instal·lar Moodle?</p><br>
<p>Al clicar sobre el botó es creara una carpeta moodle en el vostre directori</p>
<a href="" class="btn btn-warning"><i class="fas fa-level-up-alt"></i>  Instal·lar</a>
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