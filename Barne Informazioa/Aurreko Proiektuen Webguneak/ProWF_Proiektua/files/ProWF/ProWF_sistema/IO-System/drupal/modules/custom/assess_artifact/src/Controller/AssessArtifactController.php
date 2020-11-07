<?php 

	/**
	* @file
	* Contains \Drupal\assess_artifact\Controller\AssessArtifactController
	*/

	namespace Drupal\assess_artifact\Controller;
	use Drupal\Core\Database\Database;

	class AssessArtifactController{
		
	
			
		public function getArtifactInfo($project_id,$phase_id,$activity_id,$task_id,$artifact_id){
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			
			$result1 = $database->query(
			"select * from project_artifacts
			WHERE project_id='{$project_id}' and phase_id='{$phase_id}' and activity_id='{$activity_id}' and task_id='{$task_id}' and artifact_id='{$artifact_id}'"
			);
			
			$result2 = $database->query(
			"select * from artifacts
			WHERE id='{$artifact_id}'"
			);
			
			$result3 = $database->query(
			"select * from projects
			WHERE id='{$project_id}'"
			);
			
			$row1 = $result1 -> fetchAssoc();
			$row2 = $result2 -> fetchAssoc();
			$row3 = $result3 -> fetchAssoc();
			
			$assessment_editor = $row1['assessment_editor'];
			$artifact_name = $row2['name'];
			$project_name = $row3['name'];
			
			Database::setActiveConnection('document_db');
			$database = Database::getConnection();
			
			$result4 = $database->query(
			"select * from documents where project_id={$project_id} and id={$artifact_id}"
			);
			
			$row4 = $result4 -> fetchAssoc();
			
			$filename = $row4['file_path'];
			
			$aux = explode('.',$filename);
			
			$extension = $aux[1];
			
			$filepath = $project_name . '/docs/' . $filename;
			
			Database::setActiveConnection();
			
			$info = $project_id .';'. $phase_id .';'. $activity_id .';'. $task_id .';'. $artifact_id .';'. $artifact_name .';'. $assessment_editor .';'. $filepath .';'. $extension;
			
			return $info;
		}
	   
	   
		public function test(){
			$project_id = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM URL
			$phase_id = \Drupal::request()->query->get('p_id'); //GET PHASE ID FROM URL
			$activity_id = \Drupal::request()->query->get('a_id'); //GET ACTIVITY ID FROM URL
			$task_id = \Drupal::request()->query->get('t_id'); //GET TASK ID FROM URL
			$artifact_id = \Drupal::request()->query->get('id'); //GET ARTIFACT ID FROM URL
			
			$info = $this->getArtifactInfo($project_id,$phase_id,$activity_id,$task_id,$artifact_id);
			return array(
				'#theme' => 'indexAA',
				'#info' => $info,
			);
		}
		  
		  
	}
	
   
 