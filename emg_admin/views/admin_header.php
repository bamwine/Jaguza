<?php

session_start();
 include 'emg_admin/config.php';  ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php $db->get_title(); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
 <link rel="stylesheet" href="dist/css/admin_custom.css">
 
 <link rel="stylesheet" type="text/css" href="plugins/DataTables-1.10.15/media/css/jquery.dataTables.css">
 
	<link rel="stylesheet" type="text/css" href="plugins/DataTables-1.10.15/extensions/Buttons/css/buttons.dataTables.css">

	<style type="text/css" class="init">
	
	</style>
		<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="plugins/DataTables-1.10.15/media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.js">
	</script>
	<script type="text/javascript" language="javascript" src="plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.js">
	</script>
	<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.js">
	</script>
	<script type="text/javascript" language="javascript" src="plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.js">
	</script>
	
	<script type="text/javascript" language="javascript" class="init">
	


$(document).ready(function() {
	$('#example2').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 'pdf', 'print'
		]
	} );
} );



	</script>
 
 
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<script src="dist/js/bamwine.js"></script>
<!--script src="dist/js/jquery.searchable-1.0.0.min.js"></script-->

<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/tinymce/tinymce.js"></script>







 <script>
  
    //TinyMCE
    tinymce.init({
      selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
       
    });
   
 
  </script>
 
  <script type="text/javascript">

    
  
function showUser(str) {
 //confirm(str);
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
		
        //xmlhttp.open("GET","Ajax.php?q="+str,true);
		 xmlhttp.open("GET","Ajax.php?act=dies&q="+str,true);
        xmlhttp.send();
    }
}


function showUser2(str) {
 //confirm(str);
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
		
        xmlhttp.open("GET","Ajax.php?act=reso&q="+str,true);
        xmlhttp.send();
    }
}
  
 $(function () {
        $( '#report_table' ).searchable({
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

	
	$(function () {
    //$("#report_table").DataTable();
    $('#report_table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
	  "retrieve": true,
      "autoWidth": true
	  
    });
  });

  

  
</script>
	<script type="text/javascript" src="plugins/fusion/fusioncharts.js"></script>
   <script type="text/javascript" src="plugins/fusion/fusioncharts.charts.js"></script>
	<script type="text/javascript" src="plugins/fusion/fusioncharts.theme.zune.js"></script>
	<script type="text/javascript" src="plugins/fusion/fusioncharts.theme.ocean.js"></script>
	<script type="text/javascript" src="plugins/fusion/fusioncharts.theme.fint.js"></script>
</head>

<body class="hold-transition skin-green sidebar-mini">
