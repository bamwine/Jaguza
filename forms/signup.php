
 <?php 
 include '../emg_admin/config.php';

$farmer_rad_code='F'.date('ymd').rand(10,100).'J'; 
if(isset($_POST['save_farm'])){ 

$full_name=$_POST['full_name'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$email=$_POST['email'];
$phone=$_POST['phone'];
$activated=1;
$created = date("Y-m-d H:i:s");
$fa_dis=$_POST['fa_dis'];
$fa_id=$_POST['fa_id'];



$stmt = $db->runQuery("INSERT INTO users (full_name, username, password, email, phone, activated,created,fa_dis,fa_id)
VALUES (:full_name,:username,:password,:email,:phone,:activated,:created,:fa_dis,:fa_id)");
$stmt->bindValue(":full_name", $full_name);
$stmt->bindValue(":username", $username);
$stmt->bindValue(":password", $password);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":phone", $phone);
$stmt->bindValue(":activated", $activated);
$stmt->bindValue(":created", $created);
$stmt->bindValue(":fa_dis", $fa_dis);
$stmt->bindValue(":fa_id", $fa_id);
$stmt->execute();  

  }
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Jaguza</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Cab Booking Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- css files -->
<link href="web2/css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="web2/css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
<link rel="stylesheet" href="web2/css/jquery-ui.css" />
<!-- //css files -->

<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Amaranth:400,400i,700,700i" rel="stylesheet">
<!--//online-fonts -->
</head>
<body>
<div class="header">
	<h1>Create Account</h1>
</div>

<div class="w3-main">
	<!-- Main -->
	<div class="about-bottom">
		<div class="w3l_about_bottom_right two">
			<h2 class="tittle"><img src="web2/images/cab.png" alt=""><span>Account Details </span></h2>
			<div class="book-form">

			    <form action="#" method="post">
					<div class="form-date-w3-agileits">
						<div class="form-agileits">
							<label> YOUR ID :</label>
						</div>
						<div class="form-agileits-2">
							<input type="text" class="form-control" name="fa_id" readonly  value="<?php echo $farmer_rad_code; ?>"required>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="form-date-w3-agileits second-agile">
						<div class="form-agileits">
							<label> Full Names :</label>
						</div>
						<div class="form-agileits-2">
							<input type="text" class="form-control" name="full_name" placeholder="Full Names" required autofocus>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="form-date-w3-agileits">
						<div class="form-agileits">
							<label> Phone:</label>
						</div>
						<div class="form-agileits-2">
							  <input type="text" class="form-control" name="phone" placeholder="Phone" required autofocus>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="form-date-w3-agileits">
						<div class="form-agileits">
							<label> Email:</label>
						</div>
						<div class="form-agileits-2">
							 <input type="email" class="form-control" name="email" placeholder="Email Address" required>
						</div>
						<div class="clear"> </div>
					</div>
					<div class="form-date-w3-agileits">
						<div class="form-agileits">
							<label>Username:</label>
						</div>
						<div class="form-agileits-2">
							 <input type="text" class="form-control" name="username" placeholder="UserName" required autofocus >
						</div>	
						<div class="clear"> </div>						
					</div>
					<div class="form-date-w3-agileits">
						<div class="form-agileits">
							<label>Password:</label>
						</div>
						<div class="form-agileits-2">
							 <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
						</div>
						<div class="clear"> </div>
					</div>
					
					<div class="form-date-w3-agileits">
						<div class="form-agileits">
							<label>District:</label>
						</div>
						<div class="form-agileits-2">
							<select  name="fa_dis">
                                        <option value="">-- Please select --</option>
                                      <?php  
				$s = $db->runQuery( "SELECT * FROM district ORDER BY id DESC " );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                                        <option value="<?php echo $row['dis_code'];?>"><?php echo $row['dis_name'];?></option>
                                     <?php  Endwhile;?>	   
                                    </select>
						</div>
						<div class="clear"> </div>
					</div>
					
					<div class="make">
						  <input type="submit" name="save_farm" value="Create">
					</div>
				</form>
				<div class="m-t-25 m-b--5 align-center">
                        <a href="signin.php">You already have a membership?</a>
                    </div>
				
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>
<!-- //Main -->

<!-- footer -->
<div class="footer-w3l">
	<p>© Evolution Media Group</p>
</div>
<!-- //footer -->

	<!-- js-scripts-->
		<script type="text/javascript" src="web2/js/jquery-2.1.4.min.js"></script>
		
		<!-- Time -->
		<script type="text/javascript" src="web2/js/wickedpicker.js"></script>
			<script type="text/javascript">
				$('.timepicker').wickedpicker({twentyFour: false});
			</script>
		<!-- //Time -->
		
			<!-- Calendar -->
				<script src="web2/js/jquery-ui.js"></script>
				  <script>
						  $(function() {
							$( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
						  });
				  </script>
			<!-- //Calendar -->
	<!-- //js-scripts-->
	
</body>
</html>