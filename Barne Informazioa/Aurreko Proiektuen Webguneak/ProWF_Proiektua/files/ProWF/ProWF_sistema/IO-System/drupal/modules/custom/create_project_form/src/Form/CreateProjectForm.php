<?php

namespace Drupal\create_project_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\user\Entity\User;
use Drupal\file\Entity\File;
use \Mpdf\Mpdf;
use Mpdf\MpdfException;


/**
 * Our create project form class.
 */

class CreateProjectForm extends FormBase{
	
	/**
	 * {@inheritdoc}
	 */
	public function getFormId(){
		return 'create_project_form';
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(array $form,FormStateInterface $form_state){
		
		$form['project_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t('Project name (no spaces)'),
			'#pattern' => '[A-Za-z0-9]{1,20}',
			'#required' => TRUE,
		];
		
		$form['description'] = [
			'#type' => 'textarea',
			'#title' => $this->t('Description'),
			'#required' => TRUE,
		];
		
		Database::setActiveConnection('process_db');
		$database = Database::getConnection();
		$result = $database->query("SELECT * FROM methodologies");
		Database::setActiveConnection();
		$options = array();
		while($row = $result->fetchAssoc()){
			$data = $row['id'].':'.$row['name'];
			$new_data = array($data => $data);
			$options = array_merge($options, $new_data);
		}
		
		$form['methodology_id'] = [
		  '#type' => 'select',
		  '#title' => $this->t("Methodology"),
		  '#options' => $options,
		  '#required' => TRUE,
		];
		
		$user = User::load(\Drupal::currentUser()->id());
		$username = $user->get('name')->value;
		$form['project_manager_username'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Project Manager's username"),
			'#default_value' => $username,
			'#disabled' => TRUE,
		];
		
		$form['project_manager_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Project Manager's name"),
			'#required' => TRUE,
		];
		
		
		$ids = \Drupal::entityQuery('user')
		->condition('status', 1)
		->condition('roles', 'project_analyst')
		->execute();
		$users = User::loadMultiple($ids);
		
		$options = array();
		foreach ($users as $userid){
			$username = $userid->get('name')->value;
			$new_data = array($username => $username);
			$options = array_merge($options, $new_data);
		}
		
		$form['analyst_username'] = [
		  '#type' => 'select',
		  '#title' => $this->t("Analyst's username"),
		  '#options' => $options,
		  '#required' => TRUE,
		];
		
		$form['analyst_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Analyst's name"),
			'#required' => TRUE,
		];
		
		$ids = \Drupal::entityQuery('user')
		->condition('status', 1)
		->condition('roles', 'project_quality_manager')
		->execute();
		$users = User::loadMultiple($ids);
		
		$options = array();
		foreach ($users as $userid){
			$username = $userid->get('name')->value;
			$new_data = array($username => $username);
			$options = array_merge($options, $new_data);
		}
		
		$form['quality_manager_username'] = [
		  '#type' => 'select',
		  '#title' => $this->t("Quality manager's username"),
		  '#options' => $options,
		  '#required' => TRUE,
		];
		
		$form['quality_manager_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Quality manager's name"),
			'#required' => TRUE,
		];
		
		
		$form['process_creator_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Process Creator's name"),
			'#required' => TRUE,
		];
		
		$form['architect_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Architect's name"),
			'#required' => TRUE,
		];
		
		$form['developer_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Developer's name"),
			'#required' => TRUE,
		];
		
		$form['tester_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Tester's name"),
			'#required' => TRUE,
		];
		
		$form['stakeholder_name'] = [
			'#type' => 'textfield',
			'#title' => $this->t("Stakeholder's name"),
			'#required' => TRUE,
		];
		
		
		$form['submit'] = [
			'#type' => 'submit',
			'#value' => $this->t('Create'),
		];
		
		return $form;		 
	}

	public function generatePDF($project_name,$description){
			
		$mpdf = new \Mpdf\Mpdf();
		
		$html=	'';
		
		$mpdf->SetHeader('Project: ' . $project_name . '||Last change: '. date('Y-m-d H:i:s')); //Header
		
		$mpdf->SetFooter('Document generated by ProWF||{PAGENO}'); //Footer
		
		$html .= '<h1 style="text-align: center;">' . $project_name . '</h1><br>'; //Main title - Document name
		
		$html .= '<p><b>Description: </b>' . $description . '</p><br>'; //Paragraph - Section content

		// Write HTML code into PDF
		$mpdf->WriteHTML($html);

		$filename = 'HomePage.pdf';
		$filepath = $project_name .'/docs/' . $filename ;
		
		// Output a PDF file directly to the browser
		$mpdf->Output('public://' . $filepath,'F');
	   
	}
	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state){
 
		$project_name = $form_state->getValue('project_name');
		$description = $form_state->getValue('description');
		$project_manager_name = $form_state->getValue('project_manager_name');
		$process_creator_name = $form_state->getValue('process_creator_name');
		$analyst_name = $form_state->getValue('analyst_name');
		$quality_manager_name = $form_state->getValue('quality_manager_name');
		$architect_name = $form_state->getValue('architect_name');
		$developer_name = $form_state->getValue('developer_name');
		$tester_name = $form_state->getValue('tester_name');
		$stakeholder_name = $form_state->getValue('stakeholder_name');
		
		$project_manager_username = $form_state->getValue('project_manager_username');
		$analyst_username = $form_state->getValue('analyst_username');
		$quality_manager_username = $form_state->getValue('quality_manager_username');
		
		$method_aux = $form_state->getValue('methodology_id');
		$aux = explode(':', $method_aux);
		$methodology_id = $aux[0];
		
		
		$start_date = date('Y-m-d H:i:s');
		$version = "1.0";
		
		$current_phase_id = 0;
		$current_activity_id = 0;
		$current_task_id = 0;
		
		Database::setActiveConnection('process_db');
		$database = Database::getConnection();
		$database->query("INSERT INTO projects (name, methodology_id, current_phase_id, current_activity_id, current_task_id, architect, analyst, analyst_username,process_creator,project_manager,project_manager_username,quality_manager,quality_manager_username,tester,developer,stakeholder,start_date,version,description) VALUES ('{$project_name}',{$methodology_id},{$current_phase_id},{$current_activity_id},{$current_task_id},'{$architect_name}', '{$analyst_name}','{$analyst_username}', '{$process_creator_name}','{$project_manager_name}','{$project_manager_username}','{$quality_manager_name}','{$quality_manager_username}','{$tester_name}','{$developer_name}','{$stakeholder_name}','{$start_date}','{$version}','{$description}')");
		$result = $database->query("SELECT * FROM projects WHERE name='{$project_name}'");
		$row = $result -> fetchAssoc();
		$project_id = $row['id'];
		Database::setActiveConnection();
		
		//Crear una carpeta publica con el nombre del proyecto.
		$new_folder = "public://" . $project_name . "/";
		file_prepare_directory($new_folder, FILE_CREATE_DIRECTORY);
		
		$docs_folder = $new_folder . "docs/";
		file_prepare_directory($docs_folder, FILE_CREATE_DIRECTORY);
		
		//Crea un archivo csv que se usara en el proceso.
		$filename = $project_id . "-ToDo.csv";
		$folder = "public://_ProzesuaKorritu/";
		
		$file = File::create([
		  'uid' => 1,
		  'filename' => $filename,
		  'uri' => $folder . $filename,
		  'status' => 1,
		]);
		$file->save();
		
		$dir = dirname($file->getFileUri());
		if (!file_exists($dir)) {
		  mkdir($dir, 0770, TRUE);
		}
		file_put_contents($file->getFileUri(), "");
		$file->save();
		
		$this -> generatePDF($project_name,$description);
		
		//Borra todas las caches
		drupal_flush_all_caches();
		//ALTERNATIVA PARA BORRAR SOLO EL CACHE DE LA VISTA PROJECTS (SIN PROBAR)
		//$view = \Drupal\views\Views::getView('your_view_name');
		//$view->storage->invalidateCaches();
		
		drupal_set_message('Project created and stored in the database');
	}
}