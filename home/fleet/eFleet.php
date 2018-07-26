<?php

include_once "../includes/functions.php";

con();

header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web


	
	$make = $_POST['make'];//[$key];
	$regno = $_POST['regno'];//[$key];
	$type = $_POST['type'];//[$key];
	//$designation = $_POST['designation'];//[$key];
	$id = $_POST['sid'];
	$location = $_POST['location'];
	$driver = $_POST['driver'];
	$identity = $_POST['identity'];


//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$sql = mysql_query("UPDATE fleet SET make = '$make', regno = '$regno', type = '$type', location = '$location', driver = '$driver', identity = '$identity'  WHERE id = '$id'") or die (mysql_error());



if ($sql) { echo "$sname details has been updated, Continue?"; }
//echo "Edit Was Successfull"; 
//else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 