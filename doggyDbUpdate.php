<?php
include 'doggyDBCreds.php';
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");


$id1=$_POST['id'];
$breakfast1=$_POST['breakfast'];
$day1 = $_POST['day'];
$morning_potty1 = $_POST['morning_potty'];
$walk1 = $_POST['walk'];
$dinner1 = $_POST['dinner'];
$night_potty1 = $_POST['night_potty'];
$nails1 = $_POST['nails'];
$teeth1 = $_POST['teeth'];


//echo "'<script>console.log(\"$id1\")</script>'";

 $query = mysql_query("UPDATE dog_activity
SET breakfast ='$breakfast1',
day='$day1',
morning_potty='$morning_potty1',
walk='$walk1',
dinner='$dinner1',
night_potty='$night_potty1',
nails='$nails1',
teeth='$teeth1'
WHERE id='$id1'");



mysql_close();

?>

