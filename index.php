<?php
 session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database= "food_basket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodbasket</title>
	<link rel="icon" type="image/x-icon" href="image/favicon.png">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">
  <!-- i for icon  -->
    <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> food basket </a>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">features</a>
        <a href="#products">products</a>
        <a href="#special">special fruit corner</a>
        <a href="#donate">donate</a>
        <a href="#sell">sell your product</a>
        <a href="#review">review</a>
        

        
    </nav>
  <!-- three icon  -->
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-user" id="login-btn"></div>
    </div>
  <!-- search bar form  -->
    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>
  <!-- Shopping Cart form  -->
    <div class="shopping-cart">
	<!-- Watermelon Box  -->
	
	 <?php
             if (!isset($_SESSION["login"]))
 {
 $userid=0;
 }
 else{
	$userid=$_SESSION['userid']; 	 
 }
          
 $totalprice=0;
 
 	
		    $sql1 = "SELECT p_id from cart where user_id= '$userid'";
            $result1 = mysqli_query($conn, $sql1);
		    while($row1 = mysqli_fetch_assoc($result1)) {
				$pid=$row1["p_id"];
		$sql = "Select * from products WHERE product_id='$pid'";
       $result = mysqli_query($conn, $sql);
				
			while($row = mysqli_fetch_assoc($result)) {	
			$totalprice=$totalprice+$row["product_price"];	
				
				
		  ?>	
        <div class="box">
            <a href="deleteCart.php?id=<?php echo  $row["product_id"] ?>"><i class="fas fa-trash"></i></a>
            <img src="image/<?php echo  $row["product_image"] ?>" alt="">
            <div class="content">
                <h3><?php echo  $row["product_title"] ?></h3>
                <span class="price"><?php echo  $row["product_price"] ?>Tk</span>
                <span class="quantity">qty : 1</span>
            </div>
        </div>
			<?php }} ?>
        <div class="total"> total : <?php echo  $totalprice ?> Tk/- </div>
        <a href="checkout.php" class="btn">checkout</a>
    </div>
<!-- Login form  -->
    <form action="loginvalidation.php" method="post" class="login-form">
	<!-- All class = CSS file -->
	<!-- Method post data hide -->
	<!-- Method get data can not hide -->
        <h3>login now</h3>
        <input type="email" placeholder="your email" class="box" name="email" required>
        <input type="password" placeholder="your password" class="box" name="password" required>
        <p>forget your password <a href="fpass.php">click here</a></p>
        <p>don't have an account <a href="register.php">create now</a></p>
		<!-- name is always varible, always use to call. Value is corresponding value -->
        <input type="submit" name="submit" value="Login" class="btn">
    </form>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">
<!--Slide start  -->
    <div class="slides-container">
<!--Start Page Default Slide  -->
        <div class="slide active">
            <div class="content">
                <span><h1>fresh vegetables</h1></span>
                <a href="#" class="btn">shop now</a>
            </div>
            <div class="image">
                <img src="image/v-png.png" alt="">
            </div>
        </div>
<!--Second Slide  -->
        <div class="slide">
            <div class="content">
                <span><h1>Donate Food</h1></span>
                
                <a href="#" class="btn">donate now</a>
            </div>
            <div class="image">
                <img src="image/v-3.png" alt="">
            </div>
        </div>
<!--Third Slide  -->
        <div class="slide">
            <div class="content">
                <span><h1>fresh meat</h1></span>
                
                <a href="#" class="btn">shop now</a>
            </div>
            <div class="image">
                <img src="image/meat.png" alt="">
            </div>
        </div>

    </div>
<!--Slide click  -->
    <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
    <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

</section>
<!-- home section ends -->

<!-- features section starts  -->
<!-- Card Design  -->
<section class="features" id="features">
<!-- h1-h6  -->
    <h1 class="heading"> our <span>features</span> </h1>

    <div class="box-container">
<!-- Card one -->
        <div class="box">
            <img src="image/feature-img-1.png" alt="">
            <h3>fresh and organic</h3>
            <p style="color: white; font-family: cursive;">Farm Fresh Organics is initiated to produce 
                and deliver 
                organic vegetables to consumers</p>
            
        </div>
		<!-- Card Second -->
        <div class="box">
            <img src="image/v-3.png" alt="">
            <h3>donate food</h3>
            <p style="color: white; font-family: cursive;">Donations can be made 
                within certain areas</p>
            
        </div>
<!-- Card third -->
        <div class="box">
            <img src="image/s.png" alt="">
            <h3>special fruit corner</h3>
            <p style="color: white; font-family: cursive;">Special fruits of different 
                countries will be available</p>
            
        </div>
<!-- Card fourth -->
        <div class="box">
            <img src="image/bs.png" alt="">
            <h3>Buy & Sell</h3>
            <p style="color: white; font-family: cursive;">Everyone can buy and sell here</p>
            
        </div>

    </div>

</section>

<!-- features section ends -->

<!-- vegitable section starts  -->


<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database= "food_basket";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
?>

<section class="products" id="products">
<!-- In Span= Adding CSS in Specific text  -->
    <h1 class="heading"> fresh <span>vegetable</span> </h1>

    <div class="swiper product-slider">
<!-- Wrapper= Adding CSS for Specific effect in sub Section  -->
        <div class="swiper-wrapper">
<!-- Card One -->
          <?php 
		    $sql = "SELECT * FROM products WHERE product_id  BETWEEN 1 AND 4;";

            $result = mysqli_query($conn, $sql);
		    while($row = mysqli_fetch_assoc($result)) {
		  ?>

            <div  class="swiper-slide box">
                <img src="image/<?php echo  $row["product_image"] ?>" alt="">
                <h3><?php echo  $row["product_title"] ?></h3>
                <div class="price"><?php echo  $row["product_price"] ?>Tk</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" class="btn">add to cart</a>
            </div>
			
		<?php } ?>

        </div>

    </div>
	<!-- Vegetable section first row end -->
	<!-- Vegetable section second row start -->

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
<!-- Card One -->
       <?php 
		    $sql1 = "SELECT * FROM products WHERE product_id  BETWEEN 5 AND 8;";

            $result = mysqli_query($conn, $sql1);
		    while($row = mysqli_fetch_assoc($result)) {
		  ?>



            <div  class="swiper-slide box">
                <img src="image/<?php echo  $row["product_image"] ?>" alt="">
                <h3><?php echo  $row["product_title"] ?></h3>
                <div class="price"><?php echo  $row["product_price"] ?>Tk</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" class="btn">add to cart</a>
            </div>
				<?php } ?>
			
   
        </div>

    </div>
<!-- Vegetable section second row end -->

</section>

<!-- vegitable section ends -->



<!-- fruit section starts  -->

<section class="products" id="products">

    <h1 class="heading"> fresh <span>fruits</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
  <!-- Card One -->
    <?php 
		    $sql2 = "SELECT * FROM products WHERE product_id  BETWEEN 9 AND 12;";

            $result = mysqli_query($conn, $sql2);
		    while($row = mysqli_fetch_assoc($result)) {
		  ?>
  
  
            <div class="swiper-slide box">
                <img src="image/<?php echo  $row["product_image"] ?>" alt="">
                <h3><?php echo  $row["product_title"] ?></h3>
                <div class="price"><?php echo  $row["product_price"] ?>Tk</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" class="btn">add to cart</a>
            </div>
			
			<?php } ?>
  
 <!-- Card Four End -->
        </div>

    </div>




</section>

<!-- fruit section ends -->


<!-- dairy section starts  -->

<section class="products" id="products">

    <h1 class="heading"> dairy <span>products</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
 <!-- Card One -->
 
  <?php 
		    $sql3 = "SELECT * FROM products WHERE product_id  BETWEEN 13 AND 16;";

            $result = mysqli_query($conn, $sql3);
		    while($row = mysqli_fetch_assoc($result)) {
		  ?>
            <div class="swiper-slide box">
                <img src="image/<?php echo  $row["product_image"] ?>" alt="">
                <h3><?php echo  $row["product_title"] ?></h3>
                <div class="price"><?php echo  $row["product_price"] ?>Tk</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" class="btn">add to cart</a>
            </div>
			<?php } ?>

        </div>

    </div>
          


</section>

<!-- dairy section ends -->



<!-- meat section starts  -->

<section class="products" id="products">

    <h1 class="heading"> fresh <span>meat</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
 <!-- Card One -->
   <?php 
		    $sql4 = "SELECT * FROM products WHERE product_id  BETWEEN 17 AND 20;";

            $result = mysqli_query($conn, $sql4);
		    while($row = mysqli_fetch_assoc($result)) {
		  ?>
 
            <div class="swiper-slide box">
                <img src="image/<?php echo  $row["product_image"] ?>" alt="">
                <h3><?php echo  $row["product_title"] ?></h3>
                <div class="price"><?php echo  $row["product_price"] ?>Tk</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" class="btn">add to cart</a>
            </div>
			<?php } ?>


        </div>

    </div>
</section>

<!-- meat section ends -->


<!-- special section Malaysia starts  -->


<section class="special" id="special">

    <h1 class="heading"> Malaysia <span>fruit corner</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
 <!-- Card One-->
   <?php 
		    $sql5 = "SELECT * FROM products WHERE product_id  BETWEEN 21 AND 23;";

            $result = mysqli_query($conn, $sql5);
		    while($row = mysqli_fetch_assoc($result)) {
		  ?>
            <div class="swiper-slide box">
                <img src="image/<?php echo  $row["product_image"] ?>" alt="">
                <h3><?php echo  $row["product_title"] ?></h3>
                <div class="price"><?php echo  $row["product_price"] ?>Tk</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" class="btn">add to cart</a>
            </div>
			<?php } ?>
 

          
        </div>

    </div>


</section>

<!-- special section Malaysia end  -->
<!-- special section Saudi Arabia Start  -->
<section class="special" id="special">

    <h1 class="heading"> Saudi Arabia <span>fruit corner</span> </h1>

    <div class="swiper product-slider">

        <div class="swiper-wrapper">
<!-- Card One-->
 <?php 
		    $sql6 = "SELECT * FROM products WHERE product_id  BETWEEN 24 AND 26;";

            $result = mysqli_query($conn, $sql6);
		    while($row = mysqli_fetch_assoc($result)) {
		  ?>
            <div class="swiper-slide box">
                <img src="image/<?php echo  $row["product_image"] ?>" alt="">
                <h3><?php echo  $row["product_title"] ?></h3>
                <div class="price"><?php echo  $row["product_price"] ?>Tk</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <a href="addToCart.php?id=<?php echo  $row["product_id"] ?>" class="btn">add to cart</a>
            </div>
			<?php } ?>

        </div>

    </div>


</section>
<!-- special section Saudi Arabia end  -->
<!-- special section ends -->



<!-- donate section starts -->

<section class="donate" id="donate">

    <h1 class="heading"> donate <span>food</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/v-3.png" alt="">
            <h3>Donations Can Be Made Within Certain Areas</h3>
            
            
        </div>
        <div class="container">
		<!-- donate section Form Start-->
		<!-- Button on click action perform-->
		<!-- Method senitize data-->
            <form action="donatevalidation.php" method="post">
          
              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Your name.."required>

              <label for="email">Email</label>
              <input type="text" id="email" name="email" placeholder="Enter Your Email.."required>

              <label for="phone">Phone Number</label>
              <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number.."required>
          
              <label for="location">Location</label>
              <select id="location" name="location">
			    <option value="Dhaka">Dhaka</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Natore">Natore</option>
                <option value="Dayarumpur">Dayarumpur</option>
                <option value="Chapainawabganj">Chapainawabganj</option>
              </select>
          
              <label for="subject">Subject</label>
              <textarea id="subject" type="text" name="subject" placeholder="Write something.." style="height:200px"></textarea>
          
              <input type="submit" name="Submit" value="Donate">
          
            </form>
			<!-- donate section Form End-->
          </div>
    </div>

</section>

<!-- donate section End -->

<!-- sell section starts -->

<section class="sell" id="sell">

    <h1 class="heading"> sell your <span>product</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="image/bs.png" alt="">
            <h3>Everyone Can Buy And Sell Here</h3>
            
            
        </div>
        <div class="container">
		<!-- Sell section Form Start-->
            <form action="productvalidation.php" method="post">
          
              <label for="name">Name</label>
              <input type="text" id="name" name="name" placeholder="Your name.."required>

              <label for="email">Email</label>
              <input type="text" id="email" name="email" placeholder="Enter Your Email.."required>

              <label for="phone">Phone Number</label>
              <input type="text" id="phone" name="phone" placeholder="Enter Your Phone Number.."required>
          

              <label for="product">Product Name</label>
              <input type="text" id="product" name="product" placeholder="Enter Product Name..">
          
                 <label for="location">Location</label>
              <select id="location" name="location">
			  <option value="Dhaka">Dhaka</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Natore">Natore</option>
                <option value="Dayarumpur">Dayarumpur</option>
                <option value="Chapainawabganj">Chapainawabganj</option>
              </select>
          
            
          
               <input type="submit" name="Submit" value="Product">
          
            </form>
			<!-- Sell section Form End-->
          </div>
    </div>

</section>

<!-- sell section End -->
<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> <span>what our client's are saying</span> </h1>

    <div class="swiper review-slider">

        <div class="swiper-wrapper">
<!-- Card one -->
            <div class="swiper-slide box">
                <img src="image/shakib.jpg" alt="">
                <p>I have been shopping from FoodBusket for the past few months and i am loving the experience. 
                    Have been shopping from here and i have recommended my relatives too.</p>
                <h3>Shakib</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
<!-- Card Two -->
            <div class="swiper-slide box">
                <img src="image/mashrafe.jpg" alt="">
                <p>Loved the service! I urgently needed some stuffs and ordered it here and they delivered in 
                    less than an hour as promised! Thanks a lot for that.</p>
                <h3>Mashrafe</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
<!-- Card Three -->
            <div class="swiper-slide box">
                <img src="image/mushfiqur-rahim.jpg" alt="">
                <p>Satisfied by their professionalism ! Got my tea bags in time. Didn't have to pay any delivery charge. I can't believe that. Keep it up !/p>
                <h3>mushfiqur-rahim</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
<!-- Card Four -->
            <div class="swiper-slide box">
                <img src="image/tamim.png" alt="">
                <p>I want to order something (A perfume) for my mom at BD. Although the delivery area was out of their scope,
                     their support team instantly replied to my query and manged to deliver the product.</p>
                <h3>Tamim Iqbal</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
<!-- Card Four End -->
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="box-container">
<!-- First Column in footer  -->
        <div class="box">
            <h3> food basket <i class="fas fa-shopping-basket"></i> </h3>
            <p>online grocery shop</p>
            <div class="share">
                <a href="https://www.facebook.com/Abdullah.Al.Monayem29" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="https://www.instagram.com/abdullah_al_monayem_29" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>
<!-- Second Column in footer  -->
        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> 01747534818 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> 01957675711 </a>
            <a style="text-transform: lowercase;" href="#" class="links"> <i class="fas fa-envelope"></i> almonayem2019@gmail.com</a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Baily road, Dhaka </a>
        </div>
<!-- Third Column in footer  -->
        <div class="box">
            <h3>quick links</h3>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="#donate" class="links"> <i class="fas fa-arrow-right"></i> donate </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> special fruit corner </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> features </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> products </a>
            <a href="#" class="links"> <i class="fas fa-arrow-right"></i> sell your product </a>
            
            
        </div>
<!-- Four Column in footer  -->
        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <input type="email" placeholder="your email" class="email">
            <input type="submit" value="subscribe" class="btn">
            <img src="image/payment.png" class="payment-img" alt="">
        </div>

    </div>


</section>

<!-- footer section ends -->


<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>