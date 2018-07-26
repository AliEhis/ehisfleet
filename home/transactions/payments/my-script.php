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

	$debit = 0.0;
	
	$acc;
	
	$cid = $_POST['clients_name'];//[$key];
	
	$rmk = $_POST['rmk'];
	$type = $_POST['type'];//[$key];
	$dates = $_POST['date'];
	$x = $_POST['amount'];
	$mode = $_POST['payment'];
	$ref = $_POST['fleet_no'];



	if  ($mode == 'Cash')
	{
		$acc = 200;
	}
	else
	{
		$acc = 400;
	}
	
	

	


//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

//amount 
#client_id 	
##rn 	
#dates
#remarks
	
$myId = $_COOKIE['id'];	//, pby = '$myId'	
	
$sql = mysql_query("INSERT INTO payment SET vendor = '$cid', amount = '$x', remarks = '$rmk', dates = '$dates', ref = '$ref', accountcode='$acc', pby = '$myId'	") or die (mysql_error());

//$id = mysql_insert_id();
//$myId = getRef($id);

if ($sql)
{
	//$update = mysql_query("UPDATE receipt SET rn = '$myId' WHERE id = '$id'")or die (mysql_error());



echo "Payment Completed";
 } ?>