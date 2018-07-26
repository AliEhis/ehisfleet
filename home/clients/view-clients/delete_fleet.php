<?php
include "../../includes/functions.php";
con();

header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web




foreach($_POST as $key => $value)
{
	
	

//echo " Name: ".$name." Rate:".$rate." ID: ".$value."<br>";
	$runQuery = mysql_query("DELETE FROM clients WHERE id = '$value'")or die (mysql_error());




//echo "Edit Was Successfull"; 



}



