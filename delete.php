
<?php
	require 'auth.php';
	
	$a = $_GET['a'];
	$b = $_GET['b'];
	$c = $_GET['c'];
	$delete = $obj_admin->delete($a,$b,$c);
	
	die("Deleted.");

?>
