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
$result = $conn->query($sql);

if ($result->num_rows > 0)
{
  // If data matches, succes
  while($row = $result->fetch_assoc()) 
  {
    if($row["password"] == $loginPass)
    {
        echo "Login success.";
        //Get users data here

        //Get plater info

        //Do mumbo jumbo

    }
    else
    {
        echo "Wrong credentials";
    }
  }
} 
else
{
    echo "Username does not exists.";
}
echo "\n".$loginUser;
$conn->close();

?>