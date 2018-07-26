<?php
include "includes/connect.php";
con();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/favicon.png" type="image/png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include "includes/title.php"; ?></title>
<script src="js/jquery.1.7.1.js"></script>
<script src="js/jCorners.js"></script>
<script src="js/jfunctions.js"></script>
<script src="js/jmodal.js"></script>
<script src="js/tableCloth.js"></script>
<script type="text/javascript">
$(function () {
    // On document ready, call visualize on the datatable.
    $(document).ready(function() {
        /**
         * Visualize an HTML table using Highcharts. The top (horizontal) header
         * is used for series names, and the left (vertical) header is used
         * for category names. This function is based on jQuery.
         * @param {Object} table The reference to the HTML table to visualize
         * @param {Object} options Highcharts options
         */
        Highcharts.visualize = function(table, options) {
            // the categories
            options.xAxis.categories = [];
            $('tbody th', table).each( function(i) {
                options.xAxis.categories.push(this.innerHTML);
            });
    
            // the data series
            options.series = [];
            $('tr', table).each( function(i) {
                var tr = this;
                $('th, td', tr).each( function(j) {
                    if (j > 0) { // skip first column
                        if (i == 0) { // get the name and init the series
                            options.series[j - 1] = {
                                name: this.innerHTML,
                                data: []
                            };
                        } else { // add values
                            options.series[j - 1].data.push(parseFloat(this.innerHTML));
                        }
                    }
                });
            });
    
            var chart = new Highcharts.Chart(options);
        }
    
        var table = document.getElementById('datatable'),
        options = {
            chart: {
                renderTo: 'chartArea',
                type: 'column'
            },
            title: {
                text: 'Income/Expenditure Chart'
            },
            xAxis: {
            },
            yAxis: {
                title: {
                    text: 'Units'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        addCommas(this.y) +' '+ this.x
                }
            }
        };
    
        Highcharts.visualize(table, options);
    });
    
});
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}
		</script>
	
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>


<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="leftPanel">
<div class="logo">


</div>

<div class="left_Panel_Links">

<ul>
<li><a href="" class="active">Dash Board</a></li>
<li><a href="clients/">Clients</a></li>
<li><a href="transactions/">Transactions</a></li>
<li><a href="personel/">Personel</a></li>
<li><a href="fleet/">Fleet</a></li>
<li><a href="settings/">Settings</a></li>


</ul>

</div>


</div>

<div class="rightPanel">
<div id="chartArea"  style="width: 1000px; height: 550px; margin: 0 auto;">

<table id="datatable">
	<thead>
		<tr>
			<th></th>
			<th>Income</th>
			<th>Expenditure</th>
		</tr>
	</thead>
	<tbody>
    
    <?
	
	$cmt;
	$cyr;
	$cdy;
	$cmt=date("m")*1;
	$cyr=date("Y")*1;
	$cdy=date("d")*1;
	$pay=array('January'=>0,'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0);
	$rev=array('January'=>0,'February'=>0,'March'=>0,'April'=>0,'May'=>0,'June'=>0,'July'=>0,'August'=>0,'September'=>0,'October'=>0,'November'=>0,'December'=>0);
	
	$mont=array('January','February','March','April','May','June','July','August','September','October','November','December');
	
//	con();
	$sql_p="Select amount, dates from payment";
	$sql_r="Select amount, dates from receipt";
	
	$p=mysql_query($sql_p) or die(mysql_error());
	$r=mysql_query($sql_r)or die(mysql_error());
	while($datP=mysql_fetch_array($p))
	{
		$dt=explode(",",$datP['dates']);
		if(($dt[2]==$cyr) &&($dt[1]*1<=$cmt))
		{
			$tm=$dt[1]*1;
			switch($tm)
			{
				case 1:
				$pay['January']+=$datP['amount'];
				break;
				
				case 2:
				$pay['February']+=$datP['amount'];
				break;
				case 3:
				$pay['March']+=$datP['amount'];
				break;
				
				case 4:
				$pay['April']+=$datP['amount'];
				case 5:
				$pay['May']+=$datP['amount'];
				break;
				
				case 6:
				$pay['June']+=$datP['amount'];
				break;
				case 7:
				$pay['July']+=$datP['amount'];
				break;
				
				case 8:
				$pay['August']+=$datP['amount'];
				break;
				case 9:
				$pay['September']+=$datP['amount'];
				break;
				
				case 10:
				$pay['October']+=$datP['amount'];
				break;
				case 11:
				$pay['November']+=$datP['amount'];
				break;
				
				case 12:
				$pay['December']+=$datP['amount'];
				break;
		}
		
		}
	}
			while($datR=mysql_fetch_array($r))
	{
		unset($dt);
		$dt=explode(',',$datR['dates']);
		if(($dt[2]==$cyr) &&($dt[1]*1<=$cmt))
		{
			$tm=$dt[1]*1;
			switch($tm)
			{
				case 1:
				$rev['January']+=$datR['amount'];
				break;
				
				case 2:
				$rev['February']+=$datR['amount'];
				break;
				case 3:
				$rev['March']+=$datR['amount'];
				break;
				
				case 4:
				$rev['April']+=$datR['amount'];
				break;
				case 5:
				$rev['May']+=$datR['amount'];
				break;
				
				case 6:
				$rev['June']+=$datR['amount'];
				break;
				case 7:
				$rev['July']+=$datR['amount'];
				break;
				
				case 8:
				$rev['August']+=$datR['amount'];
				break;
				case 9:
				$rev['September']+=$datR['amount'];
				break;
				case 10:
				$rev['October']+=$datR['amount'];
				case 11:
				$rev['November']+=$datR['amount'];
				break;
				case 12:
				$rev['December']+=$datR['amount'];
				break;
		}
		
	}
	
	}
	for($x=0;$x<count($mont);$x++)
	{
	 if($pay[$mont[$x]]>0 || $rev[$mont[$x]]>0 )
	{
		
		echo "<tr><th>".$mont[$x].' '.$cy."</th><td>".$rev[$mont[$x]]."</td><td>".$pay[$mont[$x]]."</td></tr>";
		
		}
	}

	?>
</tbody>
</table>

</div>

</div>


	

</body>
</html>
<?php 	con_close(); ?>