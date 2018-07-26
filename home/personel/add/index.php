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

<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
	
	//second controll
	function lookup2(inputString) {
		if(inputString.length == 0) {
			// Hide the suggestion box.
			$('#suggestions2').hide();
		} else {
			$.post("rpc.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions2').show();
					$('#autoSuggestionsList2').html(data);
				}
			});
		}
	} // lookup
	
	function fill2(thisValue) {
		$('#inputString2').val(thisValue);
		setTimeout("$('#suggestions2').hide();", 200);
	}
	
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
<li><a href="../../transactions">Transactions</a></li>
<li><a href="../../personel" class="active">Personel</a></li>
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
<span>Add Staff</span>
<ul>
<li><a href="../admin">Administrative Staff</a></li>
<li><a href="../add" class="active">Add Staff</a></li>

<li><a href="../../personel">View Staff</a></li>
</ul>
</div>

<div class="page_content_links">
<?php
if (checkLogAcc($_COOKIE['id']) > 1)
{
	?>
<div class="make_staff">
 <form id="add_staff">
 <ul id="hform">
 <li class="lt">Surname</li>
 <li>
   <label for="fname"></label>
   <input type="text" name="fname" id="fname" class="inpElemts" />
 </li>
 <li class="lt">Other Name</li>
 <li>
   <label for="lname"></label>
   <input type="text" name="lname" id="lname"  class="inpElemts" />
 </li>
 <li class="lt">Gender</li>
 <li>
 <div class="styled-select">
  <label for="gender"/></label>
    <select name="gender" id="gender" class="inpElemts" >
      <option value="male">Male</option>
      <option value="female">Female</option>
     
    </select>
    </div>
 </li>
 <li class="lt">Phone</li>
 <li>
   <input type="text" name="phone" id="phone"  class="inpElemts" />
 </li>
 <li class="lt">Designation</li>
 <li>
  <?php 
	
$sql = mysql_query("SELECT designation FROM staff where designation !='' ") or die(mysql_error());
	
	
	?><a href="#" id="addNewDesignation">Add</a>
       <select name="designation" id="selfromlist"  class="inpElemts" >
                <?php
	while(	$res = mysql_fetch_array($sql))
	{
	?>
      <option value="<?=$res['designation']?>"><?=ucwords($res['designation'])?></option>
     <?php } ?>
    </select>

    
  <input name="designation" type="text"  class="inpElemts" id="designation_show" style="display:none" />
  
      <br />
      <div class="suggestionsBox" id="suggestions" style="display: none;">
				<img src="../view/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&nbsp;
				</div>
			</div>
            
 
 

 </li>
 <li class="lt">Picture</li>
 <li class="lt">
   <label for="pic"></label>
   <input type="file" name="pic" id="pic"   class="inpElemt"/>
 </li><br clear="all" />

 <li class="lt">Address</li>
 <li>
   <textarea name="address" rows="10" class="text_area" id="address"></textarea>
 </li>

 
 <li style="margin-left:50px; margin-top:160px;">
   <input name="addStaff" type="button" class="buttons" id="makeStaff" value="Add Staff" style="margin:0;" />
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
	 }?>


</div>





</div>
</div>
</body>
</html>
<?php 
con_close();
ob_end_flush();
?>