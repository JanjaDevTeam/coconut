<?php
require_once('lib/janja.php');
if(isset($_GET['code'])) {
	require_once('lib/fbconfig.php');
	if(isset($user)) {
		$_SESSION['fb']['fbid'] = $fbid;
		$_SESSION['fb']['fbuname'] = $fbuname;
		$_SESSION['fb']['fbfullname'] = $fbfullname;
		$_SESSION['fb']['fbemail'] = $fbemail;
		$_SESSION['fb']['user'] = $user;
		
	}
}

$data['selecionado'] = 'logar';

//Janja::loadTemplate('main', 'logar', $data);
Janja::loadTemplate('main', 'logar', $data);
?>
