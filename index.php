<html>
<head>

</head>
<style>
body{
	background-color: #edd9c0;
}
table{
	
	border-collapse: collapse;
	border: 2px solid black;
	
	width: 394;
	background-color: #c9d8c5;
	
}
th{
	border-collapse: collapse;
	border: 2px solid black;
	font-family: "Times New Roman", Times, serif;
	font-size: 40px;
	background-color: #7d4627;
	
}
td{
	border-collapse: collapse;
	border: 2px solid black;
	width:62;
	padding: 15px;
	text-align: center;
}

</style>
<center>
<body>


<?php

  	$date=time ();
	$day=date('d',$date);
	//$month=date('m',$date);
	$year=date('Y',$date);
	
	$month=$_GET["m"];	
	
	
	if($month==null){
		$month=date('m',$date);
	}else{
		$command=$_GET["nav"];
		if($command=='n'){
			$month=$month+1;
		
			$month=$month%13;

			if($month==0){
				$month=1;
			}
		}else if($command=='p'){
		$month=$month-1;
			if($month==0){
				$month=12;
			}
		}
	}

	$first_day=mktime(0,0,0,$month,1,$year);

	$day_of_week=date('D',$first_day);
	$title=date('F',$first_day);
	switch($day_of_week){
		case "Sun": $blank=0;break;
		case "Mon": $blank=1;break;
		case "Tue": $blank=2;break;
		case "Wed": $blank=3;break;
		case "Thu": $blank=4;break;
		case "Fri": $blank=5;break;
		case "Sat": $blank=6;break;
	}

$days_in_month=cal_days_in_month(0,$month,$year); //Return the number of days in a month for a given year and calendar
echo "</br>";
echo "</br>";
echo"<table>";
echo'<tr><th colspan=60;><a href="index.php?m
='.$month.'&nav=p"><</a> '.strtoupper($title).' '. $year.' <a href="index.php?m
='.$month.'&nav=n" >></a></th></tr>';

echo"<tr><td>Sun</td><td>Mon</td><td>Tue</td>
<td>Wed</td><td>Thu</td><td>Fri</td><td>Sat</td>";
$monthName=date("M",mktime(0,0,0,$month));
$day_count=1;

echo"<tr>";
while
( $blank >0)
{ 
	echo "<td></td>";
	$blank=$blank-1;
	$day_count++;
}

$day_num=1;
$month_num=0;

while( $day_num <=$days_in_month)
{
	if($day==$day_num && $month==date('m',$date)){
	echo '<td bgcolor="#a8b6bf"><a href="events.php?d='.$day_num.strtoupper($monthName).$year.'">'.$day_num.'</a></td>';
	}
	else{
	echo'<td> <a href="events.php?d='.$day_num.strtoupper($monthName).$year.'">'.$day_num.'</a> </td>';
	}
		
	$day_num++;
	$day_count++;

	if($day_count>7)
	{
		echo"</tr><tr>";
		$day_count=1;
	}
}

while( $day_count>1 && $day_count<=7)
{
	echo "<td></td>";

	$day_count++;
}

echo"</tr></table>";

?>


</center>
</body>
</html>
