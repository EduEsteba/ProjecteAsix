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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Montilivi Host</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Inici <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <a class="nav-link" href="#" style="color:black;">Benvingut,<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="fas fa-sign-out-alt"></i>  Sortir</button>
  </div>
</nav>



<p>Benvingut al instal·lar de wordpress</p>
<p>Voleu instal·lar Wordpress?</p>
<a href="wordpress_install.php" class="btn btn-warning">Instal·lar</a>
<button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="fas fa-sign-out-alt"></i>Instal·lar</button>

</body>
</html>