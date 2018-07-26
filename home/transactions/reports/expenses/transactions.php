<?php 
ob_start();
include "../../../includes/functions.php";
con();



header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web

	
	


//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;




//$showD = mysql_fetch_array($runQuery);
	
	
//$sql = mysql_query("UPDATE invoices SET ref = '$myId'") or die (mysql_error());
?>


<html>
<script src="../../../js/jquery.1.7.1.js"></script>
<script src="../../../js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8">
/*	$(document).ready(function() 
			{    
			oTable = $('#example').dataTable({ 
			       "bJQueryUI": true,
				   
				   
				          

			});} 
			);*/
			
			$(document).ready(function() {  
			  $.extend( $.fn.dataTable.defaults, 
			  { "bFilter": false,        
			  "bSort": false, 
			  "bPaginate": false,
			   "bLengthChange": false,
			   "bInfo": false,
			   "bJQueryUI": true
			  } );     
			 
			 $('#example').dataTable();} );
	</script>
<style type="text/css" title="currentStyle">
	
			@import "../../../css/smoothness/jquery-ui-1.8.4.custom.css";
			@import "../../../css/demo_table.css";	
			@import "../../../css/smoothness/jquery-ui-1.8.4.custom.css";
			
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
	width:auto;
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
	width:auto;
	display:block;
	margin-top:20px;
	border-top:1px solid #000;
}
.divC

{
	height:10px;
	width:auto;
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
	width:auto;
	height:10px;
	background:#000000;
	color:#FFF;
	font-family:Tahoma, Geneva, sans-serif;
	font-size:12px;
	text-transform:uppercase;
	padding:10px;
}
</style>
<script src="../../../js/jquery.1.7.1.js"></script>
<script src="../../../js/jquery.dataTables.js"></script>

<body onLoad="javascript:window.print()">



<div style="width:850px; display:block; background:#FFF; border:1px solid #000; padding:10px 5px 10px 20px; color:#000; margin:auto">
<!-- Header -->
<div class="header">
  <div class="Logo"><strong>Expenses History Print</strong></div>
<div class="Name"><?=showLogo("../../../");?><br />
<?=comName()?></div>
<!-- Header -->
<div class="clear"></div>
<!-- Title -->
<div class="Logo">
  <p>&nbsp;</p>
</div>
<div class="Name"></div>
<div class="clear"></div>
<!-- Title -->
<!-- Body --><br />
<br />
<br clear="all" />
</div>

<div class="content">
<table class="display"  cellpadding="0" cellspacing="0" border="0"  id="example">
  <thead>
  <tr>
           
              <th>For</th>
              <th>Date</th>
              <th>Info</th>
              <th>Pay Mode</th>
              <th>Amount</th>
              <th>#</th>
              <th>Selector</th>
            </tr>
      </thead>
      <tbody>
      <?php
	  foreach($_POST['client_id'] as $key => $value)
{
	
$id =  mysql_real_escape_string($value);

//echo " Name: ".$name." Rate:".$rate." ID: ".$value."<br>";
	$runQuery = mysql_query("SELECT * FROM payment WHERE id = '$id'")or die (mysql_error());

//echo $value;
	 
	$showD = mysql_fetch_array($runQuery);
	  
?>

     <tr class="gradeC">
      <td><?= $showD['ref'] ?></td>
      <td><?=$showD['dates']?></td>
      <td><?=$showD['remarks']?></td>
      <td><?=showPM($showD['accountcode'])?></td>
      <td>₦<?=doNum($showD['amount'])?>K</td>
      <td><?= $showD['pv'] ?></td>
      <td><?= $showD['vendor'] ?></td>
      </tr>
    


   
    <?php }  ?>
    </tbody>
  </table>
</div>


</div>

   
</body></html>
          


