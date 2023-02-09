  <?php   include 'emg_admin/config.php';
  
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong> Resource Center</strong>
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
	
	
	  <div class="row">
                        <div class="col-xs-12">
                            <!-- interactive chart -->
                            <div class="box box-primary">
                                
                                <div class="box-body">
                                            <h3 style="margin-right:400px;">Resource Topic</h3>
                                   <!-- select -->
                                        <div class="form-group col-xs-8">
                                        <form method="post">
						
                                            <select class="form-control"  onchange="showUser2(this.value);">
                                                <option >Select Topic</option>
														<?php  //if you are outside the db class, for example you are in the index page
														$s = $db->runQuery( "SELECT * FROM resour_center ORDER BY topic ASC " );
														$s->execute();
														$s->setFetchMode(PDO::FETCH_ASSOC);
														While($row = $s->fetch()):	
														?>
                                                <?php //foreach($diseases as $row):?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['topic'];?></option>
                                                <?php  Endwhile;?>
                                            </select>
                                            </form>
                                        </div>
										
									
										
									
                                       
                                </div>
                            </div>

                        </div>
                    </div><!-- /.row -->
	

  <div id="helow" >	


 </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
