<?php
session_start();

include 'emg_admin/config.php';  

 session_destroy();
    $db->redirect('index.php');

?>