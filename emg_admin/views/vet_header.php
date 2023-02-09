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

  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
 <link rel="stylesheet" href="dist/css/vet_custom.css">

<link rel="stylesheet" href="dist/js/all_in_one_datatables.min.css">

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
