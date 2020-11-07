<?php 

	/**
	* @file
	* Contains \Drupal\select_artifact\Controller\SelectArtifactController
	*/

	namespace Drupal\select_artifact\Controller;
	use Drupal\Core\Database\Database;

	class SelectArtifactController{
		
		
		public function getArtifacts($project_id){
			
			$artifacts = array();
			
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			
			$result = $database->query(
				"select p_a.phase_id, p_a.activity_id, p_a.task_id,p_a.artifact_id, art.name as artifact_name, p_a.version, p_a.start_date, p_a.assessment_editor
				from project_artifacts as p_a 
				join artifacts as art on p_a.artifact_id=art.id 
				where p_a.assessment_supervisor is NULL and p_a.project_id={$project_id}"
			);
			
			while ($row = $result->fetchAssoc()){
				
				$dataAux = $project_id . ';' . $row['phase_id'] . ';' . $row['activity_id'] . ';' . $row['task_id'] . ';' . $row['artifact_id'] . ';' . $row['artifact_name'] . ';' . $row['version'] . ';' . $row['start_date'] . ';' . $row['assessment_editor'];
				array_push($artifacts,$dataAux);
			}
			
			Database::setActiveConnection();
			
			
			return $artifacts;
			
		}
	   
		public function test(){
			$project_id = \Drupal::request()->query->get('project'); //GET PROJECT ID FROM URL
			$artifacts = $this->getArtifacts($project_id);
			return array(
				'#theme' => 'indexSA',
				'#artifacts' => $artifacts,
			);
		}
		  
		  
	}
	
   
 