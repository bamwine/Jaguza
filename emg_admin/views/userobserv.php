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
      <h1>
        
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

	
		
	     <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border bg-green-gradient">
			 <i class="fa fa-eye"></i>
              <h3 class="box-title">Temperatures for animals under observation.</h3>

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
	$result = $db->runQuery("SELECT tag_id ,temp FROM observation WHERE famer_id = :farmerid  LIMIT 5");
 // $result = $db->runQuery($strQuery);
  if ($result) {

  $arrData = array(
        "chart" => array(
            "caption"=> "Temperatures of animals for the last 24 hours",           
            "xAxisname"=> "Tag IDs",
            "yAxisName"=> "Temperature (C)",
            "yAxisMaxValue"=>"100",
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
        //array_push($dataseries3, array("value" => $row["temp"]));

     Endwhile;

      $arrData["categories"]=array(array("category"=>$categoryArray));
      // creating dataset object
      $arrData["dataset"] = array( array("seriesName"=> "Animal Temp",  "renderAs"=>"line", "data"=>$dataseries2));


      /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
      $jsonEncodedData = json_encode($arrData);

      // chart object
      $msChart = new FusionCharts("mscombi2d", "chart1" , "600", "350", "chart-container", "json", $jsonEncodedData);

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
				  <th>Temperature</th>   				  
                  <th >Date time</th>
				</tr>
				</thead>
				
				<?php  //if you are outside the db class, for example you are in the index page
					
					$farmerid = $userRow['fa_id'];
					$s = $db->runQuery("SELECT * FROM observation WHERE famer_id = :farmerid  LIMIT 5");
					$s->execute([":farmerid"=>$farmerid]);
					$s->setFetchMode(PDO::FETCH_ASSOC);
					While($rows = $s->fetch()):	?>			
					
				<tr>
		
 
                  <td width="200"><?php  Echo $rows['tag_id']; ?></td> 
				 <td width="200"><?php  Echo $rows['temp']; ?></td> 
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
	
		

	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
