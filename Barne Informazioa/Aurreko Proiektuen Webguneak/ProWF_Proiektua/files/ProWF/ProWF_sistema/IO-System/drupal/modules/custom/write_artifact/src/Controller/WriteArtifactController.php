<?php 

	/**
	* @file
	* Contains \Drupal\write_artifact\Controller\WriteArtifactController
	*/

	namespace Drupal\write_artifact\Controller;
	use Drupal\Core\Database\Database;

	class WriteArtifactController{
		
		public function getProject($project_name){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select * from projects where name='{$project_name}'");
			Database::setActiveConnection();
			return $result;
		}
		
		public function createProjectArtifact($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("SELECT * FROM project_artifacts WHERE project_id = '{$project_id}' AND methodology_id='{$methodology_id}' AND phase_id = '{$phase_id}' AND activity_id = '{$activity_id}' AND task_id = '{$task_id}' AND artifact_id = '{$artifact_id}' ");
			$row = $result->fetchAssoc();
			if(empty($row)){
				$start_date = date('Y-m-d H:i:s');
				$version = "1.0";
				$hours = 0;
				$database->query(
				"INSERT INTO project_artifacts 
				(`project_id`,`methodology_id`, `phase_id`, `activity_id`, `task_id`, `artifact_id`, `version`, `start_date`, `hours`) 
				VALUES ('{$project_id}', '{$methodology_id}', '{$phase_id}', '{$activity_id}', '{$task_id}', '{$artifact_id}', '{$version}', '{$start_date}',{$hours})"
				);
			}
			Database::setActiveConnection();
		}
		
		public function getSections($methodology_id, $artifact_id){
			
			$sections = array();
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("SELECT * FROM artifact_sections WHERE methodology_id='{$methodology_id}' AND artifact_id='{$artifact_id}'");
			Database::setActiveConnection();
			
			while ($row = $result->fetchAssoc()){
				$aux = $row['section_number'] . ';' . $row['section_name'];
				array_push($sections,$aux);
			}	
			
			return $sections;
		}
		
		public function getSectionGuides($methodology_id, $artifact_id){
			
			$guides = array();
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("SELECT * FROM artifact_sections WHERE methodology_id='{$methodology_id}' AND artifact_id='{$artifact_id}'");
			Database::setActiveConnection();
			
			while ($row = $result->fetchAssoc()){
				$path = "public://" . $row['section_guide'];
				$content = file_get_contents($path);
				array_push($guides,$content);
			}	
			
			return $guides;
		}
		
		public function getSectionContents($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id){
			
			$contents = array();
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result1 = $database->query("SELECT * FROM artifact_sections WHERE methodology_id='{$methodology_id}' AND artifact_id='{$artifact_id}'");
			Database::setActiveConnection();
			
			Database::setActiveConnection('document_db');
			$database = Database::getConnection();
			
			while ($row = $result1->fetchAssoc()){
				$section_number = $row['section_number'];
				$result3 = $database->query("SELECT * FROM sections WHERE project_id='{$project_id}' AND document_id='{$artifact_id}' AND section_number LIKE {$section_number}");
				$row3 = $result3->fetchAssoc();
				$aux = $row3['content'];
				array_push($contents,$aux);
			}	
			
			Database::setActiveConnection();
			
			return $contents;
		}
		
		public function getArtifactInfo($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id){
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			
			//GET ROLE NAME
			$result2 = $database->query(
			"select r.name, r.id 
			from tasks as t 
			join roles as r on r.id=t.role 
			where t.methodology_id='{$methodology_id}' and t.phase_id='{$phase_id}' and t.activity_id='{$activity_id}' and t.id='{$task_id}'"
			);
			$row2 = $result2->fetchAssoc();
			$role = $row2['name'];
			
			//GET ARTIFACT NAME, PHASE NAME, ACTIVITY NAME, TASK NAME, START_DATE, VERSION, HOURS, ASSESSMENT 1, ASSESSMENT 2
			$result3 = $database->query(
				"SELECT art.name as artifact, p.name as phase, a.name as activity, t.name as task, p_a.start_date, p_a.version, p_a.hours, p_a.assessment_editor, p_a.assessment_supervisor
				FROM project_artifacts as p_a
				JOIN artifacts as art ON art.id = p_a.artifact_id 
				JOIN phases as p ON p.id = p_a.phase_id
				JOIN activities as a ON a.id = p_a.activity_id
				JOIN tasks as t ON t.id = p_a.task_id
				WHERE p_a.project_id='{$project_id}' and p_a.methodology_id='{$methodology_id}' and p_a.phase_id='{$phase_id}' and p_a.activity_id='{$activity_id}' and p_a.task_id='{$task_id}' and p_a.artifact_id='{$artifact_id}'"
			);
			$row3 = $result3->fetchAssoc();
			$artifact = $row3['artifact'];
			$phase = $row3['phase'];
			$activity = $row3['activity'];
			$task = $row3['task'];
			$start_date = $row3['start_date'];
			$version = $row3['version'];
			$hours = $row3['hours'];
			$assessment_editor = $row3['assessment_editor'];
			$assessment_supervisor = $row3['assessment_supervisor'];
			Database::setActiveConnection();
			
			$info = $artifact . ';' . $phase . ';' . $activity . ';' . $task . ';' . $role . ';' . $start_date . ';' . $version . ';' . $hours . ';' . $assessment_editor . ';' . $assessment_supervisor . ';'. $artifact_id . ';' . $project_id . ';' . $phase_id . ';' .$activity_id . ';' . $task_id; 
				
			return $info;
		}
	   
	   
		public function test(){
			$project_name = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM THE URL
			$phase_id = \Drupal::request()->query->get('p_id'); //GET PHASE ID FROM THE URL
			$activity_id = \Drupal::request()->query->get('a_id'); //GET ACTIVITY ID FROM THE URL
			$task_id = \Drupal::request()->query->get('t_id'); //GET TASK ID FROM THE URL
			$artifact_id = \Drupal::request()->query->get('id'); //GET ARTIFACT ID FROM THE URL
			$result = $this->getProject($project_name);
			$row = $result->fetchAssoc();
			$project_id = $row['id'];
			$methodology_id = $row['methodology_id'];
			$this->createProjectArtifact($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id);
			$sections = $this->getSections($methodology_id,$artifact_id);
			$guides = $this->getSectionGuides($methodology_id,$artifact_id);
			$contents = $this->getSectionContents($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id);
			$info = $this->getArtifactInfo($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id);
			return array(
				'#theme' => 'indexWA',
				'#sections' => $sections,
				'#guides' => $guides,
				'#contents' => $contents,
				'#info' => $info,
			);
		}
		  
		  
	}
	
   
 