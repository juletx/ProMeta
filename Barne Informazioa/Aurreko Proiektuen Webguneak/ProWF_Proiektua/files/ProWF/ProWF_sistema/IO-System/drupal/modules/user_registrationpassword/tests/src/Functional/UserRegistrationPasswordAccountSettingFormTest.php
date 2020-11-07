<?php

namespace Drupal\Tests\user_registrationpassword\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Functionality tests for User registration password module: admin form.
 *
 * @group user_registrationpassword
 */
class UserRegistrationPasswordAccountSettingFormTest extends BrowserTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = ['user_registrationpassword'];

  /**
   * User with administer account settings privileges.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $adminUser;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->adminUser = $this->drupalCreateUser(['administer account settings']);
    $this->drupalLogin($this->adminUser);
  }

  /**
   * Test the working of the option list provided by this module.
   */
  public function testRegisterFormOption() {
    $this->drupalGet('admin/config/people/accounts');

    foreach ([USER_REGISTRATIONPASSWORD_NO_VERIFICATION,
      USER_REGISTRATIONPASSWORD_VERIFICATION_DEFAULT,
      USER_REGISTRATIONPASSWORD_VERIFICATION_PASS,
    ] as $option) {
      $edit = [];
      $edit['user_registrationpassword_registration'] = $option;
      $this->drupalPostForm('admin/config/people/accounts', $edit, t('Save configuration'));

      $this->assertSession()->pageTextNotContains(t('An illegal choice has been detected. Please contact the site administrator.'));
      $this->assertSession()->pageTextContains(t('The configuration options have been saved.'));

      $config = $this->config('user_registrationpassword.settings');
      if ($config->get('registration') == $option) {
        $this->assertTrue(TRUE, 'Registration option is set correctly.');
      }
      else {
        $this->assertTrue(FALSE, 'Registration option is not set correctly.');
      }
    }
  }

}
