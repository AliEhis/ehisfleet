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
<script src="../js/tableCloth.js"></script>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="leftPanel">
<div class="logo">


</div>

<div class="left_Panel_Links">

<ul>
<li><a href="../">Dash Board</a></li>
<li><a href="../clients" class="active">Clients / Contractors</a></li>
<li><a href="../transactions">Transactions</a></li>
<li><a href="../personel">Personel</a></li>
<li><a href="../fleet">Fleet</a></li>
<li><a href="../settings">Settings</a></li>


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
<span>Add New </span>
<ul>

<li><a href="view-clients/">View </a></li>
<li><a href="" class="active">Add New</a></li>
</ul>
</div>

<div class="page_content_links">
<?php
if (checkLogAcc($_COOKIE['id']) > 1)
{
	?>
<div class="make_staff">
 <form id="add_new_client">
 <ul id="hform">
 <li class="lt">Name</li>
 <li>
   <label for="name"></label>
   <input type="text" name="name" id="name" class="inpElemts" />
 </li>
 <br clear="all" />
 <li class="lt">Phone</li>
 <li>
   <input type="text" name="phone" id="phone"  class="inpElemts" />
 </li>
 <li></li>
 <li class="lt">
   <label for="pic"></label>
 </li><br clear="all" />

 <li class="lt">Address</li>
 <li>
   <textarea name="address" rows="10" class="text_area" id="address"></textarea>
 </li>
 <br clear="all" />

<li class="lt">Type</li>
<li class="inpElemts">
   <p >
     <label>
       <input type="radio" name="Type" value="Client" id="Type_0" />
       Client</label>
     <label>
       <input type="radio" name="Type" value="Contractor" id="Type_1" />
       Contractor</label>
     <br />
   </p>
   </li>
</li><br clear="all" />


 
 <li style="margin-left:110px; margin-top:10px;">
   <input name="add_client" type="button" class="buttons" id="add_client" value="Save" style="margin:0;" />
 </li>
 </ul>

 
 </form>
   <div id="msg"></div>




<div id="loading">
  <!--<img src="../../images/loading.gif" width="168" height="40" style="margin:auto" />-->
  
</div>
 </div>
<?php } else {
	
	echo returnAccessCaution();
} ?>
</div>





</div>

</div>
</body>
</html>
<?php con_close();
ob_end_flush(); 

?>