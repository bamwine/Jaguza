  <?php   include 'emg_admin/config.php';
      $user_id = $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  
<?php  
  if(isset($_POST['upda_data'])){ 

$qty=$_POST['qty'];
$post_id=$_POST['post_id'];
$anm_type=$_POST['anm_type'];
$coment=$_POST['coment'];
$cost=$_POST['cost'];
$dates=date("Y-m-d H:i:s");
$farmerid = $userRow['fa_id'];
$stmt = $db->runQuery("UPDATE feeds SET quantity = :qty,animal = :anm_type,date_added = :dates ,cost=:cost,comments=:coment WHERE id = :post_id and famer_id=:farmerid");
$stmt->execute(array(":qty" => $qty,":farmerid" => $farmerid ,":anm_type" => $anm_type,":dates" => $dates,":post_id" => $post_id,":cost" =>$cost,":coment" =>$coment));
  

  
  }
  
  
  
  ?> 
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Feeds for animals</strong>
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
                  <th>Quantity in Kilograms</th>
				  <th>Cost</th>
                  <th>Animal</th>
                  <th>Date Added</th>
				  <th>Comments</th>                 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php  
				$farmerid = $userRow['fa_id'];
				$s = $db->runQuery( "SELECT * FROM feeds  where famer_id= :farmerid " );
				$s->execute([":farmerid"=>$farmerid]);
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['quantity'];?></td>
				   <td><?php echo $row['cost'];?></td>
                  <td><?php echo $row['animal'];?></td>
                  <td><?php echo $row['date_added'];?></td>
                  <td><?php echo $row['comments'];?></td>
                  <td>
				
			   <a  class="btn btn-primary pull-right" style="margin-right: 5px;"  href="javascript:;"  onclick="$('#edit_<?php echo $row['id']; ?>').modal('show');"><i class="fa fa-pencil"></i> Edit</a>
			   <a   class="btn btn-danger pull-right" style="margin-right: 5px;" onclick="deleteFund(<?php echo $row['id']; ?>);" href="javascript:;"><i class="fa fa-trash-o"></i> Delete</a>
				 
 <div id="edit_<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Feeds for animals - Edit</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label >Quantity *</label>
                  
                   <input type="text" class="form-control" id="qty" name="qty" value="<?php echo $row['quantity']; ?>" placeholder="in kilograms">
                  
                </div>
                <div class="form-group">
                  <label>Animal</label>
                  <select class="form-control" name="anm_type">
                    <option value="<?php echo $row['animal'];?>"><?php echo $row['animal'];?></option>
                 
                     <option value="Goats">Goats</option>
					  <option value="Cattle">Cattle</option>
					  <option value="Pigs">Pigs</option>
					  <option value="Poultry">Poultry</option>
					
                  </select>
                </div>
				
				 <div class="form-group">
                  <label >Money Spent *</label>
                  
                   <input type="text" class="form-control" id="cost" name="cost" value="<?php echo $row['cost']; ?>" placeholder="">
                  
                </div>
				
				<div class="form-group">
                  <label >Any Comment</label>
                  
                   <input type="text" class="form-control" id="coment" name="coment" value="<?php echo $row['comments']; ?>" placeholder="">
                  
                </div>
               
	     <input type="hidden" class="form-control" id="post_id" name="post_id"  value="<?php echo $row['id']; ?>" placeholder="">
	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="upda_data">Update</button>
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
$stmt = $db->runQuery("DELETE FROM feeds WHERE id = :anim_id AND famer_id = :famer_id");
$stmt->execute(array(":anim_id" => $user_id, ":famer_id" => $user));
header("Location: home.php?page=af");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this  Animal?");
	if(iAnswer){		

        window.location = "home.php?page=af&did="+Id;
		
	} 
  }
  

</script>

 <?php 

 
if(isset($_POST['save_af'])){ 

$qty=$_POST['qty'];
$anm_type=$_POST['anm_type'];
$cost=$_POST['cost'];
$coment=$_POST['coment'];
$dates=date("Y-m-d H:i:s");
$farmerid = $userRow['fa_id'];

$stmt = $db->runQuery("insert into feeds(quantity,animal,famer_id,date_added,cost,comments)values(:qty,:anm_type,:farmerid,:dates,:cost,:coment)");
$stmt->bindValue(":qty", $qty);
$stmt->bindValue(":anm_type", $anm_type);
$stmt->bindValue(":farmerid", $farmerid);
$stmt->bindValue(":dates", $dates);
$stmt->bindValue(":cost", $cost);
$stmt->bindValue(":coment", $coment);
$stmt->execute();
  
  }
  
  
  
  ?> 

 
 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Feeds for animals - Add</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label >Quantity *</label>
                  
                   <input type="text" class="form-control" id="qty" name="qty" placeholder="in kilograms">
                  
                </div>
                <div class="form-group">
                  <label>Animal</label>
                  <select class="form-control" name="anm_type">
                    <option>Select</option>
                 
                     <option value="Goats">Goats</option>
					  <option value="Cattle">Cattle</option>
					  <option value="Pigs">Pigs</option>
					  <option value="Poultry">Poultry</option>
					
                  </select>
                </div>
               
				<div class="form-group">
                  <label >Money Spent *</label>
                  
                   <input type="text" class="form-control" id="cost" name="cost" >
                  
                </div>
				
				<div class="form-group">
                  <label >Any Comment</label>
                  
                   <input type="text" class="form-control" id="coment" name="coment"  placeholder="">
                  
                </div>
		
	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="save_af">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  </div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  <!-- /.content-wrapper -->

