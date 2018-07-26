<?php 
ob_start();
include "../../includes/functions.php";
con();



header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web

	
	$cname = $_POST['name'];//[$key];
	$phone = $_POST['phone'];//[$key];
	$address = $_POST['address'];
	$type = $_POST['Type'];//[$key];



//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$sql = mysql_query("INSERT INTO clients SET name = '$cname', phone = '$phone', address = '$address', type = '$type'") or die (mysql_error());



if ($sql) { echo"$cname has been added to Client list"; }
//echo "Edit Was Successfull"; 
//else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 