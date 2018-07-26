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
			.s
			{
				background:#CCCCCC; padding:1px; margin:2px; color:#003;
			}
		</style>

		
		<script type="text/javascript" charset="utf-8">
			
					
	$(function() {
		$("#date").datepicker({altField: '#date', altFormat: 'd, mm, yy'});
	});
		
		$(document).ready(function () {
			$(".sm").click(function (){
				$('.dialog#showD').modal();
				});
		});
		
		
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
<span>Invoices</span>
<ul>

<li><a href="../reports">Reports</a></li>
<li><a href="../payments">Payments</a></li>
<li><a href="../receipts">Receipt</a></li>
<li><a href="../invoices" class="active">Invoices </a></li>
<li><a href="../">Post Transaction</a></li>
</ul>
</div>

<div class="page_content_links">
<div class="make_staff" >
 <form id="do_invoice_form">
 <table width="90%" >
   <tr>
     <td width="12%">Trucks</td>
     <td width="44%"><input type="text" name="truck" id="truck" class="inpElemts"  value="<?php 
	 
	 foreach ($_GET as $key=>$value) 
{
	
$rn = $_GET[$key];//room Name



if( ($rn == '10') || ($rn == '15')  || ($rn == '25')  || ($rn == '50')  || ($rn == '100') ) $rn = '';

echo "$rn|";
}  ?>" />
     
     <input type="hidden" name="trucks" id="trucks" class="inpElemts" value="<?= count($_GET)-1; ?>"  />
     <input type="hidden" name="truckss" id="truckss" class="inpElemts" value="
	<?php 
	 
	 foreach ($_GET as $key=>$value) 
{
	
$rn = $_GET[$key];//room Name

echo "$rn,";
}  ?>" />
     </td>
     <td width="11%">Client</td>
     <td width="33%"><?=  showClients("inpElemts", "<a href='#' class='sm'>Add</a>") ?></td>
   </tr>
   <tr>
     <td>Rate</td>
     <td><input type="text" name="rate" id="rate"  class="inpElemts" onblur="" /></td>
     <td>No of Trips</td>
     <td>
       <input type="text" name="trips" id="trips" class="inpElemts" />
</td>
   </tr>
   <tr>
     <td valign="top">Cargo</td>
     <td> 
       <textarea name="cargo" rows="3" class="text_area" id="cargo"></textarea>
      </td>
     <td valign="top">Info</td>
     <td><textarea name="note" rows="3" class="text_area" id="note"></textarea></td>
   </tr>
   <tr>
     <td>Date</td>
     <td><input type="text" name="date" id="date" class="inpElemts" /></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td>Tax</td>
     <td><div class="inpElemts" style="margin:0;">
       <label>
         <input type="radio" name="tax" value="5" id="tax_0" />
         5%</label>
       <label>
         <input type="radio" name="tax" value="10" id="tax_1" />
         10%</label>
       <label>
         <input type="radio" name="tax" value="15" id="tax_2" />
         15%</label>
       <label>
         <input type="radio" name="tax" value="20" id="tax_3" />
         20%</label>
       
     </div></td>
     <td>Tax Amount</td>
     <td><input type="text" name="taxAmount" id="taxAmount" class="inpElemts" readonly="readonly"  /></td>
     </tr>

   <tr>
     <td>Amount</td>
     <td><input type="text" name="amount" id="amount" class="inpElemts" readonly="readonly"  /></td>
     <td>Total</td>
     <td><input type="text" name="totalCost" id="totalCost" class="inpElemts" readonly="readonly"  /></td>
     </tr>
   <tr  >
     <td>&nbsp;</td>
     <td><input name="doInvioce" type="button" class="buttons" id="doInvoice" value="Complete" style="margin:0;"/></td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
 
 </table>


 
 </form>
  <div id="msg"></div>




<div id="loading">
  <!--<img src="../../images/loading.gif" width="168" height="40" style="margin:auto" />-->
  
</div>
  <div class="dialog" style="display:none;" id="showD">
<?php include "addClient.php"; ?>
</div>

<div class="dialog" style="display:none;" id="showF">

</div>

 </div>

</div>


</div>
</div>
</div>
</body>
</html>
<?php con_close();
ob_end_flush(); 

?>