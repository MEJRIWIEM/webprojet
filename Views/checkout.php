




<?php 
session_start();
require 'connect.php';
require 'item.php';
		 

					

					 echo   $_SESSION['username']  ;
					 $cii = $_SESSION['username']  ;


				 
			 

// Save new orders
$sql1 = 'INSERT INTO orders (name, datecreation, status, username) VALUES ("New Order","'.date('Y-m-d').'",0,"'.$cii.'")';
mysqli_query($con, $sql1);
$ordersid = mysqli_insert_id($con); 
// Save order details for new orders
$cart = unserialize(serialize($_SESSION['cart']));
for($i=0; $i<count($cart);$i++) {
$sql2 = 'INSERT INTO odersdetail (productid, ordersid, price, quantity) VALUES ('.$cart[$i]->id.', '.$ordersid.', '.$cart[$i]->price.', '.$cart[$i]->quantity.')';
mysqli_query($con, $sql2);
}
// Clear all product in cart
unset($_SESSION['cart']);
 ?>
  
 <?php  header( "refresh:0;url=cart.php" );
;?> 