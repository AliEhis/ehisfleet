<?php 
ob_start();
include "../includes/functions.php";
con();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/favicon.png" type="image/png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include "../includes/title.php"; ?></title>
<script src="../js/jquery.1.7.1.js"></script>
<script src="../js/jCorners.js"></script>
<script src="../js/jfunctions.js"></script>
<script src="../js/jmodal.js"></script>


<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="leftPanel">
<div class="logo">


</div>

<div class="left_Panel_Links">

<ul>
<li><a href="../">Dash Board</a></li>
<li><a href="../clients">Clients / Contractors</a></li>
<li><a href="../transactions">Transactions</a></li>
<li><a href="../personel">Personel</a></li>
<li><a href="../fleet">Fleet</a></li>
<li><a href="../settings" class="active">Settings</a></li>


</ul>

</div>


</div>

<div class="rightPanel">
<div class="content">

<div class="topDiv"><?php include "../includes/status.php"; ?></div>

<div class="titleDiv">
<?php include "title.php"; ?>
</div>

<div class="links">
<span>Edit Company Details </span>
<ul>
<li class="bite"><a href="" class="active">Company Details</a></li>
</ul>
</div>

<div class="page_content_links">
<?php
if (checkLogAcc($_COOKIE['id']) > 2)
{
	?>
<div class="make_company make_staff">
<?php


$sql = mysql_query("SELECT * FROM settings") or die(mysql_error()); 
	//$nms = mysql_num_rows($chksc);
		$res = mysql_fetch_array($sql);
		
?>
 <form id="make_company" action="my-script.php" method="post" enctype="multipart/form-data">
 <ul id="hform">
 <li class="lt">Name</li>
 <li>
   <label for="cname"></label>
   <input type="text" name="cname" value="<?=$res['coy_name']?>" id="cname" class="inpElemts" />
 </li>
 <li class="lt">Phone</li>
 <li>
   <label for="phone"></label>
   <input type="text" name="phone" id="phone" value="<?=$res['phone']?>"  class="inpElemts" />
 </li>

 <li class="lt">Address</li>
 <li>
   <textarea name="address" rows="10" class="text_area" id="address"><?=$res['address']?></textarea>
 </li>

 

 
 <li class="lt">Logo</li>
 <li>
   <label for="pic"></label>
   <input type="file" name="pic" id="pic"   class="inpElemt"/>
 </li><br clear="all" />

 <li style="margin-left:110px; margin-top:10px;">
   <input name="save_company" type="submit" class="buttons"  value="Save" style="margin:0;" />
 </li>
 </ul>

 
 </form>

 <div id="msg"></div>




<div id="loading">
  <!--<img src="../../images/loading.gif" width="168" height="40" style="margin:auto" />-->
  
</div>
 
 </div>
 <?php } else { echo returnAccessCaution(); } ?>
</div>





</div>
</div>
</body>
</html>
<?php 
con_close();
ob_end_flush();
?>