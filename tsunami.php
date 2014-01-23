<?php
require_once('model/database.php');

$db = new Database;

$handle = fopen ("db/schema.sql","r");
$sql = file_get_contents("db/schema.sql");
fclose($handle);

$stmt = $db->prepare($sql);
$stmt->execute();

echo 'Tsunami passou por aqui.';
?>
