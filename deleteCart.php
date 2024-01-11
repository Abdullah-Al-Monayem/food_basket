 <?php
 session_start();

 if(isset($_GET['id'])){
     $id = $_GET['id'];
    if (!isset($_SESSION["login"]))
 {
 $userid=0;
 }
 else{
	$userid=$_SESSION['userid']; 	 
 }
 $sql = "DELETE FROM cart WHERE user_id='$userid' AND p_id='$id';"; 
		
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