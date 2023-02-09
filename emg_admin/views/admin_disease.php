  <?php   include 'emg_admin/config.php';
    $user_id = $_SESSION['useradmin']['id'];
$stmt = $db->runQuery("SELECT * FROM admin WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);


  ?>
  
  
  
  
 <?php 


if(isset($_POST['upda_data'])){ 

$disease=$_POST['disease'];
$description=$_POST['description'];
$signs=$_POST['signs'];
$prevention=$_POST['prevention'];
$symptoms=$_POST['symptoms'];
$treatment=$_POST['treatment'];
$ids=$_POST['Code'];



$stmt = $db->runQuery("UPDATE disease SET 
disease = :disease,
description = :description, 
signs = :signs,
symptoms = :symptoms, 
prevention = :prevention, 
treatment = :treatment 
WHERE id = :ids");
$stmt->execute(array(":ids" => $ids,":disease" => $disease ,":description" => $description,":signs" => $signs,":symptoms" => $symptoms,":prevention" => $prevention,":treatment" => $treatment));
  
  }
  

  
  ?>
  
  
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Disease Center Managment </strong>
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
                  <th>Disease</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				 
				<?php  
				$s = $db->runQuery( "SELECT * FROM disease ORDER BY disease ASC " );
				$s->execute();
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['disease'];?></td>
                  
                  <td>
			   <a  class="btn btn-success pull-right" style="margin-right: 5px;"   onclick="$('#nurse_view_<?php echo $row['id']; ?>').modal('show');" ><i class="fa fa-eye"></i> View</a>
			   <a  class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a   class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
		  
		  
		  	
		<div id="nurse_view_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Disease Details</h3>
                  </div>
                 
				  <div class="modal-body">
                   
                    <div class="row">
<?php                   
echo"<table>";				
echo "<tr><th> Disease</th><td> <strong>". $row['disease'] . "</strong></td></tr>";
echo "<tr><th> Description</th><td>" . $row['description'] ."</td></tr>";
echo "<tr><th> Symptoms</th><td> ". $row['symptoms'] ."</td></tr>";
echo "<tr><th> Prevention</th><td>" . $row['prevention'] ."</td></tr>";
echo "<tr><th> Treatment</th><td> ". $row['treatment'] ."</td></tr>";
echo"</table>";
?>
				  
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
                    <h3 class="modal-title">Edit Animal Disease</h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					<div class="form-group">
					<label >Disease*</label>                  
					<input type="text" class="form-control" id="disease" name="disease"  value="<?php echo $row['disease']; ?>" placeholder="">

					</div>
					<div class="form-group">
					<label >Description*</label>

					<textarea  id="tinymce" name="description"  ><?php echo $row['description']; ?></textarea>

					</div>

					<div class="form-group">
					<label >Signs</label>

					<textarea id="tinymce" class="form-control"  name="signs"   ><?php echo $row['signs']; ?></textarea>

					</div>

					<div class="form-group">
					<label  >Symptoms</label>

					<textarea  class="form-control" id="tinymce" name="symptoms"  ><?php echo $row['symptoms']; ?></textarea>

					</div>

					
					
					<div class="form-group">
					<label  >Prevention</label>

					<textarea class="form-control" id="tinymce" name="prevention"  ><?php echo $row['prevention']; ?></textarea>

					</div>
					
					
					<div class="form-group">
					<label  >Treatment</label>

					<textarea type="text" class="form-control" id="tinymce" name="treatment"  ><?php echo $row['treatment']; ?></textarea>

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
		
$stmt = $db->runQuery("DELETE FROM disease WHERE id = :dis_id ");
$stmt->execute(array(":dis_id" => $user_id));
header("Location:admin.php?page=md");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this ?");
	if(iAnswer){		

        window.location = "admin.php?page=md&did="+Id;
		
	} 
  }
  

</script>



 <?php 

 
if(isset($_POST['save_data'])){ 

$disease=$_POST['disease'];
$description=$_POST['description'];
$signs=$_POST['signs'];
$prevention=$_POST['prevention'];
$symptoms=$_POST['symptoms'];
$treatment=$_POST['treatment'];

$stmt = $db->runQuery("INSERT INTO disease ( disease, description, signs, symptoms, prevention, treatment)
VALUES (:disease,:description,:signs,:symptoms,:prevention,:treatment)");
$stmt->bindValue(":disease", $disease);
$stmt->bindValue(":description", $description);
$stmt->bindValue(":signs", $signs);
$stmt->bindValue(":symptoms", $symptoms);
$stmt->bindValue(":prevention", $prevention);
$stmt->bindValue(":treatment", $treatment);
$stmt->execute();
header("Location:admin.php?page=md");
  }
  
  
  
  ?>


 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title"> Animal Disease -Add</h3>
                  </div>
                 
					<div class="modal-body">
					<form class="form-horizontal" method="post">
					<div class="box-body">
					
					<div class="panel-group" id="accordion">
					
					
					<div class="panel panel-default">
					<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#Disease">
					Disease*</a>
					</h4>
					</div>
					<div id="Disease" class="panel-collapse collapse in">
					<div class="panel-body">
					                  
					<input type="text" class="form-control" id="disease" name="disease" required  placeholder="">

					
					</div>
					</div>
					</div>
					
					
					<div class="panel panel-default">
					<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#Description">
					Description*</a>
					</h4>
					</div>
					<div id="Description" class="panel-collapse collapse in">
					<div class="panel-body">
					                 
					<textarea  id="tinymce" class="form-control"  name="description" ></textarea>

					</div>
					</div>
					</div>
					
					
					
					<div class="panel panel-default">
					<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#Signs">
					Signs*</a>
					</h4>
					</div>
					<div id="Signs" class="panel-collapse collapse in">
					<div class="panel-body">
					                 
					<textarea  id="tinymce" class="form-control"  name="signs" ></textarea>

					</div>
					</div>
					</div>
					
					
					<div class="panel panel-default">
					<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#Symptoms">
					Symptoms*</a>
					</h4>
					</div>
					<div id="Symptoms" class="panel-collapse collapse in">
					<div class="panel-body">
					                 
					<textarea  id="tinymce" class="form-control"  name="symptoms" ></textarea>

					</div>
					</div>
					</div>
					
					
						<div class="panel panel-default">
					<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#Prevention">
					Prevention*</a>
					</h4>
					</div>
					<div id="Prevention" class="panel-collapse collapse in">
					<div class="panel-body">
					                 
					<textarea  id="tinymce" class="form-control"  name="prevention" ></textarea>

					</div>
					</div>
					</div>
					
					
						<div class="panel panel-default">
					<div class="panel-heading">
					<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#Treatment">
					Treatment*</a>
					</h4>
					</div>
					<div id="Treatment" class="panel-collapse collapse in">
					<div class="panel-body">
					                 
					<textarea  id="tinymce" class="form-control"  name="treatment" ></textarea>

					</div>
					</div>
					</div>
					
					
					
					<!-- put above--->
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
              </div>
     </div>
  <!-- /.content-wrapper -->
