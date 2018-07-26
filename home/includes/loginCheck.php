<?php
ob_start();
if(!isset($_COOKIE['id']))
	{
	
		header ("Location:http://localhost/fleet");
		echo " am here here";
	
	}
	
ob_end_flush();
?>