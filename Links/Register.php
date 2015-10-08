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
          ?>
            <!--registration page-->

<?php
// define variables and set to empty values
error_reporting(E_ALL);
$servername = "localhost";
$username = "root";
$passwordd = "";
$dbname = "eShop";

// Create connection
$conn = mysqli_connect($servername, $username, $passwordd, $dbname);
if (!$conn) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

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

if (strlen($firstname&&$lastname&&$email&&$password&&$telephone&&$address&&$avatar)>0){
  $sql = "INSERT INTO User (first_name, last_name, email, password, phone_number, address , avatar)
  VALUES ('$firstname', '$lastname', '$email', '$password', '$telephone', '$address', '$avatar')";
 }else{
  $sql = FALSE;
 }
 if(!empty($sql)){
  if ($conn->query($sql) === TRUE) {
      
      $_SESSION["email"] = $email;
      $conn->close();
      header("Location: register_success.php");
    } else {
      $email="";
      echo "Email Already Existed";
      $conn->close();
    }
  }

?>
              
                <div class="col-md-6">
                  <h3 class="dark-grey">Registration</h3>
                  <p><span class="error">* required field.</span></p>
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                    <div class="form-group col-lg-12">
                      <label>First Name</label>
                      <span class="error"> * <?php echo $firstnameErr;?></span>
                      <input type="text" class="form-control" name="firstname" maxlength="40" value="<?php echo $firstname;?>">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Last Name</label>
                      <span class="error"> * <?php echo $lastnameErr;?></span>
                      <input type="text" class="form-control" name="lastname" maxlength="40" value="<?php echo $lastname;?>">
                    </div>
                    <div class="form-group col-lg-6">
                      <label>Email</label>
                      <span class="error"> * <?php echo $emailErr;?></span>
                      <input type="text" class="form-control" name="email" maxlength="127" value="<?php echo $email;?>">
                    </div>
                    <div class="form-group col-lg-6">
                      <label>Password</label>
                      <span class="error"> * <?php echo $passwordErr;?></span>
                      <input type="password" class="form-control" name="password" maxlength="20" value="<?php echo $password;?>">
                    </div>
                    <div class="form-group col-lg-6">
                      <label>Telephone</label>
                      <span class="error"> * <?php echo $telephoneErr;?></span>
                      <input type="text" class="form-control" name="telephone" maxlength="25" value="<?php echo $telephone;?>">
                    </div>
                    <div class="form-group col-lg-6">
                      <label>Address</label>
                      <span class="error"> * <?php echo $addressErr;?></span>
                      <input type="text" class="form-control" name="address" maxlength="256" value="<?php echo $address;?>">
                    </div>
                    <div class="form-group col-lg-12">
                      <label>Avatar</label>
                      <span class="error"> * <?php echo $avatarErr;?></span>
                      <input type="text" class="form-control" name="avatar" maxlength="256" value="<?php echo $avatar;?>">
                    </div>
                    <div class="form-group col-lg-2 ">
                      <input type="submit" class="btn btn-primary" name="submit" value="Register"> 
                    </div>
                  </form>
                </div>

      <script src="../js/jquery.js"></script>
      <script src="../js/bootstrap.min.js"></script>
    </body>
</html>