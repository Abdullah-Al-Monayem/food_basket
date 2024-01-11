<?php
// Create connection information
$servername = "localhost";
$username = "root";
$password = "";
$database= "food_basket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
// connect_error keyword to check error
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>