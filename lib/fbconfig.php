<?php
require 'lib/facebook/facebook.php';  // Include facebook SDK file
$facebook = new Facebook(array(
  'appId'  => '502879809833680',   // Facebook App ID 
  'secret' => '9c1c07be8d04747eaef0e81db1ff5e32',  // Facebook App Secret
  'cookie' => true,	
));
$fbuser = $facebook->getUser();
if ($fbuser) {
  try {
      $user_profile   = $facebook->api('/me');
  	  $fbid       = $user_profile['id'];        // To Get Facebook ID
 	    $fbuname    = $user_profile['username'];  // To Get Facebook Username
 	    $fbfullname = $user_profile['name'];      // To Get Facebook full name
	    $fbemail    = $user_profile['email'];     // To Get Facebook email ID
  } catch (FacebookApiException $e) {
    error_log($e);
   $fbuser = null;
  }
}
if ($fbuser) {
  $logoutUrl = $facebook->getLogoutUrl(array(
		 'next' => 'http://janjadevteam/coconut/logout.php',  // Logout URL full path
		));
} else {
 $loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'email', // Permissions to request from the user
		));
}
?>
