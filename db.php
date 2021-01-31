<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'projecte');

try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    $color="green";
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
    $color="red";

}










?>

