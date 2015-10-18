

<?php
require 'facebook.php';
$fbconfig['appUrl'] = "The full url of your app on Facebook goes here";
// Create An instance of our Facebook Application.
$facebook = new Facebook(array(
  'appId'  => '425506170843495',
  'secret' => 'eee29f0445ce375cfb93c4bf801803a6',
  'cookies' => 'true',
));
// Get the app User ID
$user = $facebook->getUser();
if ($user) {
     try {
      // If the user has been authenticated then proceed
      $user_profile = $facebook->api('/me');
     } catch (FacebookApiException $e) {
      error_log($e);
      $user = null;
     }
}
// If the user is authenticated then generate the variable for the logout URL
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
?>
<html>
<body>
<h1>Hello World</h1>
</body>
</html>
<!-- Insert Logged in HTML here -->
<?php
} else {
  $loginUrl = $facebook->getLoginUrl();
}
?>