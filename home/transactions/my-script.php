<?php 
ob_start();
include "../includes/functions.php";
con();



header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web

	$debit = 0.0;
	$credit = 0.0;
	$acc;
	
	$cid = $_POST['clients_name'];//[$key];
	
	$rmk = $_POST['rmk'];
	$type = $_POST['type'];//[$key];
	$dates = $_POST['date'];
	$x = $_POST['amount'];
	$mode = $_POST['payment'];

	if ($type == 'Debit')
	{
		$debit = $x;
		$acc = 100;
		
	}
/*	else
	{
		;
		
	}*/
	
	elseif  ($type == 'Credit')
	{
		$credit = $x;
	
		$acc = 200;
	if  ($mode == 'Cash')
	{
		$acc = 200;
	}
	else
	{
		$acc = 400;
	}
	
	
	}
	
	


//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$myId = $_COOKIE['id'];
$sql = mysql_query("INSERT INTO transact SET client_id = '$cid', debit = '$debit', credit = '$credit', remarks = '$rmk', dates = '$dates',  	acountcode = '$acc', pby = '$myId' ") or die (mysql_error());



if ($sql){ echo "Transaction Completed....Please Wait";}
//echo "Edit Was Successfull"; 
//else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 