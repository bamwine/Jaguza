  <?php   include 'emg_admin/config.php';
  
      $user_id = $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);


  $farmerid = $userRow['fa_id'];
  $stmt = $db->runQuery("SELECT count(*) as total FROM animal where famer_id= :farmerid ORDER BY arrived DESC ");
$stmt->execute([":farmerid"=>$farmerid]);
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
		   <a  class="small-box-footer bg-green">Need Attention </a>
            <div class="inner">
              <h3 align="center">&nbsp;<?php echo $totmontr['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
           
            <a href="home.php?page=na" class="small-box-footer">View Real Time Graphs <img src="icons/send.png"/></a>
          </div>
        </div>
		
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-yellow">Under Observation </a>
            <div class="inner">
               <h3 align="center">&nbsp;<?php echo $totobseve['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
            
            <a href="home.php?page=uo" class="small-box-footer ">View Real Time Graphs <i class="fa fa-arrow-circle-right " ></i></a>
          </div>
        </div>
		
		
		
		 <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box ">
		   <a  class="small-box-footer bg-aqua">Total Animals </a>
            <div class="inner">
               <h3 align="center">&nbsp;<?php echo $totanim['total']; ?></h3>

              <p>&nbsp;</p>
            </div>
            
            <a href="home.php?page=an" class="small-box-footer">View Real Time Graphs <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
		
	</div>
	
	
		<div class="row">
        <div class="col-lg-12 col-xs-6 ">
          <!-- small box -->
          <div class="small-box ">

            <div class="">
              <h3></h3>

              <p><?php $db->get_post('post_content', 'jaguza_dash', 200, 0); ?> </p>
            </div>
            
            <a href="#" class="small-box-footer">View more <img src="icons/send.png"/></a>
          </div>
        </div>
	</div>
	
	  <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class=""><img src="icons/Untitled-3.png" height="20px;" width="20px;" /></i>

              <h3 class="box-title">Top Five animals Needing Attention</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
               
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
			  
                <div class="col-sm-12">
                  <!-- Progress bars -->
                  <div class="clearfix">
            <table  class="table " >
				<thead>
				<tr>
                  <th>Tag id</th>                  
                  <th >Date time</th>
				</tr>
				</thead>
				<tbody>
				<?php  //if you are outside the db class, for example you are in the index page
					$s = $db->runQuery( "SELECT * FROM monitor LIMIT 5" );
					$s->execute();
					$s->setFetchMode(PDO::FETCH_ASSOC);
					While($rows = $s->fetch()):	?>			
					
				<tr>
		
 
                  <td width="200"><?php  Echo $rows['tag_id']; ?></td>                  
                  <td width="151"><?php echo date('M j Y g:i A', strtotime($rows['date_time'])) ?></td> 
				
				  
				</tr>
				<?php   
				  Endwhile;
				?>
				</tbody>
			</table>
				   
                  </div>
               

                 
                 
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
	
	
			<div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class=""><img src="icons/Untitled-3.png" height="20px;" width="20px;" /></i>

              <h3 class="box-title">Top Five animals Under Observation</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
               
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
			  
                <div class="col-sm-12">
                  <!-- Progress bars -->
                  
                 

                  <div class="clearfix">
                    <table class="table" >
				<thead>
				<tr>
                  <th>Tag id</th>                  
                  <th >Date time</th>
				</tr>
				</thead>
				
				<?php  //if you are outside the db class, for example you are in the index page
					$s = $db->runQuery( "SELECT * FROM observation LIMIT 5" );
					$s->execute();
					$s->setFetchMode(PDO::FETCH_ASSOC);
					While($rows = $s->fetch()):	?>			
					
				<tr>
		
 
                  <td width="200"><?php  Echo $rows['tag_id']; ?></td>                  
                  <td width="151"><?php echo date('M j Y g:i A', strtotime($rows['added'])) ?></td> 
				
				  
				</tr>
				<?php   
				  Endwhile;
				?>
				
			</table>
                  </div>
                 
                </div>
                <!-- /.col -->
                
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->
	
	     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border bg-green-gradient">
			 <i class=""><img src="icons/time.png" height="20px;" width="20px;" /></i>
              <h3 class="box-title">Real Time Charting</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong></strong>
                  </p>

                  <div class="chart">
                   <?php
	


  $farmerid = $userRow['fa_id'];
	$result = $db->runQuery("Select  monitor.temp, monitor.tag_id, observation.tag_id As tag_id1, observation.temp As temp1 From  monitor, observation WHERE monitor.famer_id = :farmerid  LIMIT 5");
 // $result = $db->runQuery($strQuery);
  if ($result) {

  $arrData = array(
        "chart" => array(
            "caption"=> "Temperatures of animals for the last 24 hours",           
            "xAxisname"=> "Tag IDs",
            "yAxisName"=> "Temperature (C)",
           
            "legendItemFontColor"=> "#666666",
            "theme"=> "ocean"
            )
          );
          // creating array for categories object

          $categoryArray=array();
          $dataseries1=array();
          $dataseries2=array();
          $dataseries3=array();

          // pushing category array values
          $result->execute([":farmerid"=>$farmerid]);
					$result->setFetchMode(PDO::FETCH_ASSOC);
					While($row = $result->fetch()):
		  
        array_push($categoryArray, array("label" => $row["tag_id"]));
        //array_push($dataseries1, array("value" => $row["temp"]));

        array_push($dataseries2, array("value" => $row["temp"]));
        array_push($dataseries3, array("value" => $row["temp1"]));

     Endwhile;

      $arrData["categories"]=array(array("category"=>$categoryArray));
      // creating dataset object
      $arrData["dataset"] = array( array("seriesName"=> "Under Observation",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Need Attetion",  "renderAs"=>"line", "data"=>$dataseries3));


      /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
      $jsonEncodedData = json_encode($arrData);

      // chart object
      $msChart = new FusionCharts("mscombi2d", "chart1" , "700", "350", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $msChart->render();

    
     

   }

?>

            <center>
                <div id="chart-container">Chart will render here!</div>
            </center>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
               
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
