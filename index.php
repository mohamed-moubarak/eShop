<?php session_start();?>
<html>
	<head>
		<title>eShop | Homepage</title>
		<!-- Bootstrap core CSS -->
    	<link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./CSS/stylesheet.css" rel="stylesheet">
        <link href="./CSS/full-slider.css" rel="stylesheet">
        <link href="./CSS/scrolling-nav.css" rel="stylesheet">
	</head>
	<body>
		    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#myCarousel"><span class="glyphicon glyphicon-shopping-cart"></span>
                eShop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="links/products.php">Products</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
				  <?php 
				  
				  if( !isset( $_SESSION['email'] ) )
		   			{
				  	echo '<button type="button" style="float:right;" class="btn btn-default navbar-btn btn-primary" onclick="location.href=\'./links/register.php\';">Sign up</button>
                		  <button type="button" style="float:right;" class="btn btn-default navbar-btn" onclick="location.href=\'./links/login.php\';">Sign in</button>';
				  }else{
				  	echo '<div class="dropdown" style="float:right;">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="./links/profile.php">My Profile</a></li>
                    <li><a href="./links/view_cart.php">My Cart</a></li>
                    <li><a href="./links/history.php">History</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="./links/change_pass.php">Change Your Password</a></li>
                    <li><a href="./links/logout.php">Logout</a></li>
                  </ul>
                </div>
				  	';
				  }
				  ?>

                
                  
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Full Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('./images/photo-1416339698674-4f118dd3388b.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Your online clothes store</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('./images/photo-1421757381940-5d269570b21c.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Your online electronics store</h2>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('./images/photo-1422480041422-130238c67fe2.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Your online store for everything</h2>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>

    <div class="row col-lg-10 col-md-offset-1" id="products">
    	<h1>Featured Products</h1>
        <div class="col-lg-4">
        <div class="col-md-offset-2">
          <img class="img-thumbnail" src="./images/photo-1426523038054-a260f3ef5bc9 (2).jpg" alt="Generic placeholder image" width="200" height="200">
          <h2>Dark Blue Suit</h2>
          
        </div><!-- /.col-lg-4 -->
        </div>
        <div class="col-lg-4">
        <div class="col-md-offset-2">
          <img class="img-thumbnail" src="./images/photo-1428930377079-45a584b6dd6b (2).jpg" alt="Generic placeholder image" width="200" height="200">
          <h2>Scarf</h2>
          
        </div><!-- /.col-lg-4 -->
        </div>
        <div class="col-lg-4">
        <div class="col-md-offset-2">
          <img class="img-thumbnail" src="./images/photo-1429117237875-aa29229d99f0%20%282%29.jpg" alt="Generic placeholder image" width="200" height="200">
          <h2>Modern Bed</h2>
          
        </div><!-- /.col-lg-4 -->
        </div>
    </div>

    <div class="row col-lg-12 services-section" id="about">
    <h1>About</h1>
    <p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, alias, dignissimos, aspernatur, quidem nihil architecto sequi vero explicabo est maiores atque laudantium similique omnis iusto corporis molestias eveniet blanditiis nam numquam fugiat animi quis necessitatibus perspiciatis magni doloremque aperiam culpa adipisci nisi deleniti dolores. Vitae rerum obcaecati quasi asperiores itaque.
        Ipsum, aspernatur, soluta distinctio debitis quos ab necessitatibus saepe facilis voluptatibus perspiciatis molestias laudantium minus magni ea pariatur reprehenderit officia provident deserunt quasi dolor optio dolore inventore eos. Accusamus, obcaecati, quod reiciendis recusandae amet fugiat dolores magnam velit provident repellendus vel eum exercitationem quia cum nulla perferendis quibusdam? Alias, dolore!</p>
    </div>

    <div class="row col-lg-12 contact-section" id="contact">
	<h1>Contact</h1>
    <p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, alias, dignissimos, aspernatur, quidem nihil architecto sequi vero explicabo est maiores atque laudantium similique omnis iusto corporis molestias eveniet blanditiis nam numquam fugiat animi quis necessitatibus perspiciatis magni doloremque aperiam culpa adipisci nisi deleniti dolores. Vitae rerum obcaecati quasi asperiores itaque.
        Ipsum, aspernatur, soluta distinctio debitis quos ab necessitatibus saepe facilis voluptatibus perspiciatis molestias laudantium minus magni ea pariatur reprehenderit officia provident deserunt quasi dolor optio dolore inventore eos. Accusamus, obcaecati, quod reiciendis recusandae amet fugiat dolores magnam velit provident repellendus vel eum exercitationem quia cum nulla perferendis quibusdam? Alias, dolore!</p>
    </div>

		<!-- Bootstrap core JavaScript -->
    	<script src="js/jquery.js"></script>
    	<script src="./js/bootstrap.min.js"></script>
    	<!-- Script to Activate the Carousel -->
    	<script>
    	$('.carousel').carousel({
        interval: 5000 //changes the speed
    	})
    	</script>
    	<!-- Scrolling Nav JavaScript -->
    	<script src="js/jquery.easing.min.js"></script>
    	<script src="js/scrolling-nav.js"></script>
	</body>	
</html>