<?php
require_once __DIR__ . '\facebook-php-sdk-v4/src/Facebook/autoload.php';
$linkData = [
  'link' => 'http://www.example.com',
  'message' => 'User provided message',
  ];
$fb = new Facebook\Facebook([
  'app_id' => '241240472919683',
  'app_secret' => '5d80b6cbedda7bef45b553f8553a86a2',
  'default_graph_version' => 'v2.5',
]);
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post('/me/feed', $linkData, '{access-token}');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Posted with id: ' . $graphNode['id'];
?>