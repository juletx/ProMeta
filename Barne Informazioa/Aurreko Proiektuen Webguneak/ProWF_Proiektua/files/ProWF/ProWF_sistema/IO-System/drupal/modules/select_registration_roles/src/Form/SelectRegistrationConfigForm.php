<?php

/**
 * @file
 * Contains \Drupal\select_registration_roles\Form\SelectRegistrationConfigForm.
 */

namespace Drupal\select_registration_roles\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;


class SelectRegistrationConfigForm extends ConfigFormBase {

  /*
  **
  * Returns a unique string identifying the form.
  *
  * @return string
  *   The unique string identifying the form.
  */
  public function getFormId() {
    return 'select_registration_roles_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */

  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('select_registration_roles.settings');
    //$roles = select_registration_roles_get_all_roles();
    $default_value = array();
    $roles = select_registration_roles_all_roles(true);

    if($config->get('select_registration_roles_setby_admin')){
      $value_select_registration_roles_setby_admin = $config->get('select_registration_roles_setby_admin');
    }else{
      $value_select_registration_roles_setby_admin = $default_value;
    }
    $form['select_registration_roles_setby_admin'] = array(
      '#type' => 'checkboxes',
      '#title' => t('Roles'),
      '#options' => $roles,
      '#description' => t("Select roles that will be displayed on registration form"),
      '#default_value' => $value_select_registration_roles_setby_admin,
    );
    $roles = select_registration_roles_all_roles(true);
    if($config->get('select_registration_roles_admin_approval')){
      $value_select_registration_roles_admin_approval = $config->get('select_registration_roles_admin_approval');
    }else{
      $value_select_registration_roles_admin_approval = $default_value;
    }
    $form['select_registration_roles_admin_approval'] = array(
      '#type' => 'checkboxes',
      '#title' => t('Approval Roles'),
      '#options' => $roles,
      '#description' => t("Select roles that need admin approval"),
      '#default_value' => $value_select_registration_roles_admin_approval,
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save configuration'),
      '#button_type' => 'primary',
    );
    // By default, render the form using theme_system_config_form().
    $form['#theme'] = 'system_config_form';
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Set & save the configuration : get the $config object.
    $config = $this->config('select_registration_roles.settings');
   // Set simple value key / value.
    $config->set('select_registration_roles_setby_admin', $form_state->getValue('select_registration_roles_setby_admin'));
    $config->set('select_registration_roles_admin_approval', $form_state->getValue('select_registration_roles_admin_approval'));
    $config->save();
    drupal_set_message($this->t('The configuration options have been saved.'));
  }

  /**
   * Gets the configuration names that will be editable.
   *
   * @return array
   *   An array of configuration object names that are editable if called in
   *   conjunction with the trait's config() method.
   */
  protected function getEditableConfigNames() {
    return ['select_registration_roles.settings'];
  }

    function filterRoles($roles)
    {
        $final_roles = array();
        foreach ($roles as $role_id => $role_name) {
            if ($role_name!= 0) {
                $final_roles[$role_id] = $role_name;
            }
        }
        return $final_roles;
    }

}