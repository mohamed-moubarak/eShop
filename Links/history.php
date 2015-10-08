<?php
session_start();
include_once("config.php");
?>
<html>
	<head>
		<title>eShop | History</title>
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
		
<?php
include('navbar.php');
$email=$_SESSION['email'];
$sql="SELECT name, quantity, date from products INNER JOIN cart where cart.user='$email' AND cart.product=products.PID";
$results=mysqli_query($mysqli,$sql);
if ($results === FALSE) {
  echo "connection failed.";
  die();
}
echo '<h3 class="dark-grey col-md-offset-1">History</h3> 
	        	<div class="table-responsive page-header col-md-10 col-md-offset-1">          
 					<table class="table">
 					<thead>
 						<tr>
 						<th> Product name </th>
 						<th> Quantity </th>
 						<th> Date and Time </th>
 					</thead>
					    <tbody>';
while ($row = mysqli_fetch_array($results, MYSQL_NUM)) {
	echo '<tr>';
    echo '<td>'.$row[0].'</td>';
    echo '<td>'.$row[1].'</td>';
    echo '<td>'.$row[2].'</td>';
    echo "</tr>";
}
echo '</tbody></table></div>'
?>

    	<script src="../js/jquery.js"></script>
    	<script src="../js/bootstrap.min.js"></script>
</body>
</html>