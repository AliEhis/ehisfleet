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
<script src="../../js/tableCloth.js"></script>

<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="leftPanel">
<div class="logo">


</div>

<div class="left_Panel_Links">

<ul>
<li><a href="../../">Dash Board</a></li>
<li><a href="../../clients class="active"">Clients</a></li>
<li><a href="../../transactions">Transaction</a></li>
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
<span>Remove </span>
<ul>
<li><a href="../remove-clients" class="active">Remove</a></li>
<li><a href="../edit-clients">Edit </a></li>
<li><a href="../view-clients">View </a></li>
<li><a href="../">Add New</a></li>
</ul>
</div>

<div class="page_content_links">

<table border="0" class="table table-dark table-bordered table-striped" id="delStaffTable" width="100%"  >
    <tbody>
    <tr>
    <td width="284"><strong> Name</strong></td>
    <td width="206">&nbsp;</td>
    </tr>

<?php 
$selStaff = mysql_query("SELECT * FROM clients") or die(mysql_error());



if(	$countStaff = mysql_num_rows($selStaff) < 1)
{
	?>
      <tr><td colspan="2"> <div class="bad"> Empty Record</div></td>
        </tr>
      

	<?php
}
	else
	{





	while(	$showStaff = mysql_fetch_array($selStaff))
	{
		?>
        

        <tr id="<?=$showStaff['id']?>"><td id="<?=$showStaff['id']?>"><?=$showStaff['name']?></td>
        <td id="<?=$showStaff['id']?>"><a href="#" class="editStaff"> <img src="../../images/edit.png" border="0" /></a></td>
        
        </tr>
        
        <?php
	}}
	?>
    </tbody>
</table>

</div>





</div>
</div>
</body>
</html>
<?php con_close();
ob_end_flush(); 

?>