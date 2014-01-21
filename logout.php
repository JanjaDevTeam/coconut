<?php 
require 'lib/fbconfig.php';
$facebook->destroySession();  // to destroy facebook sesssion
session_destroy();
header("Location: http://janjadevteam.com/coconut/test_fb.php");
?>
