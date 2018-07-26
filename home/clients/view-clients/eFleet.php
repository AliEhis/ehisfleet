<?php
include "../../includes/functions.php";
con();

header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web


	
	$name = $_POST['name'];//[$key];
	$phone = $_POST['phone'];//[$key];
	$address = $_POST['address'];//[$key];
	$type = $_POST['Type'];//[$key];
	$id = $_POST['sid'];//[$key];


//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$sql = mysql_query("UPDATE clients SET name = '$name', phone = '$phone', address= '$address', type = '$type' WHERE id = '$id'") or die (mysql_error());



if ($sql) { echo"$name details has been updated Continue"; }
//echo "Edit Was Successfull"; 
//else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 