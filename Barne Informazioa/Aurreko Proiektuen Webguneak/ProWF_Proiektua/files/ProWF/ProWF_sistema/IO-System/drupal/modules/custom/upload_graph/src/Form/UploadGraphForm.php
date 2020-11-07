<?php

namespace Drupal\upload_graph\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;


/**
 * Our create project form class.
 */

class UploadGraphForm extends FormBase{
	
	/**
	 * {@inheritdoc}
	 */
	public function getFormId(){
		return 'upload_graph';
	}
	
	public function getProjectId($project_name){
		Database::setActiveConnection('process_db');
		$database = Database::getConnection();
		$result = $database->query("select * from projects where name='{$project_name}'");
		Database::setActiveConnection();
		return $result;
	}
	
	public function createProjectArtifact($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id){
		Database::setActiveConnection('process_db');
		$database = Database::getConnection();
		$result = $database->query("SELECT * FROM project_artifacts WHERE project_id = '{$project_id}' AND phase_id = '{$phase_id}' AND activity_id = '{$activity_id}' AND task_id = '{$task_id}' AND artifact_id = '{$artifact_id}' ");
		$row = $result->fetchAssoc();
		if(empty($row)){
			$start_date = date('Y-m-d H:i:s');
			$version = "1.0";
			$hours = 0;
			$database->query(
			"INSERT INTO project_artifacts 
			(`project_id`,`methodology_id`, `phase_id`, `activity_id`, `task_id`, `artifact_id`, `version`, `start_date`, `hours`) 
			VALUES ('{$project_id}', '{$methodology_id}','{$phase_id}', '{$activity_id}', '{$task_id}', '{$artifact_id}', '{$version}', '{$start_date}',{$hours})"
			);
		}
		Database::setActiveConnection();
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
	
	public function updateProjectArtifact($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id,$assessment_editor,$version,$hours){
					
		Database::setActiveConnection('process_db');
		$database = Database::getConnection();
		$database->query(
			"update project_artifacts 
			set version='{$version}',hours='{$hours}',assessment_editor='{$assessment_editor}'
			where project_id='{$project_id}' AND methodology_id='{$methodology_id}' AND phase_id='{$phase_id}' AND activity_id='{$activity_id}' AND task_id ='{$task_id}' AND artifact_id='{$artifact_id}'"
		);
		Database::setActiveConnection();
	}
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form,FormStateInterface $form_state){
		
		$project_name = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM THE URL
		$phase_id = \Drupal::request()->query->get('p_id'); //GET PHASE ID FROM THE URL
		$activity_id = \Drupal::request()->query->get('a_id'); //GET ACTIVITY ID FROM THE URL
		$task_id = \Drupal::request()->query->get('t_id'); //GET TASK ID FROM THE URL
		$artifact_id = \Drupal::request()->query->get('id'); //GET ARTIFACT ID FROM THE URL
		$aux = $this->getProjectId($project_name);
		$row = $aux->fetchAssoc();
		$project_id = $row['id'];
		$methodology_id = $row['methodology_id'];
		$this->createProjectArtifact($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id);
		$info = $this->getArtifactInfo($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id);
		//PONER LA INFO
		$result = explode(';',$info);
		
		$form['graphImage'] = [
		  '#type' => 'managed_file',
		  '#required' => TRUE,
		  '#title' => $this->t('Upload image'),
		  '#upload_location' => 'public://'. $project_name . '/docs/',
		  '#upload_validators' => [
			'file_validate_extensions' => ['png jpg jpeg'],
		  ],
		];
		
		$form['assessment_editor'] = [
		  '#type' => 'number',
		  '#required' => TRUE,
		  '#title' => $this->t('Your assessment:'),
		  '#prefix' => '<div style="display:table;margin:0 auto;"><div style="display: table-cell">',
		  '#suffix' => '</div>',
		  '#default_value' => $result[8],
		  '#attributes' => array(
  				'min' => '0',
  				'max' => '10',
				'step' => '1',
  			),
		];
		
		$form['version'] = [
		  '#type' => 'textfield',
		  '#required' => TRUE,
		  '#title' => $this->t('Version:'),
		  '#prefix' => '<div style="display: table-cell">',
		  '#suffix' => '</div>',
		  '#attributes' => array(
  				'placeholder' => $result[6],
  			),
		];
		
		$form['hours'] = [
		  '#type' => 'number',
		  '#required' => TRUE,
		  '#title' => $this->t('Dedicated hours:'),
		  '#prefix' => '<div style="display: table-cell">',
		  '#suffix' => '</div></div>',
		  '#attributes' => array(
  				'min' => '0',
				'step' => '1',
  				'placeholder' => $result[7],
  			),
		];
		

		
		$form['submit'] = [
			'#type' => 'submit',
			'#value' => t('Upload'),
		];
		
		return $form;		 
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state){	
		
		$project_name = \Drupal::request()->query->get('project'); //GET PROJECT NAME FROM THE URL
		$phase_id = \Drupal::request()->query->get('p_id'); //GET PHASE ID FROM THE URL
		$activity_id = \Drupal::request()->query->get('a_id'); //GET ACTIVITY ID FROM THE URL
		$task_id = \Drupal::request()->query->get('t_id'); //GET TASK ID FROM THE URL
		$artifact_id = \Drupal::request()->query->get('id'); //GET ARTIFACT ID FROM THE URL
		$aux = $this->getProjectId($project_name);
		$row = $aux->fetchAssoc();
		$project_id = $row['id'];
		$methodology_id = $row['methodology_id'];
		
		$form_file = $form_state->getValue('graphImage', 0);
		$file = File::load($form_file[0]);
		$file->setPermanent();
		$name = $file->getFilename();
		$file->save();
	
		Database::setActiveConnection('document_db');
		$database = Database::getConnection();
		$result = $database->query("UPDATE documents SET file_path='{$name}' WHERE project_id='{$project_id}' and id='{$artifact_id}'");
		$result->allowRowCount = TRUE;
		if ($result->rowCount() == 0) {
			$database->query("INSERT INTO `documents`(`project_id`, `id`, `file_path`) VALUES ({$project_id},{$artifact_id},'{$name}')");
		}
		Database::setActiveConnection();
		
		$assessment_editor = $form_state->getValue('assessment_editor');
		$version = $form_state->getValue('version');
		$hours = $form_state->getValue('hours');
		
		$this->updateProjectArtifact($project_id,$methodology_id,$phase_id,$activity_id,$task_id,$artifact_id,$assessment_editor,$version,$hours);
		
		drupal_flush_all_caches();
		
		drupal_set_message("Graph image uploaded");
	}
}