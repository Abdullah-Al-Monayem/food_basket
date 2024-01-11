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

      if (isset($_POST['Submit'])){ // isset check variable empty or not
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phno=$_POST['phone'];
		$location=$_POST['location'];
        $subject=$_POST['subject'];
        
   // insert query execute    
        $sql="INSERT donate(donate_id,fullname,email,phone,location,subject) values('','$name','$email','$phno','$location','$subject')";
        $query=mysqli_query($conn,$sql);
        if($sql)
        {
			   // On condition page redirect 
          header('Location:index.php');
        }
    }
  
    ?>