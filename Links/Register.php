<?php session_start(); ?>
<!DOCTYPE HTML> 

<html>
<head>
<meta  name="viewport" content="width=device-width, initial-scale=1" charset="utf-8"> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
.error {color: #FF0000;}
</style>
</head>
<body> 
  <div class="container">
<?php
// define variables and set to empty values
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$passwordd = "root";
$dbname = "esHop";

// Create connection
$conn = mysqli_connect($servername, $username, $passwordd, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname=$lastname=$email=$password=$telephone=$address=$avatar=$firstnametmp=$lastnametmp=$emailtmp=$passtmp=$telephonetmp="";
$firstnameErr=$lastnameErr=$passwordErr=$telephoneErr=$addressErr=$avatarErr=$emailErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //      First Name

   if (empty($_POST["firstname"])) {
     $firstnameErr = "First Name is required";
   } else {
     $firstnametmp = test_input($_POST["firstname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$firstnametmp)) {
       $firstnameErr = "Only letters and white space allowed"; 
     }else{
      $firstname = test_input($_POST["firstname"]);
     }
   }

    //       lastname

    if (empty($_POST["lastname"])) {
     $lastnameErr = "Last Name is required";
   } else {
     $lastnametmp = test_input($_POST["lastname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lastnametmp)) {
       $lastnameErr = "Only letters and white space allowed"; 
     }else{
      $lastname = test_input($_POST["lastname"]);
     }
   }

   //       Email

   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $emailtmp = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($emailtmp, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }else{
      $email = test_input($_POST["email"]);
     }
   }

   //       Password
     
   if (empty($_POST["password"])) {
     $passwordErr = "Enter Password";
   } else {
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    $passtmp=$_POST["password"];
     if (!preg_match("#.*^(?=.{9,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $passtmp)){
      $passwordErr="Password is weak . It must be more than 8 characters, include at least one letter,  one Number and a Capital letter";
    }else {
      $password=$_POST["password"];
    }
 }

   if (empty($_POST["telephone"])){
    $telephoneErr = "Enter Telephone Number";
   } else {
     $telephonetmp = test_input($_POST["telephone"]);
    if (!ctype_digit($telephonetmp)){
    $telephoneErr = "Enter Numbers Only";
   }else{
    $telephone=test_input($_POST["telephone"]);
   }
 }

   //       Address
   if (empty($_POST["address"])) {
     $addressErr = "Address is required";
   } else {
     $address = test_input($_POST["address"]);
   }


   if (empty($_POST["avatar"])) {
     $avatarErr = "Avatar is required";
   } else {
     $avatar = test_input($_POST["avatar"]);
   }
 
 
}

//////////////////////////////////////////////////////////////Check///////////////////////////////////////////////////
function checkPassword($pwd, $errors) {
    if (strlen($pwd) < 8) {
        $errors = "Password too short!";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors = "Password must include at least one number!";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors = "Password must include at least one letter!";
    }     

    return $errors;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

?>

<h2>Registeration Form</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <div class="row">
   <div class="col-sm-2">First Name:</div> <input type="text" name="firstname" maxlength="40" value="<?php echo $firstname;?>">
   <span class="error">* <?php echo $firstnameErr;?></span>
   <br><br>
   <div class="col-sm-2">Last Name: </div> <input type="text" name="lastname" maxlength="40" value="<?php echo $lastname;?>">
   <span class="error">* <?php echo $lastnameErr;?></span>
   <br><br>
   <div class="col-sm-2">E-mail: </div><input type="text" name="email" maxlength="127" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   <div class="col-sm-2">Password: </div><input type="password" name="password" maxlength="20" value="<?php echo $password;?>">
   <span class="error">* <?php echo $passwordErr;?></span>
   <br><br>
   <div class="col-sm-2">Telephone: </div><input type="text" name="telephone" maxlength="25" value="<?php echo $telephone;?>">
   <span class="error">* <?php echo $telephoneErr;?></span>
   <br><br>
   <div class="col-sm-2">Address: </div><input type="text" name="address" maxlength="256" value="<?php echo $address;?>">
   <span class="error">* <?php echo $addressErr;?></span>
   <br><br>
   <div class="col-sm-2">Avatar: </div><input type="text" name="avatar" maxlength="256" value="<?php echo $avatar;?>">
   <span class="error">* <?php echo $avatarErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
</div>



<?php

if (strlen($firstname&&$lastname&&$email&&$password&&$telephone&&$address&&$avatar)>0){
  $sql = "INSERT INTO Users (First_name, Last_name, Email, Password, Phone_Number, Address , Avatar)
  VALUES ('$firstname', '$lastname', '$email', '$password', '$telephone', '$address', '$avatar')";
}
  if(!empty($conn->query($sql))){
      $conn->close();
      $_SESSION["email"] = '$email';
       header("Location: ../index.php");
  }

  ?>
</div>
</body>
</html>