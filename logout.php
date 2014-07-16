<?php 
require 'lib/fbconfig.php';
$facebook->destroySession();  // to destroy facebook sesssion
$_SESSION = Null;
session_destroy();
header("Location: http://localhost/coconut/logar.php");
?>
