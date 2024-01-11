 <?php
 // Create connection information
       include 'connect.php';
$servername = "localhost";
$username = "root";
$password = "";
$database= "food_basket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// Value Fetch from donate form
      if (isset($_POST['Submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phno=$_POST['phone'];
		 $product=$_POST['product'];
		$location=$_POST['location'];
       
        
     // insert query execute        
        $sql="INSERT product(product_id,fullname,email,phone,productname,location) values('','$name','$email','$phno','$product','$location')";
        $query=mysqli_query($conn,$sql);
        if($sql)
        {
			  // On condition page redirect
          header('Location:index.php');
        }
    }
  
    ?>