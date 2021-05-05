<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
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
    <a class="nav-link" style="color:black;">Benvingut,<b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
  </div>
  <a class="nav-link" href="logout.php" style="color:black;">      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="fas fa-sign-out-alt"></i>  Sortir</button>
</a>
  
</na

    <br>
<div class="container">
    <div class="row justify-content-lg-center">
        <h1><b>MYSQL</b></h1>

  <div class="col-12">
            <br>
    </div>
    <div class="col col-12">
        <table class="text-center col col-lg-12 h-25  table table-striped table-dark table-hover">
            <thead class="thead-dark">
            <tr>
            <th>NOM BASE DE DADES</th>
            <th>CONTRASENYA</th>
            <th>ESTAT</th>
            </tr>
        </thead>
<?php
require_once "config.php";
$sql="SELECT * FROM users where username = '".$_SESSION["username"]."'";
$result = mysqli_query($link,$sql);
while($mostrar = mysqli_fetch_array($result)){
?>
<tr>
<td><?php echo $mostrar['username'];?></a></td>
<td><?php echo $mostrar['pass'];?></a></td>
<td><b><?php  if($link == false){
       echo "<p style='color: red';>Inactiu</p>";
    }else{
        echo "<p style='color: #03fc03';>Actiu</p>";

    }?></b></a>
</td>
<td></td>
</tr>
<?php
}
?>
</table>
</div>
</div>
</div>
</div>
</div>
<p>Per accedir al PhpMyAdmin,LINK</p>

<?php
include "config2.php";
$tamany="SELECT SUM(ROUND(((DATA_LENGTH + INDEX_LENGTH) / 1024 / 1024), 2)) AS 'Mida' FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ".$_SESSION['username'].""; 
$result2 = mysqli_query($link2,$consulta);
while ($fila=mysqli_fetch_array($result2)){
    echo $fila ["TABLES"];
    }
?>
</body>
</html>