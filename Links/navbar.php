	    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="../index.php"><span class="glyphicon glyphicon-shopping-cart"></span>eShop</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="products.php">Products</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../index.php#contact">Contact</a>
                    </li>
                </ul>
                                  <?php 
                  
                  if( !isset( $_SESSION['email'] ) )
                    {
                    echo '<button type="button" style="float:right;" class="btn btn-default navbar-btn btn-primary" onclick="location.href=\'register.php\';">Sign up</button>
                          <button type="button" style="float:right;" class="btn btn-default navbar-btn" onclick="location.href=\'login.php\';">Sign in</button>';
                  }else{
                    echo '<div class="dropdown" style="float:right;">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="profile.php">My Profile</a></li>
                    <li><a href="view_cart.php">My Cart</a></li>
                    <li><a href="history.php">History</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="change_pass.php">Change Your Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
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