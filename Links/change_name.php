<?php session_start(); ?>
<!DOCTYPE HTML> 

<html>
    <head>
        <title>eShop | Registration</title>
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../CSS/stylesheet.css" rel="stylesheet">
    </head>

    <body>
          <!-- Navbar and Sidebar -->
<?php
include('navbar.php');          
include 'config.php';
$current_email = $_SESSION['email'];
$firstnameErr=$lastnameErr=$addressErr =$telephoneErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST["firstname"])){
       $firstnametmp = test_input($_POST["firstname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$firstnametmp)) {
       $firstnameErr = "Only letters and white space allowed"; 
     }else{
      $firstname = test_input($_POST["firstname"]);
      $sql='UPDATE user SET first_name = "'.$firstname.'" WHERE email="'.$current_email.'"';
      $mysqli->query($sql);

    }
  }
  if(!empty($_POST["lastname"])){
     $lastnametmp = test_input($_POST["lastname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lastnametmp)) {
       $lastnameErr = "Only letters and white space allowed"; 
     }else{
      $lastname = test_input($_POST["lastname"]);
      $sql='UPDATE user SET last_name = "'.$lastname.'" WHERE email="'.$current_email.'"';
      $mysqli->query($sql);

     }
  if (!empty($_POST["telephone"])){
    if (!ctype_digit($telephonetmp)){
    $telephoneErr = "Enter Numbers Only";
   }else{
    $telephone=test_input($_POST["telephone"]);
    $sql='UPDATE user SET phone_number = "'.$telephone.'" WHERE email="'.$current_email.'"';
    $mysqli->query($sql);
   }
 }

   //       Address
   if (!empty($_POST["address"])) {
     $address = test_input($_POST["address"]);
     $sql='UPDATE user SET phone_number = "'.$address.'" WHERE email="'.$current_email.'"';
    $mysqli->query($sql);
   }
  
  }
   header("Location: change_name_success.php");
}
  function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}



?>
<div class="col-md-6">
<h3 class="dark-grey">Edit your Profile</h3>
<form action="./change_name.php" name="Pass" method="post">
<div class="form-group col-lg-12">
 <label>First Name</label> 
 <input type="text" class="form-control" name="firstname" maxlength="40" value="">
  <span class="error"><?php echo $firstnameErr;?></span>
</div>
   
   <div class="form-group col-lg-12"><label>Last Name</label>
   <input type="text" class="form-control" name="lastname" maxlength="40" value="">
   <span class="error"><?php echo $lastnameErr;?></span>
   </div>

     <div class="form-group col-lg-12"><label>Phone number</label>
     <input type="text" class="form-control" name="telephone" maxlength="25" value="">
   <span class="error"><?php echo $telephoneErr;?></span>
   </div>
      <div class="form-group col-lg-12"><label>Address</label>
      <input type="text" class="form-control" name="address" maxlength="255" value="">
   <span class="error"><?php echo $addressErr;?></span>
   </div>
<br><button type="submit" class="btn btn-primary" name="Submitname" value="1" class="btn">Submit</button>
</form>
      <script src="../js/jquery.js"></script>
      <script src="../js/bootstrap.min.js"></script>
</body>
</html>