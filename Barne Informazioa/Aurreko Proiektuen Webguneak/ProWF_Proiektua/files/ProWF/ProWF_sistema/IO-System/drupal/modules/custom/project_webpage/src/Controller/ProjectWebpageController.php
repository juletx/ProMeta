<?php 

	/**
	* @file
	* Contains \Drupal\project_webpage\Controller\ProjectWebpageController
	*/

	namespace Drupal\project_webpage\Controller;
	use Drupal\Core\Database\Database;

	class ProjectWebpageController{

		public function updateDocsFolder($project_name){

			$this -> delete_directory("public://ProjectWebPage/Docs");
				  
			$source = "public://" . $project_name . "/docs";
			$destination = "public://ProjectWebPage/Docs";
			
			$this -> recurse_copy($source,$destination);
			
		}
		
		function delete_directory($dirname) {
				 if (is_dir($dirname))
				   $dir_handle = opendir($dirname);
			 if (!$dir_handle)
				  return false;
			 while($file = readdir($dir_handle)) {
				   if ($file != "." && $file != "..") {
						if (!is_dir($dirname."/".$file))
							 unlink($dirname."/".$file);
						else
							 delete_directory($dirname.'/'.$file);
				   }
			 }
			 closedir($dir_handle);
			 rmdir($dirname);
			 return true;
		}
		
		function recurse_copy($src,$dst) { 
			$dir = opendir($src); 
			@mkdir($dst); 
			while(false !== ( $file = readdir($dir)) ) { 
				if (( $file != '.' ) && ( $file != '..' )) { 
					if ( is_dir($src . '/' . $file) ) { 
						recurse_copy($src . '/' . $file,$dst . '/' . $file); 
					} 
					else { 
						copy($src . '/' . $file,$dst . '/' . $file); 
					} 
				} 
			} 
			closedir($dir); 
		}

		public function test(){

			$project_name = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM THE URL

			$this->updateDocsFolder($project_name);

		
			return array(
				'#theme' => 'index'
			);

		}
	}
   
 