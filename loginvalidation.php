 <?php
  // Create connection information
      include 'connect.php';
       
$email=$_POST['email'];
$pass= $_POST["password"];

$servername = "localhost";
$username = "root";
$password = "";
$database= "food_basket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Fetch user data for authentication 
$sql = "Select * from users where email='$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
            if (password_verify($pass, $row['password'])){

                 $_SESSION['userid']=$row['user_id'];
				 $_SESSION['login']=1;
			
                 echo '<script type="text/javascript">'; 
                echo 'alert("Login Sucessful");';
              echo 'window.location.href = "index.php";';
               echo '</script>';
                
				
            } 
            else{
                 echo '<script type="text/javascript">'; 
                echo 'alert("Login Failed, Your password or username is wrong.");';
              echo 'window.location.href = "index.php";';
               echo '</script>';
            }
        }
	}


  
    ?>