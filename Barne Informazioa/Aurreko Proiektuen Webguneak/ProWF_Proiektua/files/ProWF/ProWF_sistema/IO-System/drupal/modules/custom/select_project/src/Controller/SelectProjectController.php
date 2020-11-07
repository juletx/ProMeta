<?php 

	/**
	* @file
	* Contains \Drupal\select_project\Controller\SelectProjectController
	*/

	namespace Drupal\select_project\Controller;
	use Drupal\Core\Database\Database;
	use Drupal\user\Entity\User;

	class SelectProjectController{
		
		
		public function getProjects($analyst_name){
			
			$projects = array();
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select name,start_date,version from projects where analyst_username='{$analyst_name}'");
			
			while($row = $result->fetchAssoc()){
				$project = $row['name'] . ';' . $row['start_date'] . ';' . $row['version'];
				array_push($projects,$project);
			}
			
			Database::setActiveConnection();
			
			return $projects;
			
		}
	   
	   
		public function test(){
			$goTo = \Drupal::request()->query->get('goTo'); 
			
			$user = User::load(\Drupal::currentUser()->id());
			$username = $user->get('name')->value;
			$projects = $this->getProjects($username);
			return array(
				'#theme' => 'indexSP',
				'#projects' => $projects,
				'#goTo' => $goTo
			);
		}
		  
		  
	}
	
   
 