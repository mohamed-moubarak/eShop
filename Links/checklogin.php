<?php
session_start();
ob_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="root"; // Mysql password
$db_name="eShop"; // Database name
$tbl_name="Users"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myemail and $mypassword 
$myemail=$_POST['myemail'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myemail = stripslashes($myemail);
$mypassword = stripslashes($mypassword);
$myemail= mysql_real_escape_string($myemail);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE Email='$myemail' and Password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myemailand $mypassword, table row must be 1 row
if($count==1){
// Register $myemail, $mypassword and redirect to file "login_success.php"
$_SESSION["email"] = '$myemail'; 
header("Location: login_success.php");
}
else {
echo "Wrong Email or Password";
}
ob_end_flush();
?>