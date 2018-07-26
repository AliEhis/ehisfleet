<?php
include_once"connect.php";
con();

if(!isset($_COOKIE['id']))
	{
	
		header ("Location:http://localhost/fleet");	 

	}
	
	
if(isset($_COOKIE['id']))
	{
		$id = $_COOKIE['id'];
		mysql_query("UPDATE admin SET status = '1' WHERE id = '$id'")or die(mysql_error());
	
	}







function checkLogAcc($id)
{
	$myId = $id;
	
	$sql = 
$chksc = mysql_query("SELECT * FROM admin WHERE id = $myId") or die(mysql_error());
//	$nms = mysql_num_rows($chksc);
	
	$nms = mysql_fetch_array($chksc);
	
	if ($nms['access']=='manager')
	{
		return "3";
	}
	elseif($nms['access']=='supervisor')
	{
		return "2";
	}
	elseif($nms['access']=='clerk')
	{
		return "1";
	}
	
}
function callName($a, $b)
{
	
$chksc = mysql_query("SELECT * FROM $a order by $b asc") or die(mysql_error());
//	$nms = mysql_num_rows($chksc);

echo "<ul>";

	while(	$nms = mysql_fetch_array($chksc))
	{
		?>
        <li><a href="#"><?=$nms['name']?></a></li>
        
        
        <?php
	}
	echo "</ul>";
}

function showDoC ($debit)
{
	if ($debit!="0")
	{
		return "Debit";
	}
	else
	{
		return "Credit";
	}
}

function showAmount($debit, $credit)
{
	if ($debit!="0")
	{
		return $debit;
	}
	elseif ($credit !="0")
	{
		return $credit;
	}
}

function showPM($acc)
{
	if  ($acc== '200')
	{
		return "Cash";//$acc = 200;
	}
	elseif ($acc== '400')
	{
		return "Bank";
	}
	
}

function showFleet()
{
	$chksc = mysql_query("SELECT * FROM fleet order by type asc") or die(mysql_error());
//	$nms = mysql_num_rows($chksc);

echo "<ul>";

	while(	$nms = mysql_fetch_array($chksc))
	{
		
/*		
switch ($nms['status']) {
    case "0":
        $st = "vacant";
        break;

	case "1":
       $st = "occupied";
        break;

	case "2":
	  $st = "blocked";
        break;
    
	case "3":
        $st = "reserved";
        break;
        
	case "4":
        $st = "deleted";
        break;
		
    return $st;
}
	
*/
		?>
        <li><a href="checkin.php?id=<?=$nms['id']?>"><?=$nms['regno']?><br /><span><?=$nms['type']?> </span></a> </li>
        
        
        <?php
	}
	echo "</ul>";
}
	
	
    
	
function	returnGood($a)
{
	
    return "<div class='good'> $a </div>";
    
    
}

function	returnBad($a)
{
	
    return "<div class='bad'> $a </div>";
    
    
}


function	returnCaution($a)
{
	
    return "<div class='caution'> $a </div>";


}


function	returnAccessCaution()
{
	
    return "<div class='caution'> You dont have Access to View this Page </div>";


}
function showClients($class, $link)
		{
			?>
            <div class="styled-select">
          <select name="clients_name" class="<?=$class?>"  id="clients_name">
          <?php 
		  
			$sql = mysql_query("SELECT * FROM clients WHERE type !='Contractor'") or die(mysql_error());
		  while ($show = mysql_fetch_array($sql))
		  {
		  ?>
          <option value="<?=$show['id']?>"> <?=$show['name']?>          </option>
          <?php } ?>
          </select>&nbsp;<?=$link?>
          </div>
            <?php
		}
	
		
		
		
		
function showVendor($class, $link)
		{
			?>
            <div class="styled-select">
          <select name="clients_name" class="<?=$class?>"  id="clients_name">
          <option value="Dispatch" selected="selected"> Fleet Dispatch </option>
          <option value="Not Applicable" > Not Applicaple</option>
          <option value="Personel">Personel</option>
          
          <?php 
		  
			$sql = mysql_query("SELECT * FROM clients WHERE type = 'contractor'") or die(mysql_error());
		  while ($show = mysql_fetch_array($sql))
		  {
		  ?>
          <option value="<?=$show['name']?>"> <?=$show['name']?>          </option>
          <?php } ?>
          </select>&nbsp;<?=$link?>
          </div>
            <?php
		}
	
		
		
		
		

function showName($a)
{
	$sqls = mysql_query("SELECT * FROM staff WHERE id = '$a'")or die (mysql_error());
	
	$ress = mysql_fetch_array($sqls);
	//return $a;//mysql_num_rows($sqls);
	return $ress['surname']." ". $ress['oname'];
}

function showClientName($a)
{
	$sqls = mysql_query("SELECT * FROM clients WHERE id = '$a'")or die (mysql_error());
	
	$ress = mysql_fetch_array($sqls);
	//return $a;mysql_num_rows($sqls);
	return $ress['name'];
}


function showSt($a)
{
	if ($a == 1) echo "Online"; 
	if ($a == 0) echo "Offline"; 
	
}


function showClientDetails($a)
{
	$sqls = mysql_query("SELECT * FROM clients WHERE id = '$a'")or die (mysql_error());
	
	$ress = mysql_fetch_array($sqls);
	//return $a;mysql_num_rows($sqls);
	return "<h2>".$ress['name']."</h2><span>".$ress['address']."</span><br /><span>".$ress['phone']."</span>";
}


function getRef($id)
		
		{
			
			switch(strlen($id))
			{
				case 1:
				return "0000".$id;
				break;
				case 2:
				return "000".$id;
				break;
				case 3:
				return "00".$id;
				break;
				case 4:
				return "0".$id;
				break;
				default:
				return $id;
				}
			
			
			
			
		}

function doNum($a)
{
//	$x = trim(mysql_real_escape_string($a));
	if (is_numeric($a))
	{

		echo number_format($a, 2, '.', ',');
	}
	else
	{
		return $a;
	}
}
	
	
	
	function comName()
	{
		$sqls = mysql_query("SELECT * FROM settings")or die (mysql_error());
	
	$ress = mysql_fetch_array($sqls);
	//return $a;mysql_num_rows($sqls);
	return "<h1 style='background:none;'>".$ress['coy_name']."</h1> <span>".$ress['address']."</span> <br /><span>".$ress['phone'];
	}




define("MAJOR", 'pounds');
define("MINOR", 'p');
class toWords {
var $pounds;
var $pence;
var $major;
var $minor;
var $words = '';
var $number;
var $magind;
var $units = array('','one','two','three','four','five','six','seven','eight','nine');
var $teens = array('ten','eleven','twelve','thirteen','fourteen','fifteen','sixteen','seventeen','eighteen','nineteen');
var $tens = array('','ten','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety');
var $mag = array('','thousand,','million,','billion,','trillion,');
function toWords($amount, $major=MAJOR, $minor=MINOR) {
$this->major = $major;
$this->minor = $minor;
$this->number = number_format($amount,2);
list($this->pounds,$this->pence) = explode('.',$this->number);
$this->words = " $this->major $this->pence$this->minor";
if ($this->pounds==0)
$this->words = "Zero $this->words";
else {
$groups = explode(',',$this->pounds);
$groups = array_reverse($groups);
for ($this->magind=0; $this->magind<count($groups); $this->magind++) {
if (($this->magind==1)&&(strpos($this->words,'hundred') === false)&&($groups[0]!='000'))
$this->words = ' and ' . $this->words;
$this->words = $this->_build($groups[$this->magind]).$this->words;
}
}
}
function _build($n) {
$res = '';
$na = str_pad("$n",3,"0",STR_PAD_LEFT);
if ($na == '000') return '';
if ($na{0} != 0)
$res = ' '.$this->units[$na{0}] . ' hundred';
if (($na{1}=='0')&&($na{2}=='0'))
return $res . ' ' . $this->mag[$this->magind];
$res .= $res==''? '' : ' and';
$t = (int)$na{1}; $u = (int)$na{2};
switch ($t) {
case 0: $res .= ' ' . $this->units[$u]; break;
case 1: $res .= ' ' . $this->teens[$u]; break;
default:$res .= ' ' . $this->tens[$t] . ' ' . $this->units[$u] ; break;
}
$res .= ' ' . $this->mag[$this->magind];
return $res;
}
}




function showFleetNo($class, $link)
		{
			?>
            <div class="styled-select">
          <select name="fleet_no" class="<?=$class?>"  id="clients_name">
          <option value="Miscellaneous" >Miscellaneous</option>
          <option value="Salary" selected="selected">Salary</option>
          
          <option value="General" >Fleet Maintenance</option>
          <?php 
		  
			$sql = mysql_query("SELECT * FROM fleet") or die(mysql_error());
		  while ($show = mysql_fetch_array($sql))
		  {
		  ?>
          <option value="<?=$show['regno']?>"> <?=$show['regno']?>    [<?=$show['type']?>]       </option>
          <?php } ?>
          </select>&nbsp;<?=$link?>
          </div>
            <?php
		}
	
	
function doTotalNum($type)
{
	$sql = mysql_query("SELECT  SUM($type) FROM transact") or die(mysql_error());
	
	$res = mysql_fetch_array($sql);
	
	return $res['SUM($type)'];

}


function toWords($total)
{
$obj = new toWords($total, 'Naira, ', ' ');
return ucwords($obj->words); 
}


function showLogo($link)
{
	$sql = mysql_query("SELECT  * FROM settings ") or die(mysql_error());
	
	while ($res = mysql_fetch_array($sql))
	{
?>
<img src="<?=$link?>images/myLogo/_1<?=$res['exxt']?>" rel="<?=$res['exxt']?>" height="80" />
<?php
}
}




function returnCT($id, $x)
	{
		$runQuery = mysql_query("SELECT * FROM clients WHERE id = '$id'")or die (mysql_error());
	$getType = mysql_fetch_array($runQuery);
	return $getType["$x"];
	}
	
	
con_close();





