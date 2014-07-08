<?php 
require 'lib/fbconfig.php';
$facebook->destroySession();  // to destroy facebook sesssion
session_destroy();
header("Location: http://localhost/coconut/logar.php");
?>
