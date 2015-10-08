<?php
session_start();
include_once("config.php");
if(!isset($_SESSION['email'])){
	echo '<script> alert("please sign up or sign in");
					window.location.href="login.php"</script>';

}else{
foreach ($_SESSION["cart_products"] as $cart_itm)
	{
	//set variables to use in content below
	$PID = $cart_itm["PID"];
	$product_qty = $cart_itm["product_qty"];
	$product_name = $cart_itm["product_name"];
	$current_email = $_SESSION['email'];
	$product_price = $cart_itm["product_price"];
	$sql='SELECT stock FROM Products WHERE PID="'.$PID.'"';
	$results=mysqli_query($mysqli,$sql);
	$row = mysqli_fetch_array($results, MYSQL_NUM);
	if($product_qty>$row[0]){
		echo 'Out of stock "'.$product_name.'"';
	}else{
			$sq="INSERT INTO Cart (user , product , quantity ) VALUES ('$current_email','$PID', '$product_qty')";
			$sql='UPDATE Products SET stock = stock - "'.$product_qty.'" WHERE PID = "'.$PID.'"';
			if ($mysqli->query($sq) === TRUE && $mysqli->query($sql) === TRUE) {
      			echo '<script> alert("Your Product is being shipped now");
					window.location.href="products.php"</script>';
			
		}else{
			echo "no add";
		}
			
		}
	}
}
?>
