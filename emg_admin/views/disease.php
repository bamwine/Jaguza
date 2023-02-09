  <?php   include 'emg_admin/config.php';
  
 

  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 align="center">
        <strong> Disease Center</strong>
        <small>&nbsp;&nbsp;</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

		         
        <div class="row">
                        <div class="col-xs-12">
                            <!-- interactive chart -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">Disease Center</h3>
                                </div>
                                <div class="box-body">
                                            <h3 style="margin-right:400px;">Cattle Diseases</h3>
                                   <!-- select -->
                                        <div class="form-group col-xs-8">
                                        <form method="post">
						
                                            <select class="form-control"  onchange="showUser(this.value);">
                                                <option >Select disease</option>
														<?php  //if you are outside the db class, for example you are in the index page
														$s = $db->runQuery( "SELECT * FROM disease ORDER BY disease ASC " );
														$s->execute();
														$s->setFetchMode(PDO::FETCH_ASSOC);
														While($row = $s->fetch()):	
														?>
                                                <?php //foreach($diseases as $row):?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['disease'];?></option>
                                                <?php  Endwhile;?>
                                            </select>
                                            </form>
                                        </div>

                                        <table class="table table-stripped table-condensed" id="helow">
                                       <tr> <td>
									     <div>
                                        <br />
                                            <h3 style="margin-right:400px;">Goat Diseases</h3>
                                            <ul>
                                               <li>Contagious ecthyma (contagious pustular dermatitis, orf)</li>
                                               <li>Bluetongue</li>
                                               <li>Goat pox</li>
                                               <li>Scrapie</li>
                                               <li>Pulmonary adenomatosis</li>
                                               <li>Ovine progressive interstitial pneumonia</li>
                                               <li>Contagious caprine pleuropneumonia</li>
                                               </ul>
                                               </div>
                                               
                                                <div>
                                            <h3 style="margin-right:400px;">Sheep Diseases</h3>
                                            <ul>
                                               <li>Abomasal bloat</li>
                                               <li>Bacterial meningitis</li>
                                               <li>Arthritis</li>
                                               <li>Bloat</li>
                                               <li>Clostridial Diseases</li>
                                               <li>Facial eczema</li>
                                               <li>Footrot</li>
                                               </ul>
                                               </div>
                                               
                                                <div>
                                            <h3 style="margin-right:400px;">Pig Diseases</h3>
                                            <ul>
                                               <li>Anaemia</li>
                                               <li>Back Muscle Necrosis</li>
                                               <li>Blue Eye Disease</li>
                                               <li>Bloat</li>
                                               <li>Osteomalacia</li>
                                               <li>Prolapse of the Bladder</li>
                                               <li>Coccidiosis (Coccidia)</li>
                                               </ul>
                                               </div>
                                          <div>
                                            <h3 style="margin-right:400px;">Poultry Diseases</h3>
                                            <ul>
                                               <li>Beak Necrosis</li>
                                               <li>Chicken Anaemia</li>
                                               <li>Blue Eye Disease</li>
                                               <li>Coccidiosis</li>
                                               <li>Newcastle Disease (Paramyxovirus 1)</li>
                                               <li>Marek's disease</li>
                                               <li>Gizzard worms - Geese</li>
                                               </ul>
                                               </div>
									   
									   </td> </tr>
                                        </table>
                                        
									 
                                       
                                </div>
                            </div>

                        </div>
                    </div><!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
  <script type="text/javascript">

  
  
  /*
  
function showUser(str) {
 
    if (str == "") {
        document.getElementById("helow").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("helow").innerHTML = this.responseText;
            }
        };
		confirm(str);
        xmlhttp.open("GET","../../Ajax.php?q="+str,true);
        xmlhttp.send();
    }
}

  */

</script>
  <!-- /.content-wrapper -->
