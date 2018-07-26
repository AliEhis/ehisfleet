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


	
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];//[$key];


	$designation = $_POST['designation'];
	$phone = $_POST['phone'];//[$key];
	$address = $_POST['address'];//[$key];
	$gender = $_POST['gender'];

$image="none";
$im=$_FILES['pic']['type'];

if(is_file($_FILES['pic']['tmp_name']) && $im =="image/jpeg")
{
include '../../includes/upic.php';
}

//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$sql = mysql_query("INSERT INTO staff SET surname = '$lname', oname = '$fname', designation='$designation', phone = '$phone', address = '$address', image= '$image', sex = '$gender'") or die (mysql_error());



if ($sql) { echo"$fname has been added to Staff List"; }
else {  echo "Query Failed"; }
//echo "Edit Was Successfull"; 
//else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 