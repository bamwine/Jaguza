<?php 

 include 'emg_admin/config.php';


$view_div=$_GET['page'];

switch ($view_div) 
{
    case 'db':
		$data['view_page'] = "vet_dashboard";
		$views->user_render_vet($data);		
        break;

    case 'fi':
        $data['view_page'] = "vete_feedback";
		$views->user_render_vet($data);
        break;
		
	 case 'mw':
        $data['view_page'] = "vete_feedback_wks";
		$views->user_render_vet($data);
        break;
	
	
    default:
       $data['view_page'] = "vet_dashboard";
		$views->user_render_vet($data);
        break;
}
?>


