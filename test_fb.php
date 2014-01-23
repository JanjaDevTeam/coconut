<?php
require_once('lib/janja.php');
require_once('lib/fbconfig.php');
?>

<?php if ($user): ?>
<img src="https://graph.facebook.com/<?php echo $user; ?>/picture"></li>
<p>Id: <?=$fbid?></p>
<p>User: <?=$fbuname?></p>
<p>Nome: <?=$fbfullname?></p>
<p>Email: <?=$fbemail?></p>
<br/>
<a href='logout.php'>Logout</a>
<?php else: ?>
<a href="<?php echo $loginUrl; ?>">Logar com facebook</a>
<?php endif ?>
