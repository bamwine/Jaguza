<?php

session_start();
 include 'emg_admin/config.php';  ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $db->get_title(); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
 <link rel="stylesheet" href="dist/css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php    

if (!$db->is_logged() != "") {

    $db->redirect('index.php');

    }

$user_id = $_SESSION['user_session'];
$stmt = $db->runQuery("SELECT * FROM emg_meta WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $db->runQuery("SELECT count(*) as total FROM animal");
$stmt->execute();
$totanim = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $db->runQuery("SELECT count(*) as total FROM observation");
$stmt->execute();
$totobseve = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $db->runQuery("SELECT count(*) as total FROM monitor");
$stmt->execute();
$totmontr = $stmt->fetch(PDO::FETCH_ASSOC);

 //$views->load("append");
 
	
?>
<body class="hold-transition skin-green sidebar-mini">
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
		<img src="icons/jag1.png"  alt="User Image" style="float:left;padding-right:350px;" >
		
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
              <span class="hidden-xs"><?php echo $userRow['admin_uname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="icons/katamba.png"  class="img-circle" alt="User Image">

                <p>
                  <?php echo $userRow['admin_fname']; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
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
          <p> <?php echo $userRow['admin_fname']; ?></p>
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
       
        <li><a href="#"><i class=""><img src="icons/Untitled-12.png" height="25px" width="25px" /></i> <span>Dashboard</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-1.png" height="25px" width="25px" /></i> <span>Animals</span></a></li>
        <li><a href="#"><i class=""><img src="icons/Untitled-3.png" height="25px" width="25px" /></i> <span>Need Attention</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-4.png" height="25px" width="25px" /></i> <span>FeedBack</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-5.png" height="25px" width="25px" /></i> <span>Under Observation</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-6.png" height="25px" width="25px" /></i> <span>Disease Center</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-7.png" height="25px" width="25px" /></i> <span>Resource Center</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-8.png" height="25px" width="25px" /></i> <span>Employees</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-9.png" height="25px" width="25px" /></i> <span>Animal Feeds</span></a></li>
		 <li><a href="#"><i class=""><img src="icons/Untitled-10.png" height="25px" width="25px" /></i> <span>Milk Production</span></a></li>
		 <li><a href="logout.php"><i class=""><img src="icons/Untitled-11.png" height="25px" width="25px" /></i> <span>Logout</span></a></li>
		 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-green">Need Attention </a>
            <div class="inner">
              <h3 align="center">&nbsp;<?php echo $totmontr['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
           
            <a href="#" class="small-box-footer">View Real Time Graphs <img src="icons/send.png"/></a>
          </div>
        </div>
		
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-yellow">Under Observation </a>
            <div class="inner">
               <h3 align="center">&nbsp;<?php echo $totobseve['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
            
            <a href="#" class="small-box-footer ">View Real Time Graphs <i class="fa fa-arrow-circle-right " ></i></a>
          </div>
        </div>
		
		
		
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-aqua">Total Animals </a>
            <div class="inner">
               <h3 align="center">&nbsp;<?php echo $totanim['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
            
            <a href="#" class="small-box-footer">View Real Time Graphs <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		
	</div>
	
	
		<div class="row">
        <div class="col-lg-12 col-xs-6 ">
          <!-- small box -->
          <div class="small-box ">

            <div class="">
              <h3></h3>

              <p><?php $db->get_post('post_content', 'jaguza_dash', 200, 0); ?> </p>
            </div>
            
            <a href="#" class="small-box-footer">View more <img src="icons/send.png"/></a>
          </div>
        </div>
	</div>
	
	  <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class=""><img src="icons/Untitled-3.png" height="20px;" width="20px;" /></i>

              <h3 class="box-title">Top Five animals Needing Attention</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
               
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
			  
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
            <table class="table" >
				<tr>
                  <td>Tag id</td>                  
                  <td >Date time</td>
				</tr>
				
				<?php  //if you are outside the db class, for example you are in the index page
					$s = $db->runQuery( "SELECT * FROM observation LIMIT 5" );
					$s->execute();
					$s->setFetchMode(PDO::FETCH_ASSOC);
					While($rows = $s->fetch()):	?>			
					
				<tr>
		
 
                  <td width="200"><?php  Echo $rows['tag_id']; ?></td>                  
                  <td width="151"><?php echo date('M j Y g:i A', strtotime($rows['added'])) ?></td> 
				
				  
				</tr>
				<?php   
				  Endwhile;
				?>
				
			</table>
				   
                  </div>
               

                 
                 
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
	
	
			<div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class=""><img src="icons/Untitled-3.png" height="20px;" width="20px;" /></i>

              <h3 class="box-title">Top Five animals Under Observation</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
               
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
			  
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  
                 

                  <div class="clearfix">
                    <table class="table" >
				<tr>
                  <td>Tag id</td>                  
                  <td >Date time</td>
				</tr>
				
				<?php  //if you are outside the db class, for example you are in the index page
					$s = $db->runQuery( "SELECT * FROM observation LIMIT 5" );
					$s->execute();
					$s->setFetchMode(PDO::FETCH_ASSOC);
					While($rows = $s->fetch()):	?>			
					
				<tr>
		
 
                  <td width="200"><?php  Echo $rows['tag_id']; ?></td>                  
                  <td width="151"><?php echo date('M j Y g:i A', strtotime($rows['added'])) ?></td> 
				
				  
				</tr>
				<?php   
				  Endwhile;
				?>
				
			</table>
                  </div>
                 
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
	
	     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border bg-green-gradient">
			 <i class=""><img src="icons/time.png" height="20px;" width="20px;" /></i>
              <h3 class="box-title">Real Time Charting</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong></strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height:250px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
               
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->

<script src="dist/js/app.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script src="dist/js/bamwine.js"></script>

<script type="text/javascript">



</script>
</body>
</html>
