<?php

namespace Drupal\views_database_connector\Form;

use Drupal\Core\Database\Database;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Views Database Connector configuration form.
 */
class ViewsDatabaseConnectorConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'views_database_connector_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['views_database_connector.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('views_database_connector.settings');
    $dbs = array_keys(Database::getAllConnectionInfo());
    foreach ($dbs as $db) {
      $form[$db . '_enabled'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Make database "@database" available to Views Database Connector.', ['@database' => $db]),
        '#default_value' => (($config->get($db . '.enabled') == 0)) ? $config->get($db . '.enabled') : 1,
      ];
    }
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $dbs = array_keys(Database::getAllConnectionInfo());
    $config = $this->config('views_database_connector.settings');
    foreach ($dbs as $db) {
      $data_key = $db . '.enabled';
      $config->set($data_key, $form_state->getValue($db . '_enabled'));
    }
    $config->save();
    parent::submitForm($form, $form_state);
  }
}
