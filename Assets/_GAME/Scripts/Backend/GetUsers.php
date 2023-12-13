<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unity_backend";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully <br>";

//Both of them works
//$sql = "SELECT id, username, password, level, coins FROM User";
$sql = "SELECT * FROM User";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "\n". "id: " . $row["id"]. " - UserName: " . $row["username"]. "Password: " . $row["password"]. "Level: " . $row["level"]. "Coins: " . $row["coins"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();

?>