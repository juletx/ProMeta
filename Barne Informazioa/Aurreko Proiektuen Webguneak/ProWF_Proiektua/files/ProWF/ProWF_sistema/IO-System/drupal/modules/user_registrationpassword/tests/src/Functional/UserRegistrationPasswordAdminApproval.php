<?php

namespace Drupal\Tests\user_registrationpassword\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Functionality tests for User registration password module.
 *
 * @group user_registrationpassword
 */
class UserRegistrationPasswordAdminApproval extends BrowserTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = ['user_registrationpassword'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
  }

  /**
   * Implements testRegistrationWithAdminApprovalEmailVerificationAndPasswordAdmin().
   */
  public function testRegistrationWithAdminApprovalEmailVerificationAndPasswordAdmin() {

    $config = \Drupal::configFactory()->getEditable('user_registrationpassword.settings');
    $user_config = \Drupal::configFactory()->getEditable('user.settings');

    // Set variables like they would be set via configuration form.
    $config
      ->set('registration', USER_REGISTRATIONPASSWORD_VERIFICATION_PASS)
      ->save();
    $user_config
      ->set('register', USER_REGISTER_VISITORS_ADMINISTRATIVE_APPROVAL)
      ->set('verify_mail', TRUE)
      ->set('notify.register_pending_approval', TRUE)
      ->save();

    $this->drupalGet('user/register');
    $this->assertSession()->responseContains('edit-pass-pass1');
  }

}
