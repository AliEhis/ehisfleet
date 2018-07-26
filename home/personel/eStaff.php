<?php

include_once "../includes/functions.php";

con();

header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web

/*$name = $_POST['sname'];
$pword = $_POST['pword'];
$uname = $_POST['uname'];
$alevel = $_POST['alevel'];*/

/*foreach($_POST as $key => $value)
{
	$key = mysql_real_escape_string($value);


	
//$sql = "INSERT INTO rooms (ref, type) VALUES ('$rN1', '$rT1'), ('$rN2', '$rT2'), ('$rN3', '$rT3');";
	
$incard = mysql_query("UPDATE room_type SET name = '$typeName', rate = '$typeRate' WHERE id = '$typeId'   ") or die(mysql_error());
///$incard2 = mysql_query("INSERT INTO rooms SET ref = '$rN1', type= '$rT1'") or die(mysql_error());
	
if ($incard) { echo"Edit Was Successfull"; }
else { echo "Failed Entry"; }

$incard = mysql_query("UPDATE room_type SET name = '$typeName', rate = '$typeRate' WHERE id = '$typeId'") or die(mysql_error());

if ($incard) { echo"Edit Was Successfull"; }
else { echo "Failed Entry"; }

}*/

	

//$results = '';
/*
foreach ($_POST as $key =>  $value) {
	
//echo parse_str($_GET, $value)."<br>";

//   echo $results .= "$data <br> = <br>$value;<br>";
//print_r($value);

//$$keys = mysql_real_escape_string($value);




var_dump($_POST);
exit;

}*/

//foreach($_POST['data'] as $key => $value)
//{
	
	
	$sname = $_POST['sname'];//[$key];
	$oname = $_POST['oname'];//[$key];
	$gender = $_POST['gender'];//[$key];
	$phone = $_POST['phone'];//[$key];
	if (empty($_POST['designation']))
	{$designation = $_POST['designation2']; 
	} else {
		$designation = $_POST['designation'];
	}
	//$designation = $_POST['designation'];//[$key];
	$id = $_POST['sid'];
	$address = $_POST['address'];


//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$sql = mysql_query("UPDATE staff SET surname = '$sname', oname = '$oname', sex = '$gender', phone = '$phone', designation = '$designation', address = '$address' WHERE id = '$id'") or die (mysql_error());



if ($sql) { echo "$sname details has been updated, Continue?"; }
//echo "Edit Was Successfull"; 
//else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 