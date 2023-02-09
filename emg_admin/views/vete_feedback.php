  <?php   include 'emg_admin/config.php';
    $user_id = $_SESSION['uservet']['vet_id'];
$stmt = $db->runQuery("SELECT * FROM veternary WHERE vet_id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>vertinary doctor </strong>
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	 <div class="row no-print">
        <!--div class="col-xs-12">
          <a  data-toggle="modal" data-target="#add" target="_blank" class="btn btn-success pull-left"><i class="fa fa-plus"></i> ADD</a>
       
        </div-->
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
                  <th>Issue</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				
				$s = $db->runQuery( "SELECT * FROM logs where status='no'" );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['report'];?></td>
				  <td><?php echo $row['status'];?></td>
                  
                  <td>
				  
				
			   <a  class="btn btn-primary pull-right" style="margin-right: 5px;" title="View " onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-info-circle"></i></a>
			   <a  class="btn btn-danger pull-right" style="margin-right: 5px;" title="Add response " onclick="$('#repose_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-plus"></i></a>
		   
 <div id="edit_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Details</h3>
                  </div>
                 
					<div class="modal-body">
					 <div class="row">
                      <div class="col-xs-12"> 
					  <table id="">
					  <b><p>Problem</p></b> <p><?php echo $row['report']; ?></p><br/>
					  <b><p>Filed By</p></b> <p><?php echo $row['farmer_id']; ?></p><br/>
					  <b><p>Date Filed </p></b> <p><?php echo $row['date_added']; ?></p><br/>
					  
					</table>
					
					</div>
				  
                </div>
					
					
					</div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  
					
					
			  
 <div id="repose_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Response -Add</h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					<div class="form-group">
					<label >Response*</label>                  
					<textarea type="text" class="form-control" id="feedback" name="feedback" reqiured ></textarea>

					</div>
					


					<input type="hidden" class="form-control" id="p_id" name="p_id" value="<?php echo $row['id'];?>" >
					<input type="hidden" class="form-control" id="farmer_id" name="farmer_ids" value="<?php echo $row['farmer_id'];?>"  >
					<input type="hidden" class="form-control" id="pr_sta" name="pr_sta" value="yes" >


					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					<button type="submit"  class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-info pull-right" name="save_resp">Save Response</button>
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
$stmt = $db->runQuery("DELETE FROM logs WHERE id = :anim_id AND farmer_id = :famer_id");
$stmt->execute(array(":anim_id" => $user_id, ":famer_id" => $user));
header("Location:vet_doc.php?page=fi");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this Content?");
	if(iAnswer){		

        window.location = "vet_doc.php?page=fi&did="+Id;
		
	} 
  }
  

</script>



 <?php 

 
if(isset($_POST['save_resp'])){ 

$p_id=$_POST['p_id'];
$farmer_id =$_POST['farmer_ids'];
$feedback =$_POST['feedback'];
$status="yes";
$vet_id= $_SESSION['uservet']['vet_id'];

$stmt = $db->runQuery("UPDATE logs SET 
status = :status,
feedback = :feedback,
vet_id=:vet_id WHERE id = :p_id and farmer_id=:farmer_id");
$stmt->execute(array(":p_id" => $p_id,":farmer_id" => $farmer_id ,":status" => $status,":feedback" => $feedback,":vet_id" => $vet_id));


  header("Location: vet_doc.php?page=fi");
  }
  
  
  
  ?>

  
  
 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Your Problem</h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					<div class="form-group">
					<label >Query or Problem*</label>                  
					<textarea type="text" class="form-control" id="qeury" name="qeury" reqiured ></textarea>

					</div>
					



					<input type="hidden" class="form-control" id="Code" name="Code" value="<?php echo $userRow['fa_id']; ?>"  >



					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					<button type="submit"  class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-info pull-right" name="save_data">Save Information</button>
					</div>
					<!-- /.box-footer -->
					</form>
					</div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  
  
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
