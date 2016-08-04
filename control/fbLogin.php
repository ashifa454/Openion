<?php
# login.php
session_start();
require_once __DIR__ . '\facebook-php-sdk-v4/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '241240472919683',
  'app_secret' => '5d80b6cbedda7bef45b553f8553a86a2',
  'default_graph_version' => 'v2.6',
]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://http://www.openion.korridorindia.com//login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>