<html>
  <head>
    <title>eShop | Products</title>
    <!-- Bootstrap core CSS -->
    <link href="../CSS/bootstrap-theme.css" rel="stylesheet">
    <link href="../CSS/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../CSS/bootstrap.css" rel="stylesheet">
      <link href="../CSS/bootstrap.min.css" rel="stylesheet">
      <link href="../CSS/stylesheet.css" rel="stylesheet">
  </head>

  <body>
<?php
session_start();
include 'config.php';
include('navbar.php');
$current_email = $_SESSION['email'];
$passwordErr=$oldpasswordErr="";
$sql='SELECT password FROM user WHERE email= "'.$current_email.'"';
$results=mysqli_query($mysqli,$sql);
$row= mysqli_fetch_array($results, MYSQL_NUM);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $passtmp=$_POST["new_password"];
     if (empty($_POST["new_password"])) {
     $passwordErr = "New Password Cannot be empty";
    } else if(empty($_POST["old_password"])) {
       $passwordErr = "Old Password Cannot be empty";
   }else if (!preg_match("#.*^(?=.{9,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $passtmp)){
        $passwordErr="Password is weak . It must be more than 8 characters, include at least one letter,  one Number and a Capital letter";
    }else if($_POST["old_password"] != $row[0]){
      $oldpasswordErr="Wronge Email Address";
    }else{
      $password=$_POST["new_password"];
      $sql='UPDATE user SET password = "'.$password.'" WHERE email="'.$current_email.'"';
    $mysqli->query($sql);
    header("Location: change_pass_success.php");
    }
  }


?>
          <div id="page-content-wrapper" style="background-color: #b0c4de;">  
              <div class="col-md-4 col-md-offset-3 page-header">
                <form action="./change_pass.php" name="Pass" method="post">
                <div class="form-group col-lg-12">
                <label>Old Password</label>
                <input type="password" class="form-control" name="old_password" maxlength="20" value=""> <span class="error">* <?php echo $oldpasswordErr;?></span><br>
                </div>
                <div class="form-group col-lg-12">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password" maxlength="20" value="">
                   <span class="error">* <?php echo $passwordErr;?></span>
                  </div>
                <br><button type="submit" class="btn btn-primary" name="SubmitPass" value="1" class="btn">Submit</button>
                </form>
      <script src="../js/jquery.js"></script>
      <script src="../js/bootstrap.min.js"></script>
</body>
</html>