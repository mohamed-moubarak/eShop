<?php
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="eShop"; // Database name
$tbl_name="User"; // Table name

include 'config.php';

// Define $myemail and $mypassword 
$myemail=$_POST["myemail"];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myemail = stripslashes($myemail);
$mypassword = stripslashes($mypassword);
$myemail= mysql_real_escape_string($myemail);
$mypassword = mysql_real_escape_string($mypassword);
$sql='SELECT COUNT(*) FROM user WHERE Email="'.$myemail.'" and Password ="'.$mypassword.'"';
$results=mysqli_query($mysqli,$sql);

// Mysql_num_row is counting table row
$row= mysqli_fetch_array($results, MYSQL_NUM);


// If result matched $myemailand $mypassword, table row must be 1 row
if($row[0]=='1'){
// Register $myemail, $mypassword and redirect to file "login_success.php"
session_start();	
$_SESSION['email'] = $myemail; 
header("Location: login_success.php");
}
else {
echo "Wrong Email or Password";
}
ob_end_flush();
?>