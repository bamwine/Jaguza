  <?php   include 'emg_admin/config.php';
    $user_id = $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
 

<script>
  function header(){
         return 'Milk generation report';
      }
  
  </script> 
  
  <?php 

 
if(isset($_POST['updat_dat'])){ 

$amout=$_POST['amout'];
$lites=$_POST['lites'];
$dates=date("Y-m-d H:i:s");
$post_id=$_POST['post_id'];
$farmerid = $userRow['fa_id'];

$stmt = $db->runQuery("UPDATE milk SET amount = :amout,litres = :lites,date_added = :dates WHERE id = :post_id and famer_id=:farmerid");
$stmt->execute(array(":amout" => $amout,":farmerid" => $farmerid ,":lites" => $lites,":dates" => $dates,":post_id" => $post_id));
    
  }
  
  
  
  ?>  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Milk generation report</strong>
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	 
		 <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="report_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Amount</th>
                  <th>Liters</th>
                  <th>Date Added</th>
                 
                </tr>
                </thead>
                <tbody>
				<?php 
					$farmerid = $userRow['fa_id'];
				$s = $db->runQuery( "SELECT * FROM milk where famer_id= :farmerid " );
				$s->execute([":farmerid"=>$farmerid]);
				$s->setFetchMode(PDO::FETCH_ASSOC);
				While($row = $s->fetch()):	
					?>
                <tr>
                  <td><?php echo $row['amount'];?></td>
                  <td><?php echo $row['litres'];?></td>
                  <td><?php echo $row['date_added'];?></td>
                  
                 
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
$stmt = $db->runQuery("DELETE FROM milk WHERE id = :anim_id AND famer_id = :famer_id");
$stmt->execute(array(":anim_id" => $user_id, ":famer_id" => $user));
header("Location: home.php?page=mp");

}
		?>
  
  
<script type="text/javascript">
function deleteFund(Id){
  	var iAnswer = confirm("Are you sure you want to delete this  Animal?");
	if(iAnswer){		

        window.location = "home.php?page=mp&did="+Id;
		
	} 
  }
  

</script> 

 
 <?php 

 
if(isset($_POST['save_dat'])){ 

$amout=$_POST['amout'];
$lites=$_POST['lites'];
$dates=date("Y-m-d H:i:s");
$farmerid = $userRow['fa_id'];

$stmt = $db->runQuery("insert into milk(amount,litres,famer_id,date_added)values(:amout,:lites,:farmerid,:dates)");
$stmt->bindValue(":amout", $amout);
$stmt->bindValue(":lites", $lites);
$stmt->bindValue(":farmerid", $farmerid);
$stmt->bindValue(":dates", $dates);
$stmt->execute();
  
  }
  
  
  
  ?>  
  
 <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Add More Details</h3>
                  </div>
                 
	<div class="modal-body">
                     <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" >Amount</label>

                  
                    <input type="text" class="form-control" id="amout" name="amout" placeholder="0">
                  
                </div>
                <div class="form-group">
                  <label for="inputPassword3" >Litres</label>

                  
                    <input type="text" class="form-control" id="lites" name="lites" placeholder="0">
                 
                </div>
               
	       <!--div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Date Added</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="">
                  </div>
                </div-->
		
		
	       
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="save_dat">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  </div>
				  
                </div>
                <!-- /.modal-content -->
              </div>
     </div>
  <!-- /.content-wrapper -->
