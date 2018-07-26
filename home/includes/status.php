<?php
include_once "functions.php";
con();

$staff = $_COOKIE['id'];


$chksc = mysql_query("SELECT * FROM admin WHERE id = '$staff'") or die(mysql_error());
//	$nms = mysql_num_rows($chksc);
		$nms = mysql_fetch_array($chksc);
		
		$st = showName($nms['staff_id']);
?>
logged in as <?=$st?> <a href="http://localhost/fleet/loginScript.php?o">Logout ?</a>