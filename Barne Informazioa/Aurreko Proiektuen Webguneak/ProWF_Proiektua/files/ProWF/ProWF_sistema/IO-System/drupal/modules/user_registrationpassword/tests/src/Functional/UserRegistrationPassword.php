<?php

namespace Drupal\Tests\user_registrationpassword\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Functionality tests for User registration password module.
 *
 * @group user_registrationpassword
 */
class UserRegistrationPassword extends BrowserTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = ['user_registrationpassword'];

  /**
   * Implements testRegistrationWithEmailVerificationAndPassword().
   */
  public function testRegistrationWithEmailVerificationAndPassword() {
    // Register a new account.
    $edit = [];
    $edit['name'] = $name = $this->randomMachineName();
    $edit['mail'] = $mail = $edit['name'] . '@example.com';
    $edit['pass[pass1]'] = $new_pass = $this->randomMachineName();
    $edit['pass[pass2]'] = $new_pass;
    $pass = $new_pass;
    $this->drupalPostForm('user/register', $edit, 'Create new account');
    $this->assertSession()->pageTextContains('A welcome message with further instructions has been sent to your email address.');

    // Load the new user.
    $accounts = \Drupal::entityQuery('user')
      ->condition('name', $name)
      ->condition('mail', $mail)
      ->condition('status', 0)
      ->execute();
    /** @var \Drupal\user\UserInterface $account */
    $account = \Drupal::entityTypeManager()->getStorage('user')->load(reset($accounts));

    // Configure some timestamps.
    // We up the timestamp a bit, else the check will fail.
    // The function that checks this uses the execution time
    // and that's always larger in real-life situations
    // (and it fails correctly when you remove the + 5000).
    $requestTime = \Drupal::time()->getRequestTime();
    $timestamp = $requestTime + 5000;
    $test_timestamp = $requestTime;
    $bogus_timestamp = $requestTime - 86500;

    // Check if the account has not been activated.
    $this->assertFalse($account->isActive(), 'New account is blocked until approved via email confirmation. status check.');
    $this->assertFalse($account->getLastLoginTime(), 'New account is blocked until approved via email confirmation. login check.');
    $this->assertFalse($account->getLastAccessedTime(), 'New account is blocked until approved via email confirmation. access check.');

    // Login before activation.
    $auth = [
      'name' => $name,
      'pass' => $pass,
    ];
    $this->drupalPostForm('user/login', $auth, 'Log in');
    $this->assertSession()->pageTextContains('The username ' . $name . ' has not been activated or is blocked.');

    // Timestamp can not be smaller then current. (== registration time).
    // If this is the case, something is really wrong.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$test_timestamp/" . user_pass_rehash($account, $test_timestamp));
    $this->assertSession()->pageTextContains('You have tried to use a one-time login link that has either been used or is no longer valid. Please request a new one using the form below.');

    // Fake key combi.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$timestamp/" . user_pass_rehash($account, $bogus_timestamp));
    $this->assertSession()->pageTextContains('You have tried to use a one-time login link that has either been used or is no longer valid. Please request a new one using the form below.');

    // Fake timestamp.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$bogus_timestamp/" . user_pass_rehash($account, $timestamp));
    $this->assertSession()->pageTextContains('You have tried to use a one-time login link that has either been used or is no longer valid. Please request a new one using the form below.');

    // Wrong password.
    $account_cloned = clone $account;
    $account_cloned->setPassword('boguspass');
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$timestamp/" . user_pass_rehash($account_cloned, $timestamp));
    $this->assertSession()->pageTextContains('You have tried to use a one-time login link that has either been used or is no longer valid. Please request a new one using the form below.');

    // Attempt to use the activation link.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$timestamp/" . user_pass_rehash($account, $timestamp));
    $this->assertSession()->pageTextContains('You have just used your one-time login link. Your account is now active and you are authenticated.');

    // Attempt to use the activation link again.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$timestamp/" . user_pass_rehash($account, $timestamp));
    $this->assertSession()->pageTextContains('You are currently authenticated as user ' . $account->getAccountName() . '.');

    // Logout the user.
    $this->drupalLogout();

    // Then attempt to use the activation link yet again.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$timestamp/" . user_pass_rehash($account, $timestamp));
    $this->assertSession()->pageTextContains('You have tried to use a one-time login link that has either been used or is no longer valid. Please request a new one using the form below.');

    // And then try to do normal login.
    $auth = [
      'name' => $name,
      'pass' => $pass,
    ];
    $this->drupalPostForm('user/login', $auth, 'Log in');
    $this->assertSession()->pageTextContains('Member for');
  }

  /**
   * Implements testPasswordResetFormResendActivation().
   */
  public function testPasswordResetFormResendActivation() {
    // Register a new account.
    $edit1 = [];
    $edit1['name'] = $name = $this->randomMachineName();
    $edit1['mail'] = $mail = $edit1['name'] . '@example.com';
    $edit1['pass[pass1]'] = $new_pass = $this->randomMachineName();
    $edit1['pass[pass2]'] = $new_pass;
    $this->drupalPostForm('user/register', $edit1, 'Create new account');
    $this->assertSession()->pageTextContains('A welcome message with further instructions has been sent to your email address.');

    // Request a new activation email.
    $edit2 = [];
    $edit2['name'] = $edit1['name'];
    $this->drupalPostForm('user/password', $edit2, 'Submit');
    $this->assertSession()->pageTextContains('Further instructions have been sent to your email address.');

    // Request a new activation email for a non-existing user name.
    $edit3 = [];
    $edit3['name'] = $this->randomMachineName();
    $this->drupalPostForm('user/password', $edit3, 'Submit');
    $this->assertSession()->pageTextContains($edit3['name'] . ' is not recognized as a username or an email address.');

    // Request a new activation email for a non-existing user email.
    $edit4 = [];
    $edit4['name'] = $this->randomMachineName() . '@example.com';
    $this->drupalPostForm('user/password', $edit4, 'Submit');
    $this->assertSession()->pageTextContains($edit4['name'] . ' is not recognized as a username or an email address.');
  }

  /**
   * Implements testLoginWithUrpLinkWhileBlocked().
   */
  public function testLoginWithUrpLinkWhileBlocked() {
    $timestamp = \Drupal::time()->getRequestTime() + 5000;

    // Register a new account.
    $edit = [];
    $edit['name'] = $name = $this->randomMachineName();
    $edit['mail'] = $mail = $edit['name'] . '@example.com';
    $edit['pass[pass1]'] = $new_pass = $this->randomMachineName();
    $edit['pass[pass2]'] = $new_pass;
    $this->drupalPostForm('user/register', $edit, 'Create new account');

    // Load the new user.
    $accounts = \Drupal::entityQuery('user')
      ->condition('name', $name)
      ->condition('mail', $mail)
      ->condition('status', 0)
      ->execute();
    /** @var \Drupal\user\UserInterface $account */
    $account = \Drupal::entityTypeManager()->getStorage('user')->load(reset($accounts));

    // Attempt to use the activation link.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$timestamp/" . user_pass_rehash($account, $timestamp));
    $this->assertSession()->pageTextContains(t('You have just used your one-time login link. Your account is now active and you are authenticated.'));

    $this->drupalLogout();

    // Block the user.
    $account
      ->setLastLoginTime(\Drupal::time()->getRequestTime())
      ->block()
      ->save();

    // Then try to use the link.
    $this->drupalGet("user/registrationpassword/" . $account->id() . "/$timestamp/" . user_pass_rehash($account, $timestamp));
    $this->assertSession()->pageTextContains('You have tried to use a one-time login link that has either been used or is no longer valid. Please request a new one using the form below.');

    // Try to request a new activation email.
    $edit2['name'] = $edit['name'];
    $this->drupalPostForm('user/password', $edit2, 'Submit');
    $this->assertSession()->pageTextContains($edit2['name'] . ' is blocked or has not been activated yet.');
  }

}
