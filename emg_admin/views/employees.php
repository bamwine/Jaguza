  <?php   include 'emg_admin/config.php';

  $user_id = $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  
  
  
  
 <?php 

$dis_rad_code='JF'.date('ymd').rand(10,100).'I'; 
 
if(isset($_POST['upda_emlp'])){ 

$farmerid = $userRow['fa_id'];
$flname=$_POST['flname'];
$addres=$_POST['addres'];
$telp=$_POST['telp'];
$email=$_POST['email'];
$emp_id=$_POST['emp_id'];

$startdate=$_POST['statdates'];
$typeowk=$_POST['type_work'];
$salary=$_POST['Salary'];

$dates = date("Y-m-d H:i:s");

$stmt = $db->runQuery("UPDATE employee SET 
full_name = :flname,
address = :addres,
telephone = :telp,
startdate =:startdate,salary =:salary,typeowk=:typeowk,
email = :email WHERE farm_id = :farmerid and id =:emp_id");
$stmt->execute(array(":flname" => $flname,":farmerid" => $farmerid ,":telp" => $telp,":email" => $email,":emp_id" => $emp_id,":addres" => $addres ,":startdate" => $startdate ,":salary" => $salary ,":typeowk" => $typeowk));
  
  
  }
  
  
  
  ?>
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Your Employees  registered </strong>
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
                  <th>Full Names</th>
                  <th>Adderess</th>
                  <th>Telephone</th>
                  <th>Email</th>
                  <th>Started Work</th>
				   <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				$farmerid = $userRow['fa_id'];
				$s = $db->runQuery( "SELECT * FROM employee where farm_id = :farmerid" );
				$s->execute([":farmerid"=>$farmerid]);
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['full_name'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['telephone'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['startdate'];?></td>
				  <td>
				  
			   <a   class="btn btn-success pull-right" style="margin-right: 5px;" href="javascript:;"   onclick="$('#nurse_view_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-eye"></i> View</a>
			   <a   class="btn btn-primary pull-right" style="margin-right: 5px;" href="javascript:;"  onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');" ><i class="fa fa-pencil" ></i> Edit</a>
			   <a   class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
				

	  	
		<div id="nurse_view_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Employee Details</h3>
                  </div>
                 
				  <div class="modal-body">
                    <h3 style="text-decoration:underline;">detail information</h3>
                    <div class="row">
                      <div class="col-xs-6"> 
						<b>Full Names</b> <?php echo $row['full_name']; ?><br/>
                        <b>Address</b> <?php echo $row['address'];?><br/>
						<b>Telephone</b> <?php  echo $row['telephone'];?><br/>
                        <b>Email</b> <?php echo $row['email']; ?><br/>
						<b>Type of Work</b> <?php echo $row['typeowk']; ?><br>
						<b>Salary</b> <?php echo $row['salary']; ?><br>
						<b> Started Work</b> <?php echo $row['startdate']; ?><br/>
                      </div>
                      
                     
                      
                    </div>
                  </div>
				  
                </div>
               
              </div>
            </div>

				
				  
				    
  <div id="edit_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Employees  - Add</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label >Full Name*</label>

                 
                    <input type="text" class="form-control" id="flname" name="flname" value="<?php echo $row['full_name'];?>" placeholder="">
                
                </div>
                <div class="form-group">
                  <label >Address*</label>                  
                    <input type="text" class="form-control" id="addres" name="addres"  value="<?php echo $row['address'];?>" placeholder="">
                 
                </div>
               
	       <div class="form-group">
                  <label >Telephone*</label>

                    <input type="text" class="form-control" id="telp" name="telp"  value="<?php echo $row['telephone'];?>" placeholder="">
                 
                </div>
		
			<div class="form-group">
                  <label >Email</label>

                  
                    <input type="email" class="form-control" id="email" name="email"  value="<?php echo $row['email'];?>" placeholder="">
                  
                </div>
				
			<div class="form-group">
                  <label >Started Working</label>

                    <input type="text" class="form-control" id="statdates" name="statdates" value="<?php echo $row['startdate'];?>">
                 
                </div>	
				
				
				<div class="form-group">
                  <label >Type of Work</label>

                    <input type="text" class="form-control" id="type_work" name="type_work" value="<?php echo $row['typeowk'];?>">
                 
                </div>	
				
				<div class="form-group">
                  <label >Salary</label>

                    <input type="text" class="form-control" id="Salary" name="Salary" value="<?php echo $row['salary'];?>">
                 
                </div>	
	       
		   	<input type="hidden" class="form-control" id="Code" name="Code"  value="<?php echo $userRow['fa_id']; ?>"  >
			<input type="hidden" class="form-control" id="Code" name="emp_id"  value="<?php echo $userRow['id']; ?>"  >
		   
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="upda_emlp">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  </div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
				  
				  
				  
				  </td>
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
 
  <?php  if(isset($_GET['did'])){  
  
 		$user_id = $_GET['did'];
	$user =$userRow['fa_id'];		
$stmt = $db->runQuery("DELETE FROM employee WHERE id = :anim_id AND farm_id = :famer_id");
$stmt->execute(array(":anim_id" => $user_id, ":famer_id" => $user));
header("Location: home.php?page=em");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this  Animal?");
	if(iAnswer){		

        window.location = "home.php?page=em&did="+Id;
		
	} 
  }
  

</script> 


 <?php 

$dis_rad_code='JF'.date('ymd').rand(10,100).'I'; 
 
if(isset($_POST['save_emlp'])){ 

$farmerid = $userRow['fa_id'];
$flname=$_POST['flname'];
$addres=$_POST['addres'];
$telp=$_POST['telp'];
$email=$_POST['email'];
$startdate=$_POST['statdates'];
$typeowk=$_POST['type_work'];
$salary=$_POST['Salary'];


$dates = date("Y-m-d H:i:s");
$stmt = $db->runQuery("insert into employee(full_name,address,telephone,email,farm_id,date_added,startdate,salary,typeowk)values(:flname,:addres,:telp,:email,:farmerid,:dates,:startdate,:salary,:typeowk)");
$stmt->bindValue(":flname", $flname);
$stmt->bindValue(":farmerid", $farmerid);
$stmt->bindValue(":dates", $dates);
$stmt->bindValue(":telp", $telp);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":addres", $addres);
$stmt->bindValue(":startdate", $startdate);
$stmt->bindValue(":typeowk", $typeowk);
$stmt->bindValue(":salary", $salary);
$stmt->execute();
header("Location: home.php?page=em");
  }
  
  
  
  ?>

  
  <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Employees  - Add</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label >Full Name*</label>

                 
                    <input type="text" class="form-control" id="flname" name="flname" placeholder="">
                
                </div>
                <div class="form-group">
                  <label >Address*</label>                  
                    <input type="text" class="form-control" id="addres" name="addres" placeholder="">
                 
                </div>
               
	       <div class="form-group">
                  <label >Telephone*</label>

                    <input type="text" class="form-control" id="telp" name="telp" placeholder="">
                 
                </div>
		
			<div class="form-group">
                  <label >Email</label>

                  
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                  
                </div>
				
			<div class="form-group">
                  <label >Started Working</label>

                    <input type="text" class="form-control" id="statdates" name="statdates" placeholder="">
                 
                </div>	
				
				
				<div class="form-group">
                  <label >Type of Work</label>

                    <input type="text" class="form-control" id="type_work" name="type_work" placeholder="">
                 
                </div>	
				
				<div class="form-group">
                  <label >Salary</label>

                    <input type="text" class="form-control" id="Salary" name="Salary" placeholder="">
                 
                </div>	
	       
		   	<input type="hidden" class="form-control" id="Code" name="Code" value="<?php echo $userRow['fa_id']; ?>"  >
		   
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="save_emlp">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  </div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  <!-- /.content-wrapper -->
