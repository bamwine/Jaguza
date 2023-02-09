  <?php   include 'emg_admin/config.php';
  

  ?>
  
    <?php 

 
if(isset($_POST['upda_data'])){ 

$fam_owner=$_POST['fam_owner'];
$fam_id=$_POST['Code'];
$create = date("Y-m-d H:i:s");


$stmt = $db->runQuery("UPDATE farms SET fam_owner = :fam_owner WHERE fam_id = :fam_id");
$stmt->execute(array(":fam_owner" => $fam_owner,":fam_id" => $fam_id));
  
  }
  
  
  
  ?>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Farms registered! </strong>
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
                  <th>Farm Code</th>
                  <th>Farm Owner</th>                 
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				$s = $db->runQuery( "SELECT * FROM farms ORDER BY fam_id DESC " );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['fam_code'];?></td>
                  <td><?php echo $row['fam_owner'];?></td>                  
                  <td><?php echo $row['created'];?></td>
                  <td>
			 
			   <a   class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['fam_id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a   class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['fam_id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
		  
		  
 <div id="edit_<?php echo $row['fam_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add New Farms</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label >Farm Code</label>                  
                    <input type="text" class="form-control" id="dis_code" name="dis_code" value="<?php $row['fam_code']; ?>" readonly required>
                  
                </div>
                <div class="form-group">
                  <label >Farm Owner  </label>

                    <input type="text" class="form-control" id="fam_owner" value="<?php echo $row['fam_owner'];?>" name="fam_owner"  required >
                  
                </div>
               
	        <input type="hidden" class="form-control" id="Code" name="Code" value="<?php echo $row['fam_id']; ?>"  >
	       
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
  
 		$fam_id = $_GET['did'];
		
$stmt = $db->runQuery("DELETE FROM farms WHERE fam_id = :fam_id ");
$stmt->execute(array(":fam_id" => $fam_id));
header("Location:admin.php?page=na");

}
		?>
  
  
  <script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this  Farm?");
	if(iAnswer){
		window.location = 'admin.php?page=na&did='+Id;
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
header("Location:admin.php?page=na");  
  }
  
  
  
  ?>

 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add New Farms</h3>
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

                    <input type="text" class="form-control" id="dis_name" value="" name="dis_name"  required >
                  
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
  
  
 
