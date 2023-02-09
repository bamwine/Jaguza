  <?php   include 'emg_admin/config.php';
    $user_id = $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Feedback from vertinary doctor</strong>
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
                  <th>Feed Back</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				$farmerid = $userRow['fa_id'];
				$s = $db->runQuery( "Select logs.*, veternary.full_name From  logs Inner Join   veternary   On logs.vet_id = veternary.vet_id where status='yes'and farmer_id = :farmerid " );
				$s->execute([":farmerid"=>$farmerid]);
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['feedback'];?></td>
                  
                  <td>
				  
				
			   <a  class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-info-circle"></i></a>
			   <a  class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['id']; ?>);" href="javascript:;"><i class="fa fa-remove"></i></a>
		   
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
					  <b><p>Your previous query</p></b> <p><?php echo $row['report']; ?></p><br/>
					  <b><p>Feedback</p></b> <p><?php echo $row['feedback']; ?></p><br/>
					  <b><p>Vertinary Officer</p></b> <p><?php echo $row['full_name']; ?></p><br/>
					  
					</table>
					
					</div>
				  
                </div>
					
					
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
header("Location: home.php?page=fb");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this Content?");
	if(iAnswer){		

        window.location = "home.php?page=fb&did="+Id;
		
	} 
  }
  

</script>



 <?php 

 
if(isset($_POST['save_data'])){ 

$report=$_POST['qeury'];
$fam_owner=$_POST['Code'];
$create = date("Y-m-d H:i:s");
$status="No";

$stmt = $db->runQuery("insert into logs (report,farmer_id,date_added,status)values(:report,:fam_owner,:create,:status)");
$stmt->bindValue(":report", $report);
$stmt->bindValue(":fam_owner", $fam_owner);
$stmt->bindValue(":create", $create);
$stmt->bindValue(":status", $status);

$stmt->execute();
  header("Location: home.php?page=fb");
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
					<textarea type="text" class="form-control" id="qeury" name="qeury" placeholder="" required ></textarea>

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
