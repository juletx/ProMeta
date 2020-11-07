<?php

namespace Drupal\Tests\user_registrationpassword\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\Core\Url;
use Drupal\Component\Utility\SafeMarkup;
use Drupal\Component\Render\FormattableMarkup;
use Drupal\system\Tests\Cache\PageCacheTagsTestBase;
use Drupal\user\Entity\User;
use Drupal\Core\Test\AssertMailTrait;

/**
 * Functionality tests for User registration password module privacy feature.
 *
 * @group user_registrationpassword
 */
class UserRegistrationPasswordUserPasswordResetForm extends BrowserTestBase {

  use AssertMailTrait {
    getMails as drupalGetMails;
  }

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = [
    'user_registrationpassword',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    global $base_url;
    $this->base_url = $base_url;
  }

  /**
   * Implements testUserRegistrationPasswordUserPasswordResetForm().
   */
  public function testUserRegistrationPasswordUserPasswordResetForm() {
    // Register a new account.
    $edit1 = [];
    $edit1['name'] = $name = $this->randomMachineName();
    $edit1['mail'] = $mail = $edit1['name'] . '@example.com';
    $edit1['pass[pass1]'] = $new_pass = $this->randomMachineName();
    $edit1['pass[pass2]'] = $new_pass;
    $this->drupalPostForm('user/register', $edit1, 'Create new account');
    $this->assertText('A welcome message with further instructions has been sent to your email address.', 'User registered successfully.');

    // Request a new activation email.
    $edit2 = [];
    $edit2['name'] = $edit1['name'];
    $this->drupalPostForm('user/password', $edit2, 'Submit');
    $this->assertText('Further instructions have been sent to your email address.', 'Password reset form submitted successfully.');

    $_emails = $this->getMails();
    $email = end($_emails);
    $this->assertNotEmpty($email['subject']);
    $this->assertNotEmpty($email['body']);
    $this->assertNotEqual($email['send'], 0);
  }

}
