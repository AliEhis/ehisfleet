<?php

include "../includes/functions.php";
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



echo "Am Here Guy";
//print_r($_POST);
exit;

}*/


foreach($_POST as $key => $value)
{
	
	

//echo " Name: ".$name." Rate:".$rate." ID: ".$value."<br>";
	$runQuery = mysql_query("SELECT * FROM staff WHERE id = '$value'")or die (mysql_error());


if ($runQuery)
{
	$showD = mysql_fetch_array($runQuery);
	?>
    <div class="close"> <img src="../images/close.png" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
    <div id="show_Staff_Details" style=" display:block; overflow:auto;">
<style>

#floatLeft
{
	width:50%;
	float:left;
}


.head
{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:16px;
	display:block;
	color:#FFF;
	font-weight:bolder;
	text-transform:uppercase;
	width:100%;
	background:#000000;
	padding:4px;
}

.body
{
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:16px;
	display:block;
	color:#FFF;
	width:100%;
	background:#666;
	padding:4px;
}
</style>
<div id="floatLeft" class="txtSpan" >

<div class="head">Surname</div>
<div class="body"><?=$showD['surname']?></div>

<div class="head">Other Name</div>
<div class="body"><?=$showD['oname']?></div>

<div class="head">Gender</div>
<div class="body"><?=$showD['sex']?></div>

<div class="head">Address</div>
<div class="body"><?=$showD['address']?></div>

<div class="head">Phone</div>
<div class="body"><?=$showD['phone']?></div>

<div class="head">Designation</div>
<div class="body"><?=$showD['designation']?></div>

<div class="head">Surname</div>
<div class="body"><?=$showD['surname']?></div>



</div>

<div id="floatLeft" ><img src="../images/mypic.png" width="148" height="148" /></div>

 
<!--<div id="loading"></div>
 <div id="msg">
    
    
    
</div> -->
 </div>
    
    <?php
//echo "Room has been Deleted"; 
}

//echo "Edit Was Successfull"; 
else { echo "Failed Entry"; }


}



