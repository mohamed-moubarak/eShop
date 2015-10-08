      <!-- Navbar and Sidebar -->
          <?php
            include('navbar.php');
          ?>

              <!-- Sidebar -->
              <nav class="navbar navbar-default sidebar" id="sidebar-wrapper" role="navigation"> 
                <div class="container-fluid"> 
                  <div class="navbar-header"> 
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1"> 
                      <span class="sr-only">Toggle navigation</span> 
                      <span class="icon-bar"></span> 
                      <span class="icon-bar"></span> 
                      <span class="icon-bar"></span> 
                    </button> 
                  </div> 
                  <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1"> 
                    <ul class="nav navbar-nav"> 
                      <li class="active">
                        <a>Categories<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon"></span></a>
                      </li> 
                      <li class="dropdown"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clothes
                          <span class="caret"></span>
                          <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon"></span></a> 
                        <ul class="dropdown-menu forAnimate" role="menu"> 
                          <li><a href="men.php">Men</a></li> 
                          <li class="divider"></li> 
                          <li><a href="women.php">Women</a></li> 
                        </ul> 
                      </li> 
                      <li><a href="electronics.php">Electronics
                        <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon"></span></a></li> 
                      <li><a href="furniture.php">Furniture
                        <span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon"></span></a></li> 
                    </ul> 
                  </div> 
                </div> 
              </nav>
