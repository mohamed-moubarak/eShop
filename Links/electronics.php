<html>
	<head>
		<title>eShop | Products</title>
		<!-- Bootstrap core CSS -->
		<link href="../CSS/bootstrap-theme.css" rel="stylesheet">
		<link href="../CSS/bootstrap-theme.min.css" rel="stylesheet">
		<link href="../CSS/bootstrap.css" rel="stylesheet">
    	<link href="../CSS/bootstrap.min.css" rel="stylesheet">
    	<link href="../CSS/stylesheet.css" rel="stylesheet">
		<link href="css/simple-sidebar.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
	</head>

	<body>
		
		<!-- Navbar and Sidebar -->
        <?php
        	session_start();
        	include 'config.php';
        	include('unauthenticated_header.php');
        ?>
	        <!-- Products Page -->
	        <div class="col-md-10">
	           <?php

//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>

<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="cart-view-table-front" id="view-cart">';
    echo '<h3>Your Shopping Cart</h3>';
    echo '<form method="post" action="cart_update.php">';
    echo '<table width="100%"  cellpadding="6" cellspacing="0">';
    echo '<tbody>';

    $total =0;
    $b = 0;
    foreach ($_SESSION["cart_products"] as $cart_itm)
    {
        $product_name = $cart_itm["product_name"];
        $product_qty = $cart_itm["product_qty"];
        $product_price = $cart_itm["product_price"];
        $PID= $cart_itm["PID"];
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'">';
        echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$PID.']" value="'.$product_qty.'" /></td>';
        echo '<td>'.$product_name.'</td>';
        echo '<td><input type="checkbox" name="remove_code[]" value="'.$PID.'" /> Remove</td>';
        echo '</tr>';
        $subtotal = ($product_price * $product_qty);
        $total = ($total + $subtotal);
    }
    echo '<td colspan="4">';
    echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
    echo '</td>';
    echo '</tbody>';
    echo '</table>';
    
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';

}
?>

	        	<h3 class="dark-grey col-md-offset-1">Electronics</h3> 
	        	<div class="table-responsive page-header col-md-offset-1">          
 					<table class="table">
					    <tbody>
					        <tr>
					        <!-- View Cart Box End -->

							<!-- Products List Start -->
<?php
$results = $mysqli->query("SELECT PID  , name as product_name, picture_url as product_img_name , stock,  price FROM products WHERE products.category = 'electronics'");
if($results){ 
$products_item = '';
//fetch results set as object and output HTML
$counter = 0;
while($obj = $results->fetch_object())
{
	if($obj->stock>0) {
		$counter++;
	if ($counter%4 == 0) {
		$products_item .= <<<EOT
	<td data-field="price" align="center">
	<form method="post" action="cart_update.php">
	<img class="img-thumbnail" src="{$obj->product_img_name}" alt="Generic placeholder image" width="200" height="200"> <br/>{$obj->product_name}<br/> Price: {$currency}{$obj->price} 
	<fieldset>

	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="PID" value="{$obj->PID}" />
	<input type="hidden" name="type" value="add" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div>
	</form>
	</td>
	</tr><tr>

EOT;
	}
	else {
$products_item .= <<<EOT

	<td data-field="price" align="center">
	<form method="post" action="cart_update.php">
	<img class="img-thumbnail" src="{$obj->product_img_name}" alt="Generic placeholder image" width="200" height="200"> <br/>{$obj->product_name}<br/> Price: {$currency}{$obj->price} 

	<fieldset>

	<label>
		<span>Quantity</span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="PID" value="{$obj->PID}" />
	<input type="hidden" name="type" value="add" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div>
	</form>
	</td>

EOT;
}}
	else {
	$counter++;
	if ($counter%4 == 0) {
		$products_item .= <<<EOT
	<td data-field="price" align="center">
	<form method="post" action="cart_update.php">
	<img class="img-thumbnail" src="{$obj->product_img_name}" alt="Generic placeholder image" width="200" height="200"> <br/>{$obj->product_name}<br/> Price: {$currency}{$obj->price}


	<input type="hidden" name="PID" value="{$obj->PID}" />
	<input type="hidden" name="type" value="add" />
	<div align="center" style="color: red;">Out of Stock!</div>
	</div>
	</form>
	</td>
	</tr><tr>

EOT;
	}
	else {
$products_item .= <<<EOT

	<td data-field="price" align="center">
	<form method="post" action="cart_update.php">
	<img class="img-thumbnail" src="{$obj->product_img_name}" alt="Generic placeholder image" width="200" height="200"> <br/>{$obj->product_name}<br/> Price: {$currency}{$obj->price} 


	<input type="hidden" name="PID" value="{$obj->PID}" />
	<input type="hidden" name="type" value="add" />
	<div align="center" style="color: red;">Out of Stock!</div>
	</div>
	</form>
	</td>

EOT;
}}
}

echo $products_item . '</tr>';
}
?>    
					        

					    </tbody>
					</table> 
				</div>	
		    </div>

	        

		<!-- Bootstrap core JavaScript -->
    	<script src="../js/jquery.js"></script>
    	<script src="../js/bootstrap.min.js"></script>

	</body>

</html>