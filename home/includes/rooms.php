<?
include_once "connect.php";

function room_add($ref,$type,$status)
{
	$var= array($ref,$type,$status);
	
	if(valid($var))
	{
		$sql="insert into rooms set ref='$ref', type='$type', status='$status'";
	con();
	
	$result=mysql_query($sql);
	con_close();
		if (!$result) {
    return "Invalid operation: " . mysql_error();
}
else
{
	return "Operation Completed Successfully";
	
	}
		}
		else
		{
			return "Please complete the form field(s)";
			
			}
	
	
	
	}


function room_delete($id)

{
	$rec_id=   mysql_real_escape_string($id);
   
	con();
	$result=mysql_query("delete from rooms where id='$rec_id'");
	con_close();
	if (!$result) {
    return "Invalid operation: " . mysql_error();
}
else
{
	return "Operation Completed Successfully";
	
	}
	
	
	}

function room_list()

{
	//$data= array();
	
	con();
	
	$result=mysql_query("select * from rooms");
	
		con_close();
	return $result;	
	

	
	
	
	}
function room_update_status($id,$status)

{
	$rec_id=   mysql_real_escape_string($id);
   $rom_status=mysql_real_escape_string($status);
	con();
	$result=mysql_query("update rooms set status='$rom_status' where id='$rec_id'");
	con_close();
	if (!$result) {
    return "Invalid operation: " . mysql_error();
}
else
{
	return "Operation Completed Successfully";
	
	}
	
	
	}

function valid($var)
{
	$newVal;
	
	foreach($var as $values)
	
	{
		$newVal=trim($values) ;
		if(empty($newVal))
		{
			return false;
			}
		
		
		}
	return true;
	}


?>