
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "marc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT table_schema AS 'Basededatos',
ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'Tamaño (MB)'
FROM information_schema.TABLES 
GROUP BY table_schema";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Nom: " . $row["Basededatos"]. " - Mida: " . $row["Tamaño (MB)"];  
    echo "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 