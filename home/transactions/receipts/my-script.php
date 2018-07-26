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
	
	
$miId = $_COOKIE['id'];	// pby = '$myId'
$sql = mysql_query("INSERT INTO receipt SET client_id = '$cid', amount = '$x', remarks = '$rmk', dates = '$dates', pby = '$miId'") or die (mysql_error());

$id = mysql_insert_id();
$myId = getRef($id);

if ($sql)
{
	$update = mysql_query("UPDATE receipt SET rn = '$myId' WHERE id = '$id'")or die (mysql_error());

$sqlT = mysql_query("INSERT INTO transact SET client_id = '$cid', debit = '$debit', credit = '$x', remarks = '$rmk', dates = '$dates',  	acountcode = '$acc', pby = '$myId' ") or die (mysql_error());

if ($sqlT)
{ 

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
	height:15px;
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
  <div class="Logo"><strong>Receipt For</strong> </div>
<div class="Name"><?=showLogo();?><br />
<?=comName()?></div>
<!-- Header -->
<div class="clear"></div>
<!-- Title -->
<div class="Logo">
  <p>
    <?=showClientDetails($cid)?> 
  </p>
  <p><strong>Receipt No.</strong>
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
<div class="headLeft">Description</div>
<div class="deadRight">Amount</div>
<!-- Body Content -->
<div class="clear"></div>
<div class="headLeftContent">
  <?=$rmk?>
</div>
<div class="deadRightContent"><span class="textcenter">
  <?=doNum($x)?>
</span></div>
<div class="clear"></div>
<!-- Body Content -->
<div class="row">
Transactions Details
</div>
<div class="clear"></div>
<div class="three_col">
<ul>
<li>Transaction Date</li>
<li id="borderLeft">Payment Mode</li>
<li id="borderLeft">Transaction ID</li>

<li class="body">
  <?=$dates?>
</li>
<li class="body" id="borderLeft">
  <?=doNum($x)?>
</li>
<li class="body" id="borderLeft">
  <?=$myId?>
</li>
</ul>
</div>

<div class="clear"></div>
<br clear="all" />

<div class="divC">
Amount in Words
</div>
<br clear="all" />

<div class="divB"><?php 
	   $obj = new toWords($x, 'Naira, ', ' Kobo');
echo ucwords($obj->words); 
//echo $obj->number; 
	  ?></div>

<div ></div>
<br clear="all" />
</div>
</div>

   
</body></html>
          


<?php } } ?>