  <?php   include 'emg_admin/config.php';

  ?>
  
  
  
  
 <?php 

 
if(isset($_POST['upda_data'])){ 

$topic=$_POST['topic'];
$description=$_POST['description'];
$ids=$_POST['Code'];

$stmt = $db->runQuery("UPDATE resour_center set topic = :topic, 
description = :description 
WHERE id = :ids");
$stmt->execute(array(":ids" => $ids,":topic" => $topic ,":description" => $description));
  
  }
  
  
  
  ?>
  
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Resource Center Managment</strong>
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
                  <th>Topic</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				 
				<?php  
				$s = $db->runQuery( "SELECT * FROM resour_center ORDER BY topic ASC " );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['topic'];?></td>
                  
                  <td>
			   <a  class="btn btn-success pull-right" style="margin-right: 5px;"   onclick="$('#nurse_view_<?php echo $row['id']; ?>').modal('show');" ><i class="fa fa-eye"></i> View</a>
			   <a  class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a   class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
		  
		  
		  	
		<div id="nurse_view_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Topic Details</h3>
                  </div>
                 
				  <div class="modal-body">
                    <h3 style="text-decoration:underline;">detail information</h3>
                    <div class="row">
                      <div class="col-xs-12"> 
					<?php echo $row['description']; ?>
                        
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
                    <h3 class="modal-title">Topic Details -Edit</h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					<div class="form-group">
					<label >Topic*</label>                  
					<input type="text" class="form-control" id="Topic" name="topic"  value="<?php echo $row['topic']; ?>" placeholder="">

					</div>
					<div class="form-group">
					<label >Description*</label>

					<textarea  class="form-control" id="tinymce" name="description" ><?php echo $row['description']; ?> </textarea>

					</div>



					<input type="hidden" class="form-control" id="Code" name="Code" value="<?php echo $row['id']; ?>"  >



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
		
$stmt = $db->runQuery("DELETE FROM resour_center WHERE id = :anim_id ");
$stmt->execute(array(":anim_id" => $user_id));
header("Location:admin.php?page=mr");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this ?");
	if(iAnswer){		

        window.location = "admin.php?page=mr&did="+Id;
		
	} 
  }
  

</script>



 <?php 

 
if(isset($_POST['save_data'])){ 

$topic=$_POST['topic'];
$description=$_POST['description'];

$stmt = $db->runQuery("insert into resour_center(topic,description)values(:topic,:description)");
$stmt->bindValue(":topic", $topic);
$stmt->bindValue(":description", $description);
$stmt->execute();
header("Location:admin.php?page=mr");
  }
  
  
  
  ?>


 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add New </h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					<div class="form-group">
					<label >Topic*</label>                  
					<input type="text" class="form-control" id="topic" name="topic" placeholder="">

					</div>
					<div class="form-group">
					<label >Description*</label>

					<textarea type="text" class="form-control" id="tinymce" name="description" ></textarea>

					</div>

				

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
