<?php
$typess = "|AN 564 ENU|ES 596 LAG|LA 234 ENU|";


$car= array();
$car=explode("|", $typess);

for($x=1;$x<=count($car);$x++)
{
$car_no=$car[$x];

echo $car_no."<br>";

}
?>