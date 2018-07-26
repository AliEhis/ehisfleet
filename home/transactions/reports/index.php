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
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css" title="currentStyle">
			@import "../../css/demo_table.css";
	
			@import "../../css/shCore.css";
			@import "../../css/smoothness/jquery-ui-1.8.4.custom.css";
		</style>

		
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() 
			{    
			oTable = $('#example').dataTable({ 
			       "bJQueryUI": true,
				          

			});} 
			);
			
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
		
				
			$(document).ready(function() {
				$('#form').submit( function() {
					var sData = oTable.$('input').serialize();
					
					//$("#showF").modalClose();
					//$("#truck").val(data);
					//fnGetSelected();
					html(sData);
					//alert( "The following data would have been submitted to the server: \n\n"+sData );
					return false;
				} );
				
				oTable = $('#example').dataTable();
			} );
			
		</script>


<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body onload="javascript:slideMe()">

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

<div class="titleDiv" style="height:50px;">
<?php include "../title.php"; ?>

</div>

<div class="links">
<span>Business Report</span>
<ul>


<li><a href="../payments">Payments</a></li>
<li><a href="../receipts">Receipt</a></li>
<li><a href="../invoices">Invoices </a></li>
<li><a href="../../transactions">Post Transaction</a></li>
</ul>
</div>
<?php
if (checkLogAcc($_COOKIE['id']) > 1)
{
	?>

<div class="links_bot" id="slideDownDiv">
<span>Transaction History</span>
<ul>

<li><a href="reports/">reports</a></li>
<li><a href="expenses/">Expenses</a></li>
<li><a href="invoices/">Invoices</a></li>
<li><a href="receipts/">Receipts</a></li>
<li><a href="" class="active">Transaction History</a></li>
<li></li>
</ul>
</div>

<div class="make_staff">


	 
    



 
   
<?php
            $selStaff = mysql_query("SELECT * FROM transact") or die(mysql_error());
if(	$countStaff = mysql_num_rows($selStaff) < 1)
{
	?>
      <div class="bad"> Empty Record</div>
      
      

	<?php
}
	else
	{



?>
<form id="transHistory">
     <table class="display"  cellpadding="0" cellspacing="0" border="0"  id="example">
          <thead>
            <tr>
            <th><input type="checkbox" name="all" class="selectall" onclick="find(:checkbox)"></th>
              <th>Cleint / Vendor Name</th>
              <th>Debit</th>
              <th>Credit</th>
              <th>Date</th>
              <th>Details</th>
              <th>Print</th>
              <th>Hide</th>
            
            </tr>
            

    
          </thead>
          <tbody>
<?php

	while(	$showStaff = mysql_fetch_array($selStaff))
	{
		?>
        

        <tr id="<?=$showStaff['id']?>" class="gradeC">
        <td id="<?=$showStaff['id']?>"><input type="checkbox" class="checkme" name="client_id[<?=$showStaff['id']?>]" value="<?=$showStaff['id']?>" >
        <td id="<?=$showStaff['id']?>"><?= showClientName($showStaff['client_id'])?> </td>
        <td id="<?=$showStaff['id']?>"><?= doNum($showStaff['debit'])?></td>
        <td id="<?=$showStaff['id']?>"><?= doNum($showStaff['credit'])?></td>
        <td id="<?=$showStaff['id']?>"><?=$showStaff['dates']?></td>
<td id="<?=$showStaff['id']?>"><?=$showStaff['remarks']?></td>
        <td id="<?=$showStaff['id']?>">
          <a href="#" id="printTransact">
            <img src="../../images/print.png" width="16" height="16" border="0"  /></a>
        </td>
        
        <td id="<?=$showStaff['id']?>">
          <a href="#" id="hideTransact">
            <img src="../../images/hide_table_row.png" width="16" height="16" border="0"  /></a>
        </td>
        
   
        </tr>
        
        <?php
	}}

	$sqlTotalDebit = mysql_query("SELECT SUM(debit) FROM transact") or die(mysql_error());
	$sqlTotalCredit = mysql_query("SELECT SUM(credit) FROM transact") or die(mysql_error());
	
	$resC = mysql_fetch_array($sqlTotalCredit);
	$resD = mysql_fetch_array($sqlTotalDebit);
	
	 
	?>
           
        <tr id="<?=$showStaff['id']?>" class="gradeX">
        <td id="<?=$showStaff['id']?>">
        <td id="<?=$showStaff['id']?>"><strong>Balance Total </strong></td>
        <td id="<?=$showStaff['id']?>"><strong> ₦
          <?= doNum($resD['SUM(debit)'])?> 
        </strong></td>
        <td id="<?=$showStaff['id']?>"><strong> ₦
          <?= doNum($resC['SUM(credit)'])?> 
        </strong></td>
        <td id="<?=$showStaff['id']?>"></td>
<td id="<?=$showStaff['id']?>"> </td>
        <td id="<?=$showStaff['id']?>">
          
        </td>
        
        <td id="<?=$showStaff['id']?>">
           
        </td>
        
   
        </tr>
       
          </tbody>
        </table>
        	<div style="padding-bottom:1em; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-weight:bolder; font-size:12px; ">
						<input type="button" class="buttonSmall" id="trans" value="Print Selection" />
                        
                        
                 

<strong>Total Credit: ₦<?= doNum($resC['SUM(credit)'])?> <br />
Total Debit: ₦<?= doNum($resD['SUM(debit)'])?> </strong><br />
<strong style="font-size:14px;">Balance Total ₦<?= doNum($resC['SUM(credit)'] - $resD['SUM(debit)'])?> </strong> 
					</div>
      </form>
<div id="box1" class="dialog" style="color:#FFFFFF; display:none;">

   
    


</div>
</div>
<?php } else { echo returnAccessCaution(); } ?>



</div>
</div>
</body>
</html>
<?php con_close();
ob_end_flush(); 

?>