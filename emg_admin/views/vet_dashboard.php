  <?php   include 'emg_admin/config.php';
  
  $stmt = $db->runQuery("SELECT count(*) as total FROM animal");
$stmt->execute();
$totanim = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $db->runQuery("SELECT count(*) as total FROM observation");
$stmt->execute();
$totobseve = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $db->runQuery("SELECT count(*) as total FROM monitor WHERE temp > '50'");
$stmt->execute();
$totmontr = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-green">Total Districts </a>
            <div class="inner">
              <h3 align="center">&nbsp;<?php echo $totmontr['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
           
            <a href="#" class="small-box-footer">View more<img src="icons/send.png"/></a>
          </div>
        </div>
		
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-yellow">Registed Farmers </a>
            <div class="inner">
               <h3 align="center">&nbsp;<?php echo $totobseve['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
            
            <a href="#" class="small-box-footer ">View more <i class="fa fa-arrow-circle-right " ></i></a>
          </div>
        </div>
		
		
		
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-aqua">Farms Registerd </a>
            <div class="inner">
               <h3 align="center">&nbsp;<?php echo $totanim['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
            
            <a href="#" class="small-box-footer">View more <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		
	</div>
	
	

	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
