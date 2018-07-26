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
<li><a href="../../clients">Clients</a></li>
<li><a href="../../transactions">Transaction</a></li>
<li><a href="../../personel">Personel</a></li>
<li><a href="../../fleet" class="active">Fleet</a></li>
<li><a href="../../settings">Settings</a></li>


</ul>

</div>


</div>

<div class="rightPanel">
<div class="content">

<div class="topDiv"><?php include "../../includes/status.php"; ?></div>

<div class="titleDiv">
<?php 
include "../title.php";
?>
</div>

<div class="links">
<span>Add New</span>
<ul>

<li><a href="../new" class="active">Add New</a></li>
<li><a href="../">Home</a></li>
</ul>
</div>

<div class="page_content_links">

<div class="add_fleet">
 <form id="add_fleets">
 <ul id="hform">
 <li class="lt">Make
   
 </li>
 
 <li>
   <label for="make"></label><input type="text" name="make" id="make" class="inpElemts" />
 </li>
 
 <br clear="all" />
 <li class="lt">Reg No.</li>
 <li>
   <input type="text" name="regno" id="regno"  class="inpElemts" />
 </li>
<br clear="all" />

 <li class="lt">Fleet No</li>
 <li>
   <input name="ref" type="text" class="inpElemts" id="fno" value="N / A" />
 </li>
 <br clear="all" />

<li class="lt">Type</li>
<li>
   
  <div class="styled-select">
  <label for="type"/></label>
    <select name="type" id="type" class="inpElemts" >
      <option value="Tricycle">Tricycle</option>
      <option value="Car">Car</option>
      <option value="Bus">Bus</option>
      <option value="Truk">Truk</option>
      <option value="Lorry">Lorry</option>
      <option value="Low Bed">Low Bed</option>
      <option value="Swamp Boogie">Swamp Boogie</option>
     <option value="Flat Bed">Flat Bed</option>
     <option value="Crane">Crane</option>
     <option value="Excavators">Excavators</option>
     <option value="Others">Others</option>
    </select>
    </div>
 </li>
  <br clear="all" />

<li class="lt"> Driver</li>
<li>
   
  <div class="styled-select">
  <label for="type"/></label>

    <?php 
	
$sql = mysql_query("SELECT * FROM staff WHERE designation =  'driver' order by id desc ") or die(mysql_error());
	if(mysql_num_rows($sql)<1) {
	
	?>
    <div class="bad">Empty Record <a href="#" onclick="$('.dialog').modal()">Add</a></div>

	<?php
    	}
		else
		{
			   ?>
                <select name="driver" id="driver" class="inpElemts" >
                <option value="N / A">N / A</option>
				<?php
	while(	$res = mysql_fetch_array($sql))
	{
	?>
      <option value="<?=showName($res['id'])?>"><?=showName($res['id'])?></option>
     <?php } ?>
    </select>
    <?php } ?>
    <a href="#" onclick="$('.dialog').modal()">Add</a></div>
 </li>
 
</li><br clear="all" />
<li style="margin-left:110px; margin-top:10px;">
  <input name="add_fleet" type="button" class="buttons" id="add_fleet" value="Save" style="margin:0;" />
</li>
 </ul>

 
 </form>
  <div id="msg"></div>




<div id="loading">
  <!--<img src="../../images/loading.gif" width="168" height="40" style="margin:auto" />-->
  
</div>
<div class="clear"></div>
<div class="dialog" style="display:none;">
<?php include "addStaff.php"; ?>
  
 
</div>

 </div>

</div>





</div>
</div>
</body>
</html>
<?php 
con_close();
ob_end_flush();
?>