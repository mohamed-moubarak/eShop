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

<?php session_start();

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
$current_email = $_SESSION['email'];

$sql = 'SELECT * FROM user WHERE email="'.$current_email.'"';
$results=mysqli_query($conn,$sql);
if ($results === FALSE) {
  echo "connection failed.";
  die();
}
include('navbar.php');
?>
<div class="col-md-10 col-md-offset-2">
<?php
while ($row = mysqli_fetch_array($results, MYSQL_NUM)) {
    echo '<h2>'.$row[0].' '.$row[1].'</h2></br>';

    echo '<h4>'.'Email: '.$row[2].'</h4></br>';

    echo '<h4>'.'Phone number: '.$row[4].'</h4></br>';
    echo '<h4>'.'Address: '.$row[5].'</h4></br>';
    echo '<h4>'.'Avatar: '.$row[6].'</h4></br>';
}
?>
<a href="change_name.php"> Edit Profile</a>
</div>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
</body>
</html>
