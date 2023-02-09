<?php    
 include 'emg_admin/config.php';
if (!isset($_SESSION['useradmin'])) {

    $db->redirect('index.php');

    }

$user_id = $_SESSION['useradmin']['id'];
$stmt = $db->runQuery("SELECT * FROM admin WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);



 //$views->load("append");
 
	
?>
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a  class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      	<img src="icons/jag2.png"  alt="User Image" >
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
		<img src="icons/jag1.png"  alt="User Image" style="float:left;padding-right:230px;" >
		
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="icons/katamba.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $userRow['full_name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="icons/katamba.png"  class="img-circle" alt="User Image">

                <p>
                  <?php echo $userRow['full_name']; ?>
                 
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
			  
			    <?php  
  $stmt = $db->runQuery("SELECT count(*) as total FROM farms");
$stmt->execute();
$totanim = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $db->runQuery("SELECT count(*) as total FROM users");
$stmt->execute();
$totobseve = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $db->runQuery("SELECT count(*) as total FROM district");
$stmt->execute();
$totmontr = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
			  
                <div class="row">
                  <div class="col-xs-4 text-center">
				  <p><?php echo $totanim['total']; ?></p>
                    <a href="#">Farms</a>
                  </div>
                  <div class="col-xs-4 text-center">
				  <p><?php echo $totobseve['total']; ?></p>
                    <a href="#">Farmers</a>
                  </div>
                  <div class="col-xs-4 text-center">
					<p><?php echo $totmontr['total']; ?></p>
                    <a href="#">Districts</a>
					 
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
		
      </div>
    </nav>
  </header>
  
 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="icons/katamba.png"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $userRow['full_name']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		  
		  
        </div>
		
		
		
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
       
        <li><a href="?page=db"><i class=""><img src="icons/Untitled-12.png" height="25px" width="25px" /></i> <span>Dashboard</span></a></li>
		 <li><a href="?page=an"><i class="fa fa-adjust"></i> <span>Manage District</span></a></li>
        <li><a href="?page=na"><i class="fa fa-adjust"></i> <span>Manage Farms</span></a></li>
		 <li><a href="?page=fb"><i class="fa fa-adjust"></i> <span>Manage Farmers</span></a></li>
		 <li><a href="?page=md"><i class="fa fa-adjust"></i> <span>Manage Disease</span></a></li>
		 <li><a href="?page=mr"><i class="fa fa-adjust"></i> <span>Manage Resources</span></a></li> 
		 <li><a href="?page=mv"><i class="fa fa-adjust"></i> <span>Manage Doctors</span></a></li> 
		
		 <li><a href="logout.php"><i class=""><img src="icons/Untitled-11.png" height="25px" width="25px" /></i> <span>Logout</span></a></li>
		 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
