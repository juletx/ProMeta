<?php 

	/**
	* @file
	* Contains \Drupal\project_info\Controller\ProjectWebpageController
	*/

	namespace Drupal\project_info\Controller;
	use Drupal\Core\Database\Database;

	class ProjectInfoController{
		
		
		public function getProject($project_name){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select * from projects where name='{$project_name}'");
			Database::setActiveConnection();
			return $result;
		}

	   
		public function test(){
		   
			$project_name = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM THE URL
			$result = $this->getProject($project_name);
			$row = $result->fetchAssoc();
		  
			return array(
				'#theme' => 'index2',
				'#name' => $row['name'],
				'#description' => $row['description'],
				'#start_date' => $row['start_date'],
				'#end_date' => $row['end_date'],
				'#version' => $row['version'],
				'#project_manager' => $row['project_manager'],
				'#analyst' => $row['analyst'],
				'#process_creator' => $row['process_creator'],
				'#architect' => $row['architect'],
				'#developer' => $row['developer'],
				'#tester' => $row['tester'],
				'#stakeholder' => $row['stakeholder'],
			);
		}
		  
		  
	}
	
   
 