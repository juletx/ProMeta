<?php 

	/**
	* @file
	* Contains \Drupal\outstanding_tasks\Controller\OutstandingTasksController
	*/

	namespace Drupal\outstanding_tasks\Controller;
	use Drupal\Core\Database\Database;

	class OutstandingTasksController{
		
		public function getProjectId($project_name){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select * from projects where name='{$project_name}'");
			Database::setActiveConnection();
			$row = $result -> fetchAssoc();
			return $row['id'];
		}
		
		public function getArtifacts($project_id,$project_name){
			
			$artifacts = array();
			$path = "public://_ProzesuaKorritu/";
			$file = fopen($path . $project_id . "-ToDo.csv", "r");
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$auxId = ''; 
			fgetcsv($file, ",");
			while (($data = fgetcsv($file, ",")) == true){
					$num = count($data); //CSV: Project[0];Methodology[1];Phase[2];Activity[3];Task[4];Role[5];Artifact[6];Type[7];
					for ($row = 0; $row < $num; $row++){
						$result = explode(';',$data[$row]);
						if($auxId != $result[6]){
							$auxId = $result[6];
							$artifact_id = $result[6];
							$role_id = $result[5];
							$db_result1 = $database->query("select * from artifacts where id='{$artifact_id}'");
							$db_result2 = $database->query("select * from roles where id='{$role_id}'");
							$row = $db_result1->fetchAssoc();
							$row2 = $db_result2->fetchAssoc();
							$dataAux = $artifact_id . ';' . $row['name'] . ';' . $role_id . ';' . $row2['name'] . ';' . $result[2] . ';' . $result[3] . ';' . $result[4]. ';' . $result[7] . ';' . $project_name;
							//0: artifact_id  
							//1: artifact_name
							//2: role_id  
							//3: role_name
							//4: phase_id  
							//5: activity_id
							//6: task_id  
							//7: type
							//8: project_name
							array_push($artifacts,$dataAux);
						}
							
					}
					
				
			}
			Database::setActiveConnection();
			fclose($file);
			return $artifacts;
			
		}
	   
		public function test(){
			$project_name = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM THE URL
			$project_id = $this->getProjectId($project_name);
			$artifacts = $this->getArtifacts($project_id,$project_name);
			return array(
				'#theme' => 'indexOT',
				'#artifacts' => $artifacts,
			);
		}
		  
		  
	}
	
   
 