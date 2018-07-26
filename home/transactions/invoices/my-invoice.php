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

	
	$cname = $_POST['clients_name'];//[$key];
	$trucks = $_POST['trucks'];//[$key];
	$rate = $_POST['rate'];
	$trips = $_POST['trips'];//[$key];
	$cargo = $_POST['cargo'];
	$info = $_POST['note'];
	$tax = $_POST['tax'];
	$taxAmount = $_POST['taxAmount'];
	$amount = $_POST['amount'];
	$total = $_POST['totalCost'];
	$date = $_POST['date'];
	
	$truckss = $_POST['truckss'];
	$truck = $_POST['truck'];
	
	
	


//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$miId = $_COOKIE['id'];	// pby = '$myId'

$sql = mysql_query("INSERT INTO invoices SET 
	nots = '$trucks',
	trips = '$trips',
	rate  = '$rate',
	info  = '$info',
	cargo = '$cargo',
	client = '$cname',
	tax = '$taxAmount',
	amount = '$total', 
	pby = '$miId',
	dates = '$date'

") or die (mysql_error());


$id = mysql_insert_id();
$myId = getRef($id);

if ($sql) { 

$sqls = mysql_query("UPDATE invoices SET ref = '$myId'") or die (mysql_error());
?>


<html>
<style media="all">
.divB
{
	
	width:658px;
	background:#E2E2E2;
	color:#000033;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-weight:bolder;
	padding:10px;
}
.header
{
	width:678px;
	height:201px;
	display:block;
	margin-bottom:10px;
}
.Logo
{
	width:305px;
	height:30px;
	display:block;
	float:left;
}

.Name
{
	width:373px;
	height:30px;
	float:left;
	display:block;
	float:left;
	text-align:right;
}

.headLeft
{
	width:454px;

	padding:10px;
	background:#CCC;
	color:#000;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	float:left;
	font-weight:bolder;
		border-bottom:1px solid #000;margin-top:5px;
}


.headLeftContent
{
	width:454px;

	padding:10px;
	color:#000;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	float:left;
margin-top:5px;
}

.clear
{
	clear:both;
}

.deadRight
{
	width:184px;

	padding:10px;
	background:#CCC;
	color:#000;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	float:left;
	font-weight:bolder;
	border-bottom:1px solid #000;margin-top:5px;
}


.deadRightContent
{
	width:184px;

	padding:10px;
	color:#000;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	float:left;margin-top:5px;
}



.three_col ul
{
	margin:0; padding:0;
}

.three_col ul li:lastchild
{
	border-left:1px solid #000;
}

.three_col ul li:firstchild
{
	border-left:none;
}
.three_col ul li
{
	background:#CCCCCC;	
	color:#000;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	float:left;
	width:215px;
	height:15px;
	padding:5px;
	border-bottom:1px solid #000;
	border-left:1px solid #000;
	font-weight:bolder;
	list-style:none;
	margin-top:5px;font-size:13px;
	line-height:20px;
}

.three_col ul li.body
{
	color:#000;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:12px;
	line-height:20px;
	float:left;
	width:215px;
	
	padding:5px;
	border-bottom:1px solid #000;
	background:none;
	list-style:none;
	

	
}


#borderLeft
{
	border-left:1px solid #000;
}
.content
{
	width:678px;
	display:block;
	margin-top:20px;
	border-top:1px solid #000;
}
.divC

{
	height:10px;
	width:658px;
	padding:10px;
	display:block;
	background:#CCCCCC;
	border-bottom:1px solid #000;
	color:#000033;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	font-weight:bolder;margin-top:5px;
}
.row
{
	width:658px;
	height:10px;
	background:#000000;
	color:#FFF;
	font-family:Tahoma, Geneva, sans-serif;
	font-size:12px;
	text-transform:uppercase;
	padding:10px;
}
</style>
<body onLoad="javascript:window.print()">



<div style="width:700px; height:600px; background:#FFF; border:1px solid #000; padding:10px 5px 10px 20px; color:#000; margin:auto">
<!-- Header -->
<div class="header">
  <div class="Logo"><strong>Invoice For</strong> </div>
<div class="Name"><?=showLogo();?><br />
<?=comName()?></div>
<!-- Header -->
<div class="clear"></div>
<!-- Title -->
<div class="Logo">
  <p>
    <?=showClientDetails($cname)?> 
  </p>
  <p><strong>Invoice No.</strong>
    <?=$myId?>
 </p>
</div>
<div class="Name"></div>
<div class="clear"></div>
<!-- Title -->
<!-- Body --><br />
<br />
<br clear="all" />
</div>
<div class="content">

<div class="headLeft">Cargo</div>
<div class="deadRight">₦ Amount</div>
<!-- Body Content -->
<div class="clear"></div>
<div class="headLeftContent">
  <?=$cargo?>
</div>
<div class="deadRightContent"><span class="textcenter">
  <?=doNum($x)?>
</span></div>
<div class="three_col">
<ul>
<li>Description</li>
<li id="borderLeft">Trucks</li>
<li id="borderLeft">₦ Rate</li>

<li class="body">
  <?=$info?>
</li>
<li class="body" id="borderLeft">
  <?=$trucks?>
</li>
<li class="body" id="borderLeft">
  <?=$rate?>
</li>
</ul>
</div>







<br clear="all" />

<div class="headLeft">Invoice Date</div>
<div class="deadRight">No of Trips</div>
<!-- Body Content -->
<div class="clear"></div>
<div class="headLeftContent">
  <?=$dates?>
</div>
<div class="deadRightContent"><span class="textcenter">
  <?=$trips?>
</span></div><br clear="all" />



<div class="clear"></div>
<!-- Body Content -->
<div class="clear"></div>
<div class="clear"></div>
<br clear="all" />

<div class="divC">
Amount in Words
</div>
<br clear="all" />

<div class="divB"><?php 
	   $obj = new toWords($total, 'Naira, ', ' Kobo');
echo ucwords($obj->words); 
//echo $obj->number; 
	  ?></div>

<div ></div>
<br clear="all" />
</div>
</div>

   
</body></html>
          



<?php

//$typess
$car= array();
$car=explode("|", $truck);

for($x=1;$x<=count($car);$x++)
{
$car_no=$car[$x];
$sql = mysql_query("INSERT INTO fhistory SET regNo = '$car_no', 	rate = '$rate', vat='$tax', date = '$date', info = '$info', trips = '$trips'")or die (mysql_error());
}

//echo "Invoice Created"; 
//include "invoice.php";
}
//echo "Edit Was Successfull"; 
//else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 