<?php 

	/**
	* @file
	* Contains \Drupal\select_project2\Controller\SelectProject2Controller
	*/

	namespace Drupal\select_project2\Controller;
	use Drupal\Core\Database\Database;
	use Drupal\user\Entity\User;

	class SelectProject2Controller{
		
		
		public function getProjects($quality_manager){
			
			$projects = array();
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select id,name,start_date,version from projects where quality_manager_username='{$quality_manager}'");
			
			while($row = $result->fetchAssoc()){
				$project = $row['name'] . ';' . $row['start_date'] . ';' . $row['version'] . ';' . $row['id'];
				array_push($projects,$project);
			}
			
			Database::setActiveConnection();
			
			return $projects;
			
		}
	   
	   
		public function test(){
			$user = User::load(\Drupal::currentUser()->id());
			$username = $user->get('name')->value;
			$projects = $this->getProjects($username);
			return array(
				'#theme' => 'indexSP2',
				'#projects' => $projects,
			);
		}
		  
		  
	}
	
   
 