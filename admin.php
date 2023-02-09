<?php 

 include 'emg_admin/config.php';


$view_div=$_GET['page'];

switch ($view_div) 
{
    case 'db':
		$data['view_page'] = "admin_dashboard";
		$views->user_render_admin($data);		
        break;

    case 'an':
        $data['view_page'] = "admin_district";
		$views->user_render_admin($data);
        break;
		
	 case 'na':
        $data['view_page'] = "admin_farms";
		$views->user_render_admin($data);
        break;
		
    case 'fb':
        $data['view_page'] = "admin_farmers";
		$views->user_render_admin($data);
        break;
    case 'uo':
       $data['view_page'] = "userobserv";
		$views->user_render_admin($data);
        break;
		
	case 'md':
       $data['view_page'] = "admin_disease";
		$views->user_render_admin($data);
        break;	
    
	case 'mr':
       $data['view_page'] = "admin_resource";   
		$views->user_render_admin($data);
        break;
		
	case 'mv':
       $data['view_page'] = "admin_doctors";
		$views->user_render_admin($data);
        break;	
	
    default:
       $data['view_page'] = "admin_dashboard";
		$views->user_render_admin($data);
        break;
}
?>


