<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unity_backend";

//variables submitted by user
$loginUser = $_POST["loginUser"];
$loginPass= $_POST["loginPass"];


// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully <br>";

//Get password of the username given by player matches a username in database and its password
$sql = "SELECT password FROM User WHERE username = '" . $loginUser . "'";

//Check if username is taken
$query_register_username = "Johannes";
$query_register_password = "Y0uRM0m";

$result = $conn->query($sql);

//Write error handling when nothing entered

if ($result->num_rows > 0)
{
  // If data matches, succes
  while($row = $result->fetch_assoc()) 
  {
    echo "Username is already taken.";
  }
} 
else
{
    echo "Creating user...";
    //Insert the user iand passwork into the database
    $sql_register = "INSERT INTO user ( username, password) VALUES ('" . $loginUser . "','" . $loginPass . "')";
    if ($conn->query($sql_register) === TRUE) 
    {
      echo "New record created successfully";
    } 
    else 
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
echo "\n".$loginUser;
$conn->close();

?>