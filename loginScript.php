<?php

ob_start();
include "home/includes/functions.php";
con();

if (isset($_POST['login_page']))
{
	$u = mysql_real_escape_string(trim($_POST['username']));
	$p = mysql_real_escape_string(trim($_POST['password']));

if (($u =="") || ($p==""))
{
	
        $message = "Sorry your Password and Username Field is Empty";
        $e = base64_encode($message);
        header("location:index.php?er1");
}
else
{
	
	
$sql = mysql_query("SELECT * FROM admin WHERE username = '$u' AND password = '$p'") or die(mysql_error());
	
 if (mysql_num_rows($sql) > 0)
 {
		
		$res = mysql_fetch_array($sql);
		
            $staff  = $res['id']; //Selects Id from genadmin


            setcookie('id', $staff, time() + 7200, '/');
			mysql_query("UPDATE admin SET status = '1' WHERE username = '$u' AND password = '$p'") or die (mysql_error());


            header('location:home/');

 }
 else
 {
	    $message = "Sorry your Password and Username Field is Empty";
        $e = base64_encode($message);
        header("location:index.php?er2");
 }
	
		
}
}
elseif (isset($_GET['o']))
{
	 
	 $myId = $_COOKIE['id'];
if(	mysql_query("UPDATE admin SET status = '0' WHERE id = '$myId'") or die (mysql_error()))
{
	 setcookie('id', "", time() - 9200, '/');
	 header("location:index.php");
	 
	 //setcookie('id', $staff, time() + 7200, '/');
	 
}

	 
}
else
{
	 header("location:index.php?er3");
}





con_close();
ob_end_flush();