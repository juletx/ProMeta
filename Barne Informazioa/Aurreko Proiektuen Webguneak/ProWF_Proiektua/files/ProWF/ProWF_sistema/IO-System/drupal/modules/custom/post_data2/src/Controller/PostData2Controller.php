<?php 

	/**
	* @file
	* Contains \Drupal\post_data2\Controller\PostData2Controller
	*/

	namespace Drupal\post_data2\Controller;
	use Drupal\Core\Database\Database;
	use \Mpdf\Mpdf;
	use Mpdf\MpdfException;

	class PostData2Controller{
		
		
		public function updateProjectArtifact($project_id,$phase_id,$activity_id,$task_id,$artifact_id){
			
			$assessment_supervisor = \Drupal::request()->request->get('assessment_supervisor'); 
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$database->query(
				"update project_artifacts 
				set assessment_supervisor='{$assessment_supervisor}'
				where project_id='{$project_id}' AND phase_id='{$phase_id}' AND activity_id='{$activity_id}' AND task_id ='{$task_id}' AND artifact_id='{$artifact_id}'"
			);
			Database::setActiveConnection();
		}
		
		public function getInfo($project_id,$phase_id,$activity_id,$task_id,$artifact_id){
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			
			//GET ROLE NAME
			$result2 = $database->query(
			"select r.name, r.id 
			from tasks as t 
			join roles as r on r.id=t.role 
			where t.phase_id='{$phase_id}' and t.activity_id='{$activity_id}' and t.id='{$task_id}'"
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
				WHERE p_a.project_id='{$project_id}' and p_a.phase_id='{$phase_id}' and p_a.activity_id='{$activity_id}' and p_a.task_id='{$task_id}' and p_a.artifact_id='{$artifact_id}'"
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
			
			$info = $artifact . ';' . $phase . ';' . $activity . ';' . $task . ';' . $role . ';' . $start_date . ';' . $version . ';' . $hours . ';' . $assessment_editor . ';' . $assessment_supervisor; 
				
			return $info;
		}
	
	   
		public function test(){
		   
		    $project_id = \Drupal::request()->query->get('project'); //GET PROJECT ID FROM URL
			$phase_id = \Drupal::request()->query->get('p_id'); //GET PHASE ID FROM URL
			$activity_id = \Drupal::request()->query->get('a_id'); //GET ACTIVITY ID FROM URL
			$task_id = \Drupal::request()->query->get('t_id'); //GET TASK ID FROM URL
			$artifact_id = \Drupal::request()->query->get('id'); //GET ARTIFACT ID FROM URL
			
			$this->updateProjectArtifact($project_id,$phase_id,$activity_id,$task_id,$artifact_id); //UPDATE project_artifacts TABLE
			$info = $this->getInfo($project_id,$phase_id,$activity_id,$task_id,$artifact_id);
			
			drupal_flush_all_caches();
			
			drupal_set_message('Artifact assessed');
			
			
			return array(
				'#theme' => 'indexPD2',
				'#info' => $info
	
			);
			
			
		}
		  
		  
	}

