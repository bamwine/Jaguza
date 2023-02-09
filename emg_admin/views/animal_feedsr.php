  <?php   include 'emg_admin/config.php';
      $user_id = $_SESSION['userfarm']['id'];
$stmt = $db->runQuery("SELECT * FROM users WHERE id = :user_id");
$stmt->execute(array(":user_id" => $user_id));
$userRow = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  
  <script>
  function header(){
         return 'Feeds report';
      }
  
  </script>
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong>Feeds report</strong>
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
                  <th>Quantity in Kilograms</th>
				  <th>Cost</th>
                  <th>Animal</th>
                  <th>Date Added</th>
				                
                 
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
  
<!--script>
    $(function () {
        $( '#table1' ).searchable({
            striped: true,
            oddRow: { 'background-color': '#f5f5f5' },
            evenRow: { 'background-color': '#fff' },
            searchType: 'fuzzy'
        });

        $( '#searchable-container' ).searchable({
            searchField: '#container-search',
            selector: '.row',
            childSelector: '.col-xs-4',
            show: function( elem ) {
                elem.slideDown(100);
            },
            hide: function( elem ) {
                elem.slideUp( 100 );
            }
        })
    });
</script-->
  <!-- /.content-wrapper -->
