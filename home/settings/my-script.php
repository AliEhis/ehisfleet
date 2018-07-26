<?php 
ob_start();
include "../includes/functions.php";
con();



header("Cache-Control: no-cache");
// Ideally, you'd put these in a text file. Put an entry 
// on each line of 'a.txt' and use $prefixes = file("a.txt");
// You can do the same with a separate file for $suffixes.
// This selects a random element of each array on the fly

// Example output: Tagging is the new Web
if(isset($_POST['save_company']))
{
	$cname = $_POST['cname'];//[$key];
	$phone = $_POST['phone'];//[$key];
	$address = $_POST['address'];//[$key];

//echo $_FILES['pic']['name'];
//exit;

//echo " Name: ".$name." Rate:".$type." ID: ".$id."<br>";
//exit;

$sql = mysql_query("UPDATE settings SET coy_name = '$cname', phone = '$phone', address = '$address' WHERE id ='2'") or die (mysql_error());


$image_tmpname = $_FILES['pic']['name'];
$image_tname = $_FILES['pic']['tmp_name'];


$imgdir = "../images/myLogo/";
$imgname = $imgdir.$image_tmpname;

if(move_uploaded_file($_FILES['pic']['tmp_name'], $imgname))
{
	
	
list($width,$height,$type,$attr)= getimagesize($imgname);
switch($type)
{
 case 1:
  $ext = ".gif"; break;
 case 2:
  $ext = ".jpg"; break;
 case 3:
  $ext = ".png"; break;
  case 4:
  $ext = ".bmp"; break;
 default:
   echo "Not acceptable format of image";
}

$insert = "update settings set exxt = '$ext' where id = '1'";

mysql_query($insert) or die(mysql_error());


$newfilename = $imgdir."_1".$ext;

rename($imgname, $newfilename); 



}

if ($sql) {
	 
	 header ("Location: index.php");
//	 echo"done"; 
	 
	 
	 
	 }
	 
	 
//echo "Edit Was Successfull"; 
else { echo "Failed Entry"; }


//}
//echo "Room Edit Was Successfull"; 
}