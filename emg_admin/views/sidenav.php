<?php    
 include 'emg_admin/config.php';
if (!isset($_SESSION['userfarm'])) {

    $db->redirect('index.php');

    }

$user_id =  $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
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
		<img src="icons/jag1.png"  alt="User Image" height="80px"  style="float:left;padding-right:400px;" >
		
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
              <img src="emg_admin/views/profile_pic/<?php echo $userRow['picture'];?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $userRow['full_name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="emg_admin/views/profile_pic/<?php echo $userRow['picture']; ?>"  class="img-circle" alt="User Image">

                <p>
                  <?php echo $userRow['full_name']; ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a data-toggle="modal" data-target="#profiles" class="btn btn-default btn-flat">Profile</a>
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
          <img src="emg_admin/views/profile_pic/<?php echo $userRow['picture']; ?>"  class="img-circle" alt="User Image">
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
       
        <!-- Optionally, you can add icons to the links -->
       
		<li><a href="?page=db"><i class=""><img src="icons/Untitled-12.png" height="25px" width="25px" /></i> <span>Dashboard</span></a></li>
		 <li><a href="?page=an"><i class=""><img src="icons/Untitled-1.png" height="25px" width="25px" /></i> <span>Animals</span></a></li>
        <li><a href="?page=na"><i class=""><img src="icons/Untitled-3.png" height="25px" width="25px" /></i> <span>Need Attention</span></a></li>
		 <li><a href="?page=fb"><i class=""><img src="icons/Untitled-4.png" height="25px" width="25px" /></i> <span>FeedBack</span></a></li>
		 <li><a href="?page=uo"><i class=""><img src="icons/Untitled-5.png" height="25px" width="25px" /></i> <span>Under Observation</span></a></li>
		 <li><a href="?page=dc"><i class=""><img src="icons/Untitled-6.png" height="25px" width="25px" /></i> <span>Disease Center</span></a></li>
		 <li><a href="?page=rc"><i class=""><img src="icons/Untitled-7.png" height="25px" width="25px" /></i> <span>Resource Center</span></a></li>
		 <li><a href="?page=em"><i class=""><img src="icons/Untitled-8.png" height="25px" width="25px" /></i> <span>Employees</span></a></li>
		 <li class="treeview">
          <a href="#">
            <i class=""><img src="icons/Untitled-9.png" height="25px" width="25px" /></i>
            <span>Animal Feeds</span>            
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=af"><i class=" fa fa-plus-circle"></i> Feed Records</a></li>
            <li><a href="?page=afr"><i class="fa fa-bars"></i> Report</a></li>
            
          </ul>
        </li>
		
		
		<li class="treeview">
          <a href="#">
            <i class=""><img src="icons/Untitled-10.png" height="25px" width="25px" /></i>
            <span>Milk Production</span>            
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=mp"><i class=" fa fa-plus-circle"></i> Production</a></li>
			 <!--li><a href="?page=mpg"><i class=" fa fa-plus-circle"></i>Graph</a></li-->
            <li><a href="?page=mpr"><i class="fa fa-bars"></i> Report</a></li>
            
          </ul>
        </li>
		
		
		  
		 <li><a href="logout.php"><i class=""><img src="icons/Untitled-11.png" height="25px" width="25px" /></i> <span>Logout</span></a></li>
		 
		 
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  
  
  <?php 
						$farmerid = $userRow['fa_id'];				
$stmt = $db->runQuery("Select  Count(employee.id) As empids, users.full_name,  users.email,users.picture,
  users.phone,  users.fa_id,  district.dis_name From   users Inner Join
  district  On users.fa_dis = district.dis_code Inner Join
  employee   On employee.farm_id = users.fa_id Where  users.fa_id = :user_id Group By   users.fa_id");
$stmt->execute(array(":user_id" => $farmerid));
$userdata = $stmt->fetch(PDO::FETCH_ASSOC);	

$stmt = $db->runQuery("Select   users.fa_id,  Count(animal.id) As animids 
From  users Inner Join   animal   On animal.famer_id = users.fa_id
Where  users.fa_id = :user_id Group By   users.fa_id");
$stmt->execute(array(":user_id" => $farmerid));
$animdata = $stmt->fetch(PDO::FETCH_ASSOC);	

$stmt = $db->runQuery("Select  users.fa_id, Sum(milk.litres) As totlitres
From   users Inner Join   milk  On milk.famer_id = users.fa_id
Where  users.fa_id = :user_id Group By  users.fa_id");
$stmt->execute(array(":user_id" => $farmerid));
$milkdata = $stmt->fetch(PDO::FETCH_ASSOC);	
 ?>
   
 <div id="profiles" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                  <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profile </a></li>
              <li><a href="#timeline" data-toggle="tab">About Me</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Profile Image -->
				
						
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="emg_admin/views/profile_pic/<?php echo $userdata['picture']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $userdata['full_name']; ?></h3>

              <!--p class="text-muted text-center">Software Engineer</p-->

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Animals</b> <a class="pull-right"><?php echo $animdata['animids']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Liters Produced</b> <a class="pull-right"><?php echo $milkdata['totlitres'];?></a>
                </li>
                
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                 <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Contact</strong>

              <p class="text-muted">
                <?php echo $userdata['phone']; ?>
              </p>
			<p class="text-muted">
                <?php echo $userdata['email']; ?>
              </p>
              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?php echo $userdata['dis_name']; ?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>No Employees</strong>

              <p>
			  
                <span class="label label-danger"><?php echo $userdata['empids']; ?></span>
               <!-- <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span> -->
              </p>

              <hr>

              <!--  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="full_names" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail" name="phones" placeholder="Phone Number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label" >Photo</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" id="inputName">
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
				   <input type="hidden" value="<?php echo $userRow['fa_id']; ?>" name="code">
				 
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="update_profile" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        
              </div>
     </div>
  
    <?php 
 $target_dir = "profile_pic/";


if(isset($_POST['update_profile'])&& isset($_FILES['image'])){
 
$famer_ids=$_POST['code'];
$full_names=$_POST['full_names'];
$phones=$_POST['phones'];

      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"emg_admin/views/profile_pic/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   

$stmt = $db->runQuery("UPDATE users SET full_name = :full_names,phone =:phones,picture=:photo WHERE fa_id = :famer_ids");
$stmt->execute(array(":phones" => $phones,":famer_ids" => $famer_ids,":full_names" => $full_names,":photo" => $file_name));
  
  }
  
 
  ?> 
