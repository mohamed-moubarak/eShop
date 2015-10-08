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
		
			<!-- Navbar and Sidebar -->
	        <?php
	        	include('navbar.php');
	        ?>
	        <!-- login Page -->
	        <br/><br/>
	        <div id="page-content-wrapper" style="background-color: #b0c4de;">  
	        		<div class="col-md-4 col-md-offset-3 page-header">
				      <form class="form-signin" method="post" action="checklogin.php">
				        <h2 class="form-signin-heading">Please sign in</h2>
				        <label for="inputEmail" class="sr-only">Email address</label>
				        <input type="email" name="myemail" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
				        <label for="inputPassword" class="sr-only">Password</label>
				        <input type="password" name="mypassword" id="inputPassword" class="form-control" placeholder="Password" required="">
				        <div class="checkbox">
				          <label>
				            <input type="checkbox" value="remember-me"> Remember me
				          </label>
				        </div>
				        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login">Sign in</button>
					</form>
					</div>
		    </div>

	        

		<!-- Bootstrap core JavaScript -->
    	<script src="../js/jquery.js"></script>
    	<script src="../js/bootstrap.min.js"></script>
	</body>

</html>