  <?php   include 'emg_admin/config.php';
  
  ?>
  
  
   <?php 

 
if(isset($_POST['upda_data'])){ 

$dis_name=$_POST['dis_name'];
$Code=$_POST['Code'];
$create = date("Y-m-d H:i:s");


$stmt = $db->runQuery("UPDATE district SET dis_name = :dis_name WHERE id = :dis_id");
$stmt->execute(array(":dis_name" => $dis_name,":dis_id" => $Code));
  
  }
  
  
  
  ?>
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Districts registered!</strong>
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
                  <th>District Name</th>
                  <th>District Code</th>                 
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				$s = $db->runQuery( "SELECT * FROM district ORDER BY id DESC " );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['dis_name'];?></td>
                  <td><?php echo $row['dis_code'];?></td>                  
                  <td><?php echo $row['created'];?></td>
                  <td>
			   
			   <a   class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a   class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
		  
		  
		  	<div id="edit_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title"> Districts Edit</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label >District Code</label>                  
                    <input type="text" class="form-control" id="dis_code" name="dis_code" value="<?php echo $row['dis_code'];?>" readonly required>
                  
                </div>
                <div class="form-group">
                  <label >District Name</label>

                    <input type="text" class="form-control" id="dis_name" name="dis_name"  value="<?php echo $row['dis_name'];?>" required >
                  
                </div>
               
	      <input type="hidden" class="form-control" id="Code" name="Code" value="<?php echo $row['id']; ?>"  >

	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" name="upda_data" class="btn btn-info pull-right">Update</button>
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
 
  <?php   if(isset($_GET['did'])){  
  
 		$user_id = $_GET['did'];
	$user =$userRow['fa_id'];		
$stmt = $db->runQuery("DELETE FROM district WHERE id = :anim_id ");
$stmt->execute(array(":anim_id" => $user_id));
header("Location:admin.php?page=an");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this  Animal?");
	if(iAnswer){		

        window.location = "admin.php?page=an&did="+Id;
		
	} 
  }
  

</script>
 
 
 
 
 <?php 

$dis_rad_code='DIS'.rand(10,100).date('ymd').'J';  
if(isset($_POST['save_dis'])){ 

$dis_code=$_POST['dis_code'];
$dis_name=$_POST['dis_name'];
 $dater = date("Y-m-d H:i:s");
$stmt = $db->runQuery("insert into district(dis_code,dis_name,created)values(:dis_code,:dis_name, :dater)");
$stmt->bindValue(":dis_code", $dis_code);
$stmt->bindValue(":dis_name", $dis_name);
$stmt->bindValue(":dater", $dater);
$stmt->execute();
header("Location:admin.php?page=an");
  
  }
  
  
  
  ?>

 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add New Districts</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label >District Code</label>                  
                    <input type="text" class="form-control" id="dis_code" name="dis_code" value="<?php echo $dis_rad_code; ?>" readonly required>
                  
                </div>
                <div class="form-group">
                  <label >District Name</label>

                    <input type="text" class="form-control" id="dis_name" name="dis_name" required >
                  
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
  
  
 
