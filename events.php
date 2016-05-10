<?php
session_start();
?>
<html>
<head>

</head>
<style>
body{
	background-color: #edd9c0;
}
</style>
<body>
<center>
<br>
<?php
include 'header.php';
	echo '<form action="events.php?d='.$_GET["d"].'" method="POST" >';
	$date1=date_parse($_GET["d"]);
	$monthName=date("F",mktime(0,0,0,$date1["month"]));
	echo 'Events on'.' '.$date1["day"].' '.$monthName.' '.$date1["year"] ;
	echo '<br>';
	if ($_POST['button']){
		if (empty($_SESSION[$events.$_GET["d"]])){
			$_SESSION[$events.$_GET["d"]]=array();
			array_push($_SESSION[$events.$_GET["d"]],$_POST['event']);
		}
		else {
		array_push($_SESSION[$events.$_GET["d"]],$_POST['event']);
		}
	}else{
		$date2=$_POST['chgdate'];
		if (empty($_SESSION[$events.$date2])){
			$_SESSION[$events.$date2]=array();
			array_push($_SESSION[$events.$date2],$_POST['event']);
		}
		else {
			array_push($_SESSION[$events.$date2],$_POST['event']);
		}
	}
	foreach($_SESSION[$events.$_GET["d"]] as $result){
		echo $result;
		echo '<br>';
	}
	echo '<br>';
 	echo '<textarea rows="4" cols="50" name="event"></textarea>';
	echo '<br>';
	echo '<input type="submit" name="button" value="Submit">';
	echo '<br>';
	echo 'if you want to move event to another date, please state the date below';
	echo '<br>';
	echo '<input type="text" name="chgdate">';
	echo '<br>';
	echo '<input type="submit" name="button1" value="Submit">';
	echo '</form>';
include 'footer.php';
?>
</center>
</body>
</html>
