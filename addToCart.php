
<?php
 session_start();
if(isset($_GET['id'])){
        $quantity = 1;
      $userid=$_SESSION['userid'];
     $id = $_GET['id'];
	 
	 
	 
	 
$sql = "INSERT INTO cart (id, p_id, ip_add, user_id, qty) VALUES
		('','$id','127.0.0.1','$userid','$quantity')"; 
		
$servername = "localhost";
$username = "root";
$password = "";
$database= "food_basket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);		
		if (mysqli_query($conn, $sql)) {
        header('location:index.php');
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
		
  
 }
?>