<?php

/**
 * @file
 * User registration password tokens.
 */

use Drupal\Core\Render\BubbleableMetadata;

/**
 * Implements hook_token_info().
 */
function user_registrationpassword_token_info() {
  $user['registrationpassword-url'] = [
    'name' => t('Registration password URL'),
    'description' => t('URL to confirm registration.'),
    'restricted' => TRUE,
  ];

  return [
    'tokens' => ['user' => $user],
  ];
}

/**
 * Implements hook_tokens().
 */
function user_registrationpassword_tokens($type, $tokens, array $data, array $options, BubbleableMetadata $bubbleable_metadata) {
  $replacements = [];

  if ($type === 'user' && !empty($data['user'])) {
    /** @var \Drupal\user\UserInterface $account */
    $account = $data['user'];

    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'registrationpassword-url':
          $replacements[$original] = user_registrationpassword_confirmation_url($account);
          break;
      }
    }
  }
  return $replacements;
}
