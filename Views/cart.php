 
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>



<body>

	<?php 
	session_start();
	 $piww = $_SESSION['username']  ;
	  
 
require 'connect.php' ; 
$shoppig = "SELECT *  FROM users   where username = '$piww'" ;
               
 $rez = mysqli_query($conn, $shoppig);
  $iiiz = mysqli_num_rows($rez) ;
   
while($mow=mysqli_fetch_assoc($rez)){
$shoppingcart  =   $mow['panier'] ; 
 

 
$conn->close();
$_SESSION['panier'] = $shoppingcart ; 

};

 
  
 






	?> 




 



	 <?php 
// Start the session


require 'connect.php';
require 'item.php';
	 $cii = $_SESSION['username']  ;

	  
	
	







	






if(isset($_GET['id']) && !isset($_POST['update'])  /* and if not in cart */)  { 
	 require 'connect.php' ; 
	 $_SESSION['panier'] =   $_SESSION['panier'] +1 ; 

	 $sfr = "UPDATE users SET panier = panier + 1 where username = '$cii' 
            ;" ; 
            mysqli_query($conn,$sfr); 
            $conn->close();
            include 'connect.php' ; 
	$sql = "SELECT * FROM product WHERE id=".$_GET['id'];
	$result = mysqli_query($con, $sql);
	$product = mysqli_fetch_object($result); 
	$item = new Item();
	$item->id = $product->id;
	$item->name = $product->name;
	$item->price = $product->price;
    $iteminstock = $product->quantity;
    $item->image=$product->image;
	$item->quantity = 1;
	$ordersid = 1 ; 

$incarte =  "SELECT username, productid,quantity FROM odersdetail
            WHERE username = '$cii' 
            AND productid = '$product->id'"; 
	$rez = mysqli_query($con, $incarte);
	$checking = mysqli_num_rows($rez) ;
	  
	  










	$con->close();
	  //
	

if($checking==0) {


$pss = 1; // put one in quantity mahdouuch 
$sql = "INSERT INTO `odersdetail` (`productid`, `username`, `price`, `quantity`, `image`) VALUES ('$product->id', '$cii', '$product->price', '$pss', '$product->image');
";



if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


	  //

	// Check product is existing in cart
	$index = -1;
	$cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
	for($i=0; $i<count($cart);$i++)
		if ($cart[$i]->id == $_GET['id']){
			$index = $i;
			break;
		}
		if($index == -1) 
			$_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
		else {
			
			if (($cart[$index]->quantity) < $iteminstock)
				 $cart[$index]->quantity ++;
			     $_SESSION['cart'] = $cart;
		}

	}	

if ( $checking > 0 ) {
	require 'connect.php' ; 


	 $sfr = "UPDATE odersdetail SET quantity = quantity + 1 where username = '$cii' 
            AND productid = '$product->id' ;" ; 
            mysqli_query($conn,$sfr); 
            $conn->close();
}

	
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
	include 'connect.php' ; 
	$_SESSION['panier'] = $_SESSION['panier'] - 1 ; 
	$sqldelete = "DELETE FROM odersdetail WHERE productid='".$_GET['index']."';" ; 
	mysqli_query($conn,$sqldelete);

	$conn->close();
	require 'connect.php' ; 


	 $fsr = "UPDATE users SET panier = panier - 1 where username = '$cii' 
            ;" ; 
            mysqli_query($con,$fsr); 
            $con->close();


	 

}

// Update quantity in cart
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}

?> 



<!-- test start --> 
						<?php 
						require 'connect.php' ;
						$sql = "SELECT * From  orders;" ; 
						$result = mysqli_query($conn,$sql);
						$resultCheck = mysqli_num_rows($result) ;
						if ($resultCheck > 0 ) {
							while($row=mysqli_fetch_assoc($result)) { 
								if($row['username']==$_SESSION['username']):?> 
								
						 <h1> 
						  <?php


						  
						  $ods = $row['id'] ; 

						 


						  ?> 

						  </h1>	


								<?php endif ; } ; };

								$conn->close(); ?> 





						  


						
 
										 

 				 
 		<!-- test end --> 
<form method="POST">
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 text-center text-lg-left">
						<!-- logo -->
						<a href="./index.html" class="site-logo">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-xl-6 col-lg-5">
						<form class="header-search-form">
							<input type="text" placeholder="Search on divisima ....">
							<button><i class="flaticon-search"></i></button>
						</form>
					</div>
					<div class="col-xl-4 col-lg-5">
						<div class="user-panel">
							<div class="up-item">
								<i class="flaticon-profile"> welcome <?php  
								if($check == 0 )
								
									 echo   $_SESSION['username'];

								?></i>

								
								 
							</div>
							<?php  if (isset($_SESSION['username'])) : ?>
							<p> <a href="index.php?logout='1'" ">logout</a> </p>
							<?php endif ?>
							<div class="up-item">
								<div class="shopping-card">
									<i class="flaticon-bag"></i>
									<?php
										   


									 $shoppingcard = $shoppingcart + 1  ;  ?>
									<span><?php echo $_SESSION['panier'];?></span>
								</div>
								<a href="#">Shopping Cart</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="main-navbar">
			<div class="container">
				<!-- menu -->
				<ul class="main-menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">Women</a></li>
					<li><a href="#">Men</a></li>
					<li><a href="#">Jewelry
						<span class="new">New</span>
					</a></li>
					<li><a href="#">Shoes</a>
						<ul class="sub-menu">
							<li><a href="#">Sneakers</a></li>
							<li><a href="#">Sandals</a></li>
							<li><a href="#">Formal Shoes</a></li>
							<li><a href="#">Boots</a></li>
							<li><a href="#">Flip Flops</a></li>
						</ul>
					</li>
					<li><a href="#">Pages</a>
						<ul class="sub-menu">
							<li><a href="./product.html">Product Page</a></li>
							<li><a href="./category.html">Category Page</a></li>
							<li><a href="./cart.html">Cart Page</a></li>
							<li><a href="./checkout.html">Checkout Page</a></li>
							<li><a href="./contact.html">Contact Page</a></li>
						</ul>
					</li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<!-- Header section end -->


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section start -->
	<section class="cart-section spad">
		 
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						<div class="cart-table-warp">
							<form method="POST" >
							<table>
								
							<tbody>
							<thead>
								<tr>
									 <th class="product-th">Product</th>
									<th class="quy-th">Quantity</th>
									<th class="size-th">delete</th>
									<th class="total-th">Price</th>
								</tr>
							</thead>
						<!-- test2 -->
   

						<!-- test2 end --> 	


						  
						 <?php
include 'connect.php';
$sql =  "SELECT productid, quantity FROM odersdetail where username='".$cii."'";
$result = $conn->query($sql);
$prods = 0 ; 
$total1 = 0 ; 

if ($result->num_rows > 0) {

	 	
     // output data of each row
    while($row = $result->fetch_assoc()) {
    	   
        $prods = $row['productid'] ; 
        $qtty = $row['quantity'] ; 
         
        $sql2 = "SELECT id,name, price,image , quantity FROM product";
        $result1 = $com->query($sql2);

        // echo $result1->num_rows ;
    	  
         while($row1 = $result1->fetch_assoc()) {
         	if ( $prods == $row1['id'])  
         		{ ?> 
         			<?php  $total1 = $row1['price']*$row['quantity'] + $total1 ; ?>
         			 <tr>
									<td class="product-col">
									 <?php  //echo "<img src=$product->name > </img>"; 
									 $imm1= $row1['image'] ;  

									 	echo  "<img  src=$imm1> ;"

									 ?>
										<div class="pc-title">
									<?php	echo $row1['name']    ;  ?>
											<p>  </p>
										</div>
									</td>
									<td class="quy-col">
										<div class="quantity">
					                        <div class="pro-qty">
		                        	<?php 
		                        	 
		                        	// quantity display 
/*
								require 'connect.php' ; 


								 $sfr = "SELECT  `quantity` FROM `odersdetail` WHERE   username = '$cii' 
							            AND productid = '$product->id' ;" ; 
							            mysqli_query($conn,$sfr); 
							            $conn->close();




*/


		                        	;?> 

												<input type="number" min="1"  value="<?php echo $row['quantity'] ;?>" name="quantity[]" >
											</div>
                    					</div>
									</td>
									<td class="size-col"><h4><a  href="cart.php?index=<?php echo $prods; ?>" onclick="return confirm('Are you sure?')">Remove item</a></h4></td>
									<td class="total-col"><h4> <?php echo $row1['price']*$row['quantity']; ?> </h4></td>
								</tr>











<?php 
				  ;
         		 }



         }



    
         
    }
} else {
    echo "you have nothing in your cart ";
}

$conn->close();
?>
 








 
		
							</tbody>
					

						</table>
						<input id="saveimg" type="image" src="img/save.png" name="update" alt="Save Button" width="100" height="100"> <br> <br> update your card 
        				<input type="hidden" name="update">
					</form>
						</div>
						<div class="total-cost">

							<h6>Total <span> <?php echo $total1; ?>  </span></h6>
							<br> <br> 

						</div>
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<form class="promo-code-form">
						<input type="text" placeholder="Enter promo code">
						<button>Submit</button>
					</form>
					
					<a href="index.php" class="site-btn">Go to checkout </a>
					<a href="index.php" class="site-btn sb-dark">Continue shopping</a>
					<form action="sendcart.php" method="GET"> <a href="cart.php" class="site-btn">save card </a> </form>

				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->


	<!-- Footer section -->
	<section class="footer-section">
		<div class="container">
			<div class="footer-logo text-center">
				<a href="index.html"><img src="./img/logo-light.png" alt=""></a>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>About</h2>
						<p>Donec vitae purus nunc. Morbi faucibus erat sit amet congue mattis. Nullam frin-gilla faucibus urna, id dapibus erat iaculis ut. Integer ac sem.</p>
						<img src="img/cards.png" alt="">
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<ul>
							<li><a href="">About Us</a></li>
							<li><a href="">Track Orders</a></li>
							<li><a href="">Returns</a></li>
							<li><a href="">Jobs</a></li>
							<li><a href="">Shipping</a></li>
							<li><a href="">Blog</a></li>
						</ul>
						<ul>
							<li><a href="">Partners</a></li>
							<li><a href="">Bloggers</a></li>
							<li><a href="">Support</a></li>
							<li><a href="">Terms of Use</a></li>
							<li><a href="">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget about-widget">
						<h2>Questions</h2>
						<div class="fw-latest-post-widget">
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/1.jpg"></div>
								<div class="lp-content">
									<h6>what shoes to wear</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
							<div class="lp-item">
								<div class="lp-thumb set-bg" data-setbg="img/blog-thumbs/2.jpg"></div>
								<div class="lp-content">
									<h6>trends this year</h6>
									<span>Oct 21, 2018</span>
									<a href="#" class="readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="footer-widget contact-widget">
						<h2>Questions</h2>
						<div class="con-info">
							<span>C.</span>
							<p>Your Company Ltd </p>
						</div>
						<div class="con-info">
							<span>B.</span>
							<p>1481 Creekside Lane  Avila Beach, CA 93424, P.O. BOX 68 </p>
						</div>
						<div class="con-info">
							<span>T.</span>
							<p>+53 345 7953 32453</p>
						</div>
						<div class="con-info">
							<span>E.</span>
							<p>office@youremail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="social-links-warp">
			<div class="container">
				<div class="social-links">
					<a href="" class="instagram"><i class="fa fa-instagram"></i><span>instagram</span></a>
					<a href="" class="google-plus"><i class="fa fa-google-plus"></i><span>g+plus</span></a>
					<a href="" class="pinterest"><i class="fa fa-pinterest"></i><span>pinterest</span></a>
					<a href="" class="facebook"><i class="fa fa-facebook"></i><span>facebook</span></a>
					<a href="" class="twitter"><i class="fa fa-twitter"></i><span>twitter</span></a>
					<a href="" class="youtube"><i class="fa fa-youtube"></i><span>youtube</span></a>
					<a href="" class="tumblr"><i class="fa fa-tumblr-square"></i><span>tumblr</span></a>
				</div>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --> 
<p class="text-white text-center mt-5">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

			</div>
		</div>
	</section>
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
