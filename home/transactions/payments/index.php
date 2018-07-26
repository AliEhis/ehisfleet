<?php 
ob_start();
include "../../includes/functions.php";
con();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../../images/favicon.png" type="image/png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include "../../includes/title.php"; ?></title>
<script src="../../js/jquery.1.7.1.js"></script>
<script src="../../js/jCorners.js"></script>
<script src="../../js/jfunctions.js"></script>
<script src="../../js/jmodal.js"></script>
<script src="../../js/jquery.dataTables.js"></script>
<script src="../../js/shCore.js"></script>
<script src="../../js/ui.core.js"></script>
<script src="../../js/ui.datepicker.js"></script>


<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css" title="currentStyle">
			@import "../../css/demo_table.css";
			@import "../../css/ui.datepicker.css";
			@import "../../css/ui.theme.css";
			@import "../../css/shCore.css";
			@import "../../css/smoothness/jquery-ui-1.8.4.custom.css";
		</style>

		
		<script type="text/javascript" charset="utf-8">
			
			
			/*
			 * I don't actually use this here, but it is provided as it might be useful and demonstrates
			 * getting the TR nodes from DataTables
			 */
			function fnGetSelected( oTableLocal )
			{
				return oTableLocal.$('tr.row_selected');
			}
			
				$(document).ready(function() {
				/* Add/remove class to a row when clicked on */
				$('#example tr').click( function() {
					$(this).toggleClass('row_selected');
				} );
				
				
				
				/* Init the table */
				var oTable = $('#example').dataTable( );
			} );
			
			/*
			 * I don't actually use this here, but it is provided as it might be useful and demonstrates
			 * getting the TR nodes from DataTables
			 */
		
			
		$(function() {
		$("#date").datepicker({altField: '#date', altFormat: 'd, mm, yy'});
	});
		
		$(document).ready(function () {
			$(".sm").click(function (){
				$('.dialog').modal();
				});
		});
		</script>


<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="leftPanel">
<div class="logo">


</div>

<div class="left_Panel_Links">

<ul>
<li><a href="../../">Dash Board</a></li>
<li><a href="../../clients">Clients / Contractors</a></li>
<li><a href="../../transactions" class="active">Transactions</a></li>
<li><a href="../../personel">Personel</a></li>
<li><a href="../../fleet">Fleet</a></li>
<li><a href="../../settings">Settings</a></li>


</ul>

</div>


</div>

<div class="rightPanel">
<div class="content">

<div class="topDiv"><?php include "../../includes/status.php"; ?></div>

<div class="titleDiv">
<?php include "../title.php"; ?>

</div>

<div class="links">
<span>Post Transaction</span>
<ul>

<li><a href="../reports">Reports</a></li>
<li><a href="../payments" class="active">Payments</a></li>
<li><a href="../receipts">Receipt</a></li>
<li><a href="../invoices">Invoices </a></li>
<li><a href="../">Post Transaction</a></li>
</ul>
</div>

<div class="page_content_links">


<div class="make_staff">
 <form id="do_payment_form">
 <ul id="hform">
 <li class="lt">Name</li>
 <li>
   <label for="name"></label>
  
<?=  showVendor("inpElemts", "<a href='#' class='sm' onclick='$('.dialog').modal()'>Add</a>") ?>
 </li>
 <br clear="all" />


<li class="lt">Pay Mode</li>
<li class="inpElemts">
      <p>
        <label>
          <input type="radio" name="payment" value="Cash" id="payment_0" />
          Cash</label>
  
        <label>
          <input type="radio" name="payment" value="Bank" id="payment_1" />
          Bank</label>

      </p>
</li>


<br clear="all" />

<li class="lt">Amount</li>
<li>
  <label for="textarea"></label>
  <input name="amount" type="text" class="inpElemts" id="textarea" value="" />
</li>



 <li class="lt">
   <label for="pic"></label>
 </li><br clear="all" />

 <li class="lt">Date</li>
 <li>
   <input name="date" type="text" class="inpElemts" id="date" value="" />
    <input type="hidden" name="dates" id="dates" />
 </li>
 <br clear="all" />
 <li class="lt">Ref</li>
 <li>
  <?=showFleetNo("inpElemts", "");?>
    
 </li>
  <br clear="all" />
<li class="lt">Description</li>
<li>
  <textarea name="rmk" rows="3" class="text_area" id="textarea"></textarea>
  </li>


<br clear="all" />

<li style="margin-left:110px; margin-top:10px;">
  <input name="do_payment" type="button" class="buttons" id="do_payment" value="Save" style="margin:0;" />
 </li>
 </ul>

 
 </form>
   <div id="msg"></div>




<div id="loading">
  <!--<img src="../../images/loading.gif" width="168" height="40" style="margin:auto" />-->
  
</div>
 </div>
 
   <div id="divToPrint">
   </div>
 


 <div class="dialog" style="display:none;">
<?php include "addClient.php"; ?>
  
 
</div>

 

</div>


</div>
</div>
</body>
</html>
<?php con_close();
ob_end_flush(); 

?>