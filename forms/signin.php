


<?php 
 include '../emg_admin/config.php';
 
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'jakuzaug_monitor');

$link = mysql_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD) or die(mysql_error());mysql_select_db(DB_DATABASE, $link) or die(mysql_error());
 
 if(isset($_POST['username']) && $_POST['username'] != '' && isset($_POST['password']) && $_POST['password'] != ''){
 
 $username=  $_POST["username"];
$cpassword=  md5($_POST["password"]);

		  
	$admins = mysql_query("SELECT * FROM admin where username='$username' and password='$cpassword'");
	//$admins = $db->runQuery( "SELECT * FROM admin where username= :username and password= :password" );
	//$admins->execute([":username"=>$username, ":password"=>$cpassword]);
	//$admin_row = $admins->fetchAll();
	
	
	$admin_row=mysql_fetch_array($admins);
 
	 $vets = mysql_query("SELECT * FROM veternary where username='$username' and password='$cpassword'");
	 $vets_rows=mysql_fetch_array($vets); 
	 
	$farm = mysql_query("SELECT * FROM users where username='$username' and password='$cpassword'");
	 $farm_rows=mysql_fetch_array($farm); 
	 
		
	 if($admin_row){
	  session_start();
	$_SESSION['useradmin'] = $admin_row;

header ("location:../admin.php");
	}
	else if($vets_rows){
	session_start(); 
  $_SESSION['uservet'] = $vets_rows;
 header ("location:../vet_doc.php");

	}
	
	
	else if($farm_rows){
	session_start(); 
  $_SESSION['userfarm'] = $farm_rows;
 header ("location: ../home.php");

	}
	else {
	 echo'<script>alert("Username or Password is Wrong")</script>';
		  echo "<script>window.open('','_self')</script>"; 
		}
 
 }
 
 ?>




<!DOCTYPE HTML>
<html>
<head>
<title>Jaguza</title>
<!-- Custom Theme files -->
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content=" Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!-- font-awesome icons -->
<link href="web/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--Google Fonts-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<script src="web/js/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="wthree-dot">
	<h1> Signup Form</h1>
	<div class="profile">
		<div class="wrap">
			<div class="wthree-grids">
				<div class="content-left">
					<div class="content-info">
						<h2>WELCOME</h2>
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides callbacks callbacks1" id="slider4">
									<li>
										<div class="w3layouts-banner-info">
											<h3>JAGUZA</h3>
											<p> Mobile Cattle monitoring sensor Disease detection and live Stock real time system</p>
										</div>
									</li>
									<li>
										<div class="w3layouts-banner-info">
											<h3>Mobile Cattle</h3>
											<p><img src="log.png"/></p>
										</div>
									</li>
								</ul>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="agileinfo-follow">
							<h4>Sign Up with</h4>
						</div>
						<div class="agileinfo-social-grids">
							<ul>
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-rss"></i></a>
								<a href="#"><i class="fa fa-vk"></i></a>
								<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
							</ul>
						</div>
						<div class="agile-signin">
							<h4>Dont  have an account <a href="signup.php">Sign Up</a></h4>
						</div>
					</div>
				</div>
				<div class="content-main">
					<div class="w3ls-subscribe">
						<h4></h4>
						<form action="#" method="post">
							<input type="text" name="username" placeholder="User Name" required>							
							<input type="password" name="password" placeholder="Password" required>
							
							<input type="submit" value="Sign In">
						</form>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="wthree_footer_copy">
				<p>© Evolution Media Group <a href=""></a></p>
			</div>
		</div>
	</div>
</div>
<script src="web/js/responsiveslides.min.js"></script>
									<script>
										// You can also use "$(window).load(function() {"
										$(function () {
										  // Slideshow 4
										  $("#slider4").responsiveSlides({
											auto: true,
											pager:true,
											nav:false,
											speed: 400,
											namespace: "callbacks",
											before: function () {
											  $('.events').append("<li>before event fired.</li>");
											},
											after: function () {
											  $('.events').append("<li>after event fired.</li>");
											}
										  });
									
										});
									 </script>
									<!--banner Slider starts Here-->
</body>
</html>