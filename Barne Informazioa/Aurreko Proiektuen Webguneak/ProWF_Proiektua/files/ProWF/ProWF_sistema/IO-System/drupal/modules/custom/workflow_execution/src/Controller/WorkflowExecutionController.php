<?php 

	/**
	* @file
	* Contains \Drupal\workflow_execution\Controller\WorkflowExecutionController
	*/

	namespace Drupal\workflow_execution\Controller;
	use Drupal\Core\Database\Database;

	class WorkflowExecutionController{
		
		public function getProject($project_name){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select * from projects where name='{$project_name}'");
			Database::setActiveConnection();
			return $result;
		}
		
		public function getMethodology($id){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select * from methodologies where id='{$id}'");
			Database::setActiveConnection();
			return $result;
		}
		
		public function goNextTask($project_name){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select * from projects where name='{$project_name}'");
			$row = $result -> fetchAssoc();
			$project_id = $row['id'];
			$methodology_id = $row['methodology_id'];
			$currentPhase = $row['current_phase_id'];
			$currentActivity = $row['current_activity_id'];
			$currentTask = $row['current_task_id'];
			
			$finish_project = false;
			
			if($currentPhase==0 and $currentActivity==0 and $currentTask==0){
				//First task
				$currentPhase=1;
				$currentActivity=1;
				$currentTask=1;
			}else{
				//Set the end_date of the previous task's artifacts
				$end_date = date('Y-m-d H:i:s');
				$database->query("UPDATE `project_artifacts` 
				SET `end_date`= '{$end_date}'
				WHERE project_id='{$project_id}' and methodology_id='{$methodology_id}' and phase_id='{$currentPhase}' and activity_id='{$currentActivity}' and task_id='{$currentTask}'");
				
				//Go to the next task
				$currentTask++;
				$result = $database->query("select * from tasks where methodology_id='{$methodology_id}' and phase_id='{$currentPhase}' and activity_id='{$currentActivity}' and id='{$currentTask}' ");
				$row = $result -> fetchAssoc();
				if(empty($row)){
					$currentTask=1;
					$currentActivity++;
					$result = $database->query("select * from tasks where methodology_id='{$methodology_id}' and phase_id='{$currentPhase}' and activity_id='{$currentActivity}' and id='{$currentTask}' ");
					$row = $result -> fetchAssoc();
					if(empty($row)){
						$currentTask=1;
						$currentActivity=1;
						$currentPhase++;
						$result = $database->query("select * from tasks where methodology_id='{$methodology_id}' and phase_id='{$currentPhase}' and activity_id='{$currentActivity}' and id='{$currentTask}' ");
						$row = $result -> fetchAssoc();
						if(empty($row)){
							$currentPhase=-1;
							$currentActivity=-1;
							$currentTask=-1;
							$path = "public://_ProzesuaKorritu/";
							$filename = $path . $project_id . "-ToDo.csv";
							unlink($filename);
							$finish_project = true;
						}
					}
				}
				
			}
			
			if ($finish_project==true){
				$database->query("UPDATE `projects` SET `current_phase_id`='{$currentPhase}',`current_activity_id`='{$currentActivity}',`current_task_id`='{$currentTask}', `end_date`='{$end_date}' WHERE id='{$project_id}' and methodology_id='{$methodology_id}' ");
			}else{
				$database->query("UPDATE `projects` SET `current_phase_id`='{$currentPhase}',`current_activity_id`='{$currentActivity}',`current_task_id`='{$currentTask}' WHERE id='{$project_id}' and methodology_id='{$methodology_id}' ");
			}
			Database::setActiveConnection();
		}
		
		public function getTaskInfo($methodology_id, $currentPhase, $currentActivity, $currentTask){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("select p.name as phase,a.name as activity,t.name as task,r.name as role from phases as p
				join activities as a on a.phase_id=p.id
				join tasks as t on t.phase_id=p.id and t.activity_id=a.id
				join roles as r on t.role=r.id
				where r.methodology_id='{$methodology_id}' and p.methodology_id='{$methodology_id}' and p.id='{$currentPhase}' and a.id='{$currentActivity}' and t.id='{$currentTask}'");
			Database::setActiveConnection();
			$row = $result -> fetchAssoc();
			$task_info = $row['phase'] . ';' . $row['activity'] . ';' . $row['task'] . ';' . $row['role'];
			return $task_info;
		}
		
		public function getProjectArtifacts($project_id, $methodology_id, $currentPhase, $currentActivity, $currentTask){
			Database::setActiveConnection('process_db');
			$database = Database::getConnection();
			$result = $database->query("SELECT a.name,p.version,p.start_date,p.hours,p.assessment_editor,p.assessment_supervisor 
			FROM project_artifacts as p 
			JOIN artifacts as a on a.id=p.artifact_id
			WHERE p.project_id='{$project_id}' and p.methodology_id='{$methodology_id}' and p.phase_id='{$currentPhase}' and p.activity_id='{$currentActivity}' and p.task_id='{$currentTask}'");
			Database::setActiveConnection();
			
			$project_artifacts = array();
			
			while($row = $result -> fetchAssoc()){
				$artifact = $row['name'] . ';' . $row['version'] . ';' . $row['start_date'] . ';' . $row['hours'] . ';' . $row['assessment_editor'] . ';' . $row['assessment_supervisor'];
				array_push($project_artifacts,$artifact);
			}
			
			return $project_artifacts;
		}
	   
		public function test(){
			
			$next = \Drupal::request()->query->get('next');
			$project_name = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM THE URL
			
			if($next=="yes"){
				$this->goNextTask($project_name);
			}
			
			$result = $this->getProject($project_name);
			$row = $result -> fetchAssoc();
			$project_id = $row['id'];
			$methodology_id = $row['methodology_id'];
			$currentPhase = $row['current_phase_id'];
			$currentActivity = $row['current_activity_id'];
			$currentTask = $row['current_task_id'];
			
			$result = $this->getMethodology($methodology_id);
			$row = $result -> fetchAssoc();
			$method = $row['name'] . ';' . $row['version'];
			
			$current_task = '';
			$project_artifacts = '';
			
			if($currentPhase==0 and $currentActivity==0 and $currentTask==0){
				$func = "initiate"; //INITIATE LIFECYCLE
			}else if($currentPhase==-1 and $currentActivity==-1 and $currentTask==-1){
				$func = "finished"; //LIFECYCLE FINISHED
			}else{
				$func = "execute"; //LIFECYLCE IS ALREADY INITIATED
				$current_task = $this->getTaskInfo($methodology_id, $currentPhase, $currentActivity, $currentTask);
				$project_artifacts = $this->getProjectArtifacts($project_id, $methodology_id, $currentPhase, $currentActivity, $currentTask);
				drupal_set_message('Please, execute _DFS_Hurrengo_Artefaktuak_Sakoneran_bin-exe.bat to update the outstanding artifacts from the current task');
			}
			
			
			//system("cmd /c C:\xampp\htdocs\drupal\sites\default\files\_ProzesuaKorritu\_DFS_Hurrengo_Artefaktuak_Sakoneran_bin-exe.bat");
			//exec('C:\Windows\system32\cmd.exe /c START C:\xampp\htdocs\drupal\sites\default\files\_ProzesuaKorritu\_DFS_Hurrengo_Artefaktuak_Sakoneran_bin-exe.bat');
			//shell_exec("C:\Windows\system32\cmd.exe /c C:\xampp\htdocs\drupal\sites\default\files\_ProzesuaKorritu\_DFS_Hurrengo_Artefaktuak_Sakoneran_bin-exe.bat");
			
			return array(
				'#theme' => 'indexWE',
				'#func' => $func,
				'#method' => $method,
				'#current_task' => $current_task,
				'#project' => $project_name,
				'#project_artifacts' => $project_artifacts,
			);
		}
		  
		  
	}
	
   
 