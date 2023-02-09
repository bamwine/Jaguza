  <?php   include 'emg_admin/config.php';


  ?>
  
  
    
   <?php 

 
if(isset($_POST['upda_data'])){ 
$dis_id=$_POST['Code'];

$fa_dis_code=$_POST['dis_code'];

$create = date("Y-m-d H:i:s");


$stmt = $db->runQuery("UPDATE users SET fa_dis = :fa_dis WHERE id = :dis_id");
$stmt->execute(array(":fa_dis" => $fa_dis_code,":dis_id" => $dis_id));
  
  }
  
  
  
  ?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Farmers registered! </strong>
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	 <div class="row no-print">
        <div class="col-xs-12">
      
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
                  <th>Farmers Name</th>
                  <th>Farmers Code</th>                 
                  <th>District Code</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				$s = $db->runQuery( "SELECT * FROM users ORDER BY full_name  ASC  " );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['full_name'];?></td>
                  <td><?php echo $row['fa_id'];?></td>                  
                  <td><?php echo $row['fa_dis'];?></td>
                  <td>
			   <a   class="btn btn-success pull-right" style="margin-right: 5px;" href="javascript:;"  onclick="$('#view_<?php echo $row['fa_id']; ?>').modal('show');"><i class="fa fa-eye"></i> View</a>
			   <a class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a  class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
		  		  
				</td>
				
				
				 <div id="view_<?php echo $row['fa_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
                <div class="modal-content">
                  
                 
	<div class="modal-body">
                    
              <div class="box-body">
                <div class="row">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
			 <?php  
				$farmerid = $row['fa_id'];				
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
			
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="emg_admin/views/profile_pic/<?php echo $userdata['picture'];?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $userdata['full_name']; ?></h3>
              <h5 class="widget-user-desc">District &nbsp;&nbsp;<?php echo $userdata['dis_name']; ?></h5>
			   <h5 class="widget-user-desc">Phone &nbsp;&nbsp;<?php echo $userdata['phone']; ?></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
			 
			  
                <li><a href="#">Reared Animals <span class="pull-right badge bg-blue"><?php echo $animdata['animids']; ?></span></a></li>
                <li><a href="#">Liters Produced <span class="pull-right badge bg-aqua"><?php echo $milkdata['totlitres'];?></span></a></li>
                <li><a href="#">Employees <span class="pull-right badge bg-green"><?php echo $userdata['empids']; ?></span></a></li>
               	
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        
	       
              </div>
             
          
        </div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  
				
				
				
				
				 <div id="edit_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title"> Farmer--Edit</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label >Names</label>                  
                    <input type="text" class="form-control" id="dis_code" name="dis_code" value="<?php echo $row['full_name'];?>"  required>
                  
                </div>
                <div class="form-group">
                  <label >Farm Owner  </label>

                    <input type="text" class="form-control" id="dis_name" value="<?php echo $row['fa_id'];?>" name="dis_name"   >
                  
                </div>
				
				
				 
				
				<div class="form-group">
                  <label>District</label>
                  <select class="form-control" name="dis_code">
                    <option value="<?php echo $row['fa_dis'];?>"><?php echo $row['fa_dis'];?></option>
                 <?php  
				 $stmt = $db->runQuery("SELECT * FROM district ");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				 While($dis_row = $stmt->fetch()):	
				 ?>
				<option value="<?php echo $dis_row['dis_code'];?>"><?php echo $dis_row['dis_name'];?></option>
				
				 <?php  Endwhile;?>
                  </select>
                </div>
				
               
	       <input type="hidden" class="form-control" id="Code" name="Code" value="<?php echo $row['id']; ?>"  >
	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" name="upda_data" class="btn btn-info pull-right">Update Information</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  </div>
				  
                </div>
                <!-- /.modal-content -->
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
  
 		$us_id = $_GET['did'];
		//$farmerid = $_GET['did'];
$stmt = $db->runQuery("DELETE FROM users WHERE id = :us_id ");
$stmt->execute(array(":us_id" => $us_id));
header("Location:admin.php?page=fb");

}
		?>
  
 
  
  <script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this  Farmer?");
	if(iAnswer){
		window.location = 'admin.php?page=fb&did='+Id;
	}
  }

</script>
 <?php 

$dis_rad_code='JF'.date('ymd').rand(10,100).'I'; 
 
if(isset($_POST['save_dis'])){ 

$fam_code=$_POST['dis_code'];
$fam_owner=$_POST['dis_name'];
$dater = date("Y-m-d H:i:s");
$stmt = $db->runQuery("insert into farms(fam_code,fam_owner,created)values(:fam_code,:fam_owner,:dater)");
$stmt->bindValue(":fam_code", $fam_code);
$stmt->bindValue(":fam_owner", $fam_owner);
$stmt->bindValue(":dater", $dater);
$stmt->execute();  
header("Location:admin.php?page=fb");
  }
  
  
  
  ?>

 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add New Farmer</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label >Farm Code</label>                  
                    <input type="text" class="form-control" id="dis_code" name="dis_code" value="<?php echo $dis_rad_code; ?>" readonly required>
                  
                </div>
                <div class="form-group">
                  <label >Farm Owner  </label>

                    <input type="text" class="form-control" id="dis_name" value="<?php echo $userRow['fa_id']; ?>" name="dis_name" readonly required >
                  
                </div>
               
	      
	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" name="save_dis" class="btn btn-info pull-right">Save Information</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  </div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  
  
  <!-- /.content-wrapper -->
  
  
 
