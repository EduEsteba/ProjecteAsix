
<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
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

<body>
    <br>
<div class="container">
    <div class="row justify-content-lg-center">
        <h1><b>Base de dades</b></h1>

  <div class="col-12">
            <form action="index.html" method="get">
                    <button class="btn btn-warning col-12" type="submit"><i class="fas fa-home"></i> INICI</button>
            </form>
            <br>
    </div>
    <div class="col col-12">
        <table class="text-center col col-lg-12 h-25  table table-striped table-dark">
            <thead class="thead-dark">
            <tr>
            <th>NOM</th>
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
<td><?php  if($link == false){
       echo "<p style='color: red';>Inactiu</p>";
    }else{
        echo "<p style='color: green';>Actiu</p>";

    }?></a>
</td>
<td><?php
  if($link == false){
    echo "<p style='color: red';>Inactiu</p>";
 }else{
     echo "<p style='color: green';>Actiu</p>";


?></td>


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
</body>
</html>