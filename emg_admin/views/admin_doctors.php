  <?php   include 'emg_admin/config.php';
  
  ?>
  
  
    
   <?php 

 
if(isset($_POST['up_data'])){ 
$ids=$_POST['Code'];
$full_name=$_POST['full_name'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$proffesion=$_POST['proffesion'];
$District=$_POST['District'];


$stmt = $db->runQuery("UPDATE veternary SET 
full_name = :full_name, 
username = :username, 
password = :password, 
email = :email, 
phone = :phone, 
District = :District, 
proffesion = :proffesion
WHERE vet_id = :ids");
$stmt->execute(array(":full_name" => $full_name,":ids" => $ids,":proffesion" => $proffesion,":phone" => $phone,":email" => $email,":password" => $password,":username" => $username,"District"=>$District));
  
  }
  
  
  
  ?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Doctors registered! </strong>
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	  <div class="row no-print">
        <div class="col-xs-12">
          <a  data-toggle="modal" data-target="#add" target="_blank" class="btn btn-success pull-left"><i class="fa fa-plus"></i> ADD</a>
       
        </div>
      </div>
	   <br/>
		 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>Email</th>                 
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				$s = $db->runQuery( "SELECT * FROM veternary ORDER BY full_name  ASC  " );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['full_name'];?></td>
                  <td><?php echo $row['email'];?></td>                  
                  <td><?php echo $row['phone'];?></td>
                  <td>
			   <a   class="btn btn-success pull-right" style="margin-right: 5px;" href="javascript:;"  onclick="$('#nurse_view_<?php echo $row['vet_id']; ?>').modal('show');"><i class="fa fa-eye"></i> View</a>
			   <a class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['vet_id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a  class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['vet_id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
		  		  
				</td>
				
				 <div id="edit_<?php echo $row['vet_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title"> Vet Doctor Edit</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label >Full Names</label>                  
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $row['full_name']; ?>"  required>
                  
                </div>
                <div class="form-group">
                  <label >Proffesion </label>

                    <input type="text" class="form-control" id="proffesion"  name="proffesion" value="<?php echo $row['proffesion']; ?>"  required >
                  
                </div>
				
				<div class="form-group">
                  <label >Username </label>

                    <input type="text" class="form-control" id="username"  name="username"  value="<?php echo $row['username']; ?>"  required >
                  
                </div>
				
				<div class="form-group">
                  <label >password </label>

                    <input type="password" class="form-control" id="password" name="password"  value="<?php echo $row['password']; ?>"  required >
                  
                </div>
				
               <div class="form-group">
                  <label >Email </label>

                    <input type="email" class="form-control" id="email"  name="email"     value="<?php echo $row['email']; ?>"  >
                  
                </div>
				
				<div class="form-group">
                  <label >Phone </label>

                    <input type="text" class="form-control" id="phone"  name="phone"    value="<?php echo $row['phone']; ?>" >
                  
                </div>
				
				<div class="form-group">
                  <label >District </label>

                    <input type="text" class="form-control" id="District"  name="District"   value="<?php echo $row['District']; ?>" >
                  
                </div>
	       <input type="hidden" class="form-control" id="Code"  name="Code"   value="<?php echo $row['vet_id']; ?>" >
                  
	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" name="up_data" class="btn btn-info pull-right">Update Information</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
					  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  
  
  
  
  <div id="nurse_view_<?php echo $row['vet_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Doctor Details</h3>
                  </div>
                 
				  <div class="modal-body">
                   
                    <div class="row">
						<div class="col-xs-6"> 
							<p><b>Full Names </b><span>&nbsp;<?php echo $row['full_name']; ?> </span></p> 
							<p><b>Proffesion</b><span>&nbsp;<?php echo $row['proffesion'];?> </span></p> 
							<p><b>Telephone</b><span>&nbsp;<?php echo $row['phone'];?> </span></p> 
							<p><b>Email</b><span>&nbsp;<?php echo $row['email'];?> </span></p> 	
							<p><b>District</b><span>&nbsp;<?php echo $row['District'];?> </span></p> 
							<p><b>Date Registerd</b><span>&nbsp;<?php echo $row['date_added'];?> </span></p>
							
						
						</div>
                      
                     


                      
                    </div>
                  </div>
				  
                </div>
               
              </div>
            </div>
  
  
                </tr>
		
	
			
		
		
			
			  <?php  Endwhile;?>	
				
				</tbody>
				</table>
				</div>
				</div>
				</div>
				</div>
	
    </section>
    <!-- /.content -->
  </div>
  
  
   <?php   if(isset($_GET['did'])){  
  
 		$user_id = $_GET['did'];
		
$stmt = $db->runQuery("DELETE FROM veternary WHERE vet_id = :dis_id ");
$stmt->execute(array(":dis_id" => $user_id));
header("Location:admin.php?page=mv");

}
		?> 
  
  
  
  <script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this ?");
	if(iAnswer){
		window.location = 'admin.php?page=mv&did='+Id;
	}
  }

</script>
 <?php 


 
if(isset($_POST['save_data'])){ 

$full_name=$_POST['full_name'];
$username=$_POST['username'];
$password= md5($_POST['password']);
$email=$_POST['email'];
$phone=$_POST['phone'];
$District=$_POST['District'];

$proffesion=$_POST['proffesion'];
$date_added = date("Y-m-d H:i:s");

$stmt = $db->runQuery("INSERT INTO veternary (full_name, username, password, email, phone, proffesion, date_added,District) 
values(:full_name,:username,:password,:email,:phone,:proffesion,:date_added,:District)");

$stmt->bindValue(":full_name", $full_name);
$stmt->bindValue(":username", $username);

$stmt->bindValue(":password", $password);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":phone", $phone);

$stmt->bindValue(":proffesion", $proffesion);
$stmt->bindValue(":date_added", $date_added);
$stmt->bindValue(":District", $District);
$stmt->execute();  
header("Location:admin.php?page=mv");
  }
  
  
  
  ?>

 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add New Doctor</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label >Full Names</label>                  
                    <input type="text" class="form-control" id="full_name" name="full_name"  required>
                  
                </div>
                <div class="form-group">
                  <label >Proffesion </label>

                    <input type="text" class="form-control" id="proffesion"  name="proffesion"  required >
                  
                </div>
				
				<div class="form-group">
                  <label >Username </label>

                    <input type="text" class="form-control" id="username"  name="username"  required >
                  
                </div>
				
				<div class="form-group">
                  <label >password </label>

                    <input type="password" class="form-control" id="password" name="password"  required >
                  
                </div>
				
               <div class="form-group">
                  <label >Email </label>

                    <input type="email" class="form-control" id="email"  name="email"  required >
                  
                </div>
				
				<div class="form-group">
                  <label >Phone </label>

                    <input type="text" class="form-control" id="phone"  name="phone"  required >
                  
                </div>
				
				<div class="form-group">
                  <label >District </label>

                    <input type="text" class="form-control" id="District"  name="District"  required >
                  
                </div>
	      
	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" name="save_data" class="btn btn-info pull-right">Save Information</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  
  
  <!-- /.content-wrapper -->
  
  
 
