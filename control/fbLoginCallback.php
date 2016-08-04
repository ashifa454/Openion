<?
session_start();
require_once __DIR__ . '\facebook-php-sdk-v4/src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '241240472919683',
  'app_secret' => '5d80b6cbedda7bef45b553f8553a86a2',
  'default_graph_version' => 'v2.6',
]);
$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
}
?>