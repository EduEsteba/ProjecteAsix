<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ./login.html");
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

    <br>
<div class="container">
    <div class="row justify-content-lg-center">
        <h1><b>FTP</b></h1>

  <div class="col-12">
            <br>
    </div>
    <div class="col col-12">
        <table class="text-center col col-lg-12  table table-striped table-dark table-hover">
            <thead class="thead-dark">
            <tr>
            <th>SERVIDOR</th>
            <th>USUARI</th>
            <th>CONTRASENYA</th>
            <th>ESTAT</th>
            </tr>
        </thead>
<?php
require_once "../DB/config.php";
$sql="SELECT * FROM users where username = '".$_SESSION["username"]."'";
$result = mysqli_query($link,$sql);
while($mostrar = mysqli_fetch_array($result)){
?>
<tr background:c>
<td ><?php echo $_SESSION["username"];?>.com</td>
<td><?php echo $mostrar['username'];?></td>
<td><?php echo $mostrar['ftp'];?></td>
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
<p>Per accedir per FTP recomanem, <a href="https://download.filezilla-project.org/client/FileZilla_3.54.1_win64_sponsored-setup.exe">FileZilla</a></p>

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