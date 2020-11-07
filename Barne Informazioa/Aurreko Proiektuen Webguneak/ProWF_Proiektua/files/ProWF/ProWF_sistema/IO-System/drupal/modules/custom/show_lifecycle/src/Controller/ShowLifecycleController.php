<?php 

	/**
	* @file
	* Contains \Drupal\project_info\Controller\ProjectWebpageController
	*/

	namespace Drupal\show_lifecycle\Controller;
	use Drupal\Core\Database\Database;

	class ShowLifecycleController{
		
		
		public function test(){
		   
			$method_id = \Drupal::request()->query->get('id'); //GET METHODOLOGY ID FROM THE URL
			$path = "sites/default/files/OpenUpLifecycle/openUp_lifecycle.html"; //GET THE LOCATION OF THE WORKFLOW
			
			return array(
				'#theme' => 'indexSL',
				'#path' => $path,
			
			);
		}
		  
		  
	}
	
   
 