

<?php 
 include 'emg_admin/config.php';
 include 'plugins/fusion/fusioncharts.php';


$view_div=$_GET['page'];

switch ($view_div) 
{
    case 'db':
		$data['view_page'] = "dashboard";
		$views->user_render_view($data);		
        break;

    case 'an':
        $data['view_page'] = "animals";
		$views->user_render_view($data);
        break;
		
	 case 'na':
        $data['view_page'] = "needattion";
		$views->user_render_view($data);
        break;
		
    case 'fb':
		//feedback vete_feedback
        $data['view_page'] = "feedback";
		$views->user_render_view($data);
        break;
    case 'uo':
       $data['view_page'] = "userobserv";
		$views->user_render_view($data);
        break;
    
	
	case 'dc':
       $data['view_page'] = "disease";
		$views->user_render_view($data);
        break;
		
		
	case 'rc':
       $data['view_page'] = "resource";
		$views->user_render_view($data);
        break;

	
	case 'em':
       $data['view_page'] = "employees";
		$views->user_render_view($data);
        break;
		
	case 'af':
       $data['view_page'] = "animal_feeds";
		$views->user_render_view($data);
        break;
		
	case 'afr':
       $data['view_page'] = "animal_feedsr";
		$views->user_render_view($data);
        break;	

		
	case 'mp':
       $data['view_page'] = "milk";
		$views->user_render_view($data);
        break;
	

	case 'mpr':
       $data['view_page'] = "milkrp";
		$views->user_render_view($data);
        break;
		
	case 'mpg':
       $data['view_page'] = "milkgp";
		$views->user_render_view($data);
        break;	
	
    default:
       $data['view_page'] = "dashboard";
		$views->user_render_view($data);
        break;
}
?>


