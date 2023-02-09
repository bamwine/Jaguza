  <?php   include 'emg_admin/config.php';
   
   $user_id = $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);


  ?>
  
  
  
  
 <?php 

 
if(isset($_POST['upda_data'])){ 

$tagid=$_POST['tagid'];
$Arrived=$_POST['Arrived'];
$notes=$_POST['notes'];
//$create=$_POST['create'];
$fam_owner=$_POST['Code'];
$create = date("Y-m-d H:i:s");


$stmt = $db->runQuery("UPDATE animal SET tag_id = :tagid,
arrived = :Arrived,
notes = :notes,
created = :create WHERE tag_id = :tagid");
$stmt->execute(array(":tagid" => $tagid,":Arrived" => $Arrived ,":notes" => $notes,":create" => $create));
  
  }
  
  
  
  ?>
  
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Animals registered!</strong>
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	 <div class="row no-print">
        <div class="col-xs-12">
          <a  data-toggle="modal" data-target="#add" target="_blank" class="btn btn-success pull-left"><i class="fa fa-plus"></i> ADD</a>
        <!--  <button type="button" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Submit Payment </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>  -->
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
                  <th>Tag Id</th>
                  <th>Arrived</th>
                  <th>Notes</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				 
				<?php  
				$farmerid = $userRow['fa_id'];
				$s = $db->runQuery( "SELECT * FROM animal where famer_id= :farmerid ORDER BY arrived DESC " );
				$s->execute([":farmerid"=>$farmerid]);
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['tag_id'];?></td>
                  <td><?php echo $row['arrived'];?></td>
                  <td><?php echo $row['notes'];?></td>
                  <td><?php echo $row['created'];?></td>
                  <td>
			   <a  class="btn btn-success pull-right" style="margin-right: 5px;"   onclick="$('#nurse_view_<?php echo $row['tag_id']; ?>').modal('show');" ><i class="fa fa-eye"></i> View</a>
			   <a  class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['tag_id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a   class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['tag_id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
		  
		  
		  	
		<div id="nurse_view_<?php echo $row['tag_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Animal Details</h3>
                  </div>
                 
				  <div class="modal-body">
                    <h3 style="text-decoration:underline;">detail information</h3>
                    <div class="row">
                      <div class="col-xs-6"> 
			<b>Tag id:</b> <?php echo $row['tag_id']; ?><br/>
                        <b>Arrived :</b> <?php echo $row['arrived'];?><br/>
			<b>Notes:</b> <?php  echo $row['notes'];?><br/>
                        <b>Date Created:</b> <?php echo $row['created']; ?><br/>
                      </div>
                      
                     
                      
                    </div>
                  </div>
				  
                </div>
               
              </div>
            </div>
			
			
			<div id="edit_<?php echo $row['tag_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Edit Animal Details</h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					<div class="form-group">
					<label >Tag Id*</label>                  
					<input type="text" class="form-control" id="tagid" name="tagid" readonly value="<?php echo $row['tag_id']; ?>" placeholder="">

					</div>
					<div class="form-group">
					<label >Arrived*</label>

					<input type="text" class="form-control" id="inputPassword3" name="Arrived" value="<?php echo $row['arrived']; ?>" placeholder="">

					</div>

					<div class="form-group">
					<label >Notes</label>

					<input type="text" class="form-control" id="notes" name="notes"  value="<?php echo $row['notes']; ?>" placeholder="">

					</div>

					<div class="form-group">
					<label  >Created</label>

					<input type="text" class="form-control" id="create" name="create"  value="<?php echo $row['created']; ?>" placeholder="">

					</div>



					<input type="hidden" class="form-control" id="Code" name="Code" value="<?php echo $userRow['fa_id']; ?>"  >



					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					<button type="submit"  class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-info pull-right" name="upda_data">Update Information</button>
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
$stmt = $db->runQuery("DELETE FROM animal WHERE tag_id = :anim_id AND famer_id = :famer_id");
$stmt->execute(array(":anim_id" => $user_id, ":famer_id" => $user));
header("Location: home.php?page=an");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this  Animal?");
	if(iAnswer){		

        window.location = "home.php?page=an&did="+Id;
		
	} 
  }
  

</script>



 <?php 

 
if(isset($_POST['save_data'])){ 

$tagid=$_POST['tagid'];
$Arrived=$_POST['Arrived'];
$notes=$_POST['notes'];
//$create=$_POST['create'];
$fam_owner=$_POST['Code'];
$create = date("Y-m-d H:i:s");

$stmt = $db->runQuery("insert into animal(tag_id,arrived,notes,famer_id,fam_id,created)values(:tagid,:Arrived,:notes,:fam_owner,:fam_id,:create)");
$stmt->bindValue(":tagid", $tagid);
$stmt->bindValue(":Arrived", $Arrived);
$stmt->bindValue(":notes", $notes);
$stmt->bindValue(":fam_owner", $fam_owner);
$stmt->bindValue(":fam_id", "");
$stmt->bindValue(":create", $create);
$stmt->execute();
  header("Location: home.php?page=an");
  }
  
  
  
  ?>


 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add New Animal Details</h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					<div class="form-group">
					<label >Tag Id*</label>                  
					<input type="text" class="form-control" id="tagid" name="tagid" placeholder="">

					</div>
					<div class="form-group">
					<label >Arrived*</label>

					<input type="text" class="form-control" id="inputPassword3" name="Arrived" placeholder="">

					</div>

					<div class="form-group">
					<label >Notes</label>

					<input type="text" class="form-control" id="notes" name="notes" placeholder="">

					</div>

					<div class="form-group">
					<label  >Created</label>

					<input type="text" class="form-control" id="create" name="create" placeholder="">

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
