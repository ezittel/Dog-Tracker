<html>
<head>
<title>Dog Chores</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
body {
  background-color:#5f9ab3;
}
table.topTable   { border: 1px solid #ffffff;font-size:75%;}
table   { border: 1px solid #ffffff;}
th      { background:#eee; padding:5px; border:1px solid #ccc; }
td      { padding:5px; border :1px solid #ccc; }
.footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #efefef;
  text-align: center;
}
</style>

<script type="text/javascript">
	function checkCheckboxState(id){
	var breakfast = "N";
	var day="";
	var morning_potty="N";
	var walk="N";
	var dinner="N";
	var night_potty="N";
	var nails="N";
	var teeth="N";
	if (document.getElementById('breakfast').checked){
		breakfast="Y";
	}
	if (document.getElementById('morning_potty').checked){
		morning_potty="Y";
	}
	if (document.getElementById('walk').checked){
		walk="Y";
	}
	if (document.getElementById('dinner').checked){
		dinner="Y";
	}
	if (document.getElementById('night_potty').checked){
		night_potty="Y";
	}
	if (document.getElementById('nails').checked){
		nails="Y";
	}
	if (document.getElementById('teeth').checked){
		teeth="Y";
	}
	var dayWalker=document.getElementById('todaySel');
	day = dayWalker.options[dayWalker.selectedIndex].text;
	
	$.ajax({
  	  type: "POST",
  	  url: "doggyDbUpdate.php",
  	  data: {id: id, breakfast:breakfast,morning_potty:morning_potty, walk:walk,
	   dinner:dinner,night_potty:night_potty,nails:nails,teeth:teeth,day:day},
  	success: function( result ) {
		location.reload();
  	}
	});

	}


</script>

</head>
<body>
<form action="" method="post">
<center>
<h1>Dog Duties</h1>

<div>
<table class="topTable" border="0" cellspacing="2" cellpadding="2">
<caption><b><h3>Past</h3><b></caption>
<!--#include file="table_header.html" -->

<?php
include 'doggyDBCreds.php';

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM saved_dog_activity";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {
$saved_id=mysql_result($result,$i,"id");
$saved_day=mysql_result($result,$i,"day");
$saved_breakfast=mysql_result($result,$i,"breakfast");
$saved_morning_potty=mysql_result($result,$i,"morning_potty");
$saved_dinner=mysql_result($result,$i,"dinner");
$saved_night_potty=mysql_result($result,$i,"night_potty");
$saved_walk=mysql_result($result,$i,"walk");
$saved_nails=mysql_result($result,$i,"nails");
$saved_teeth=mysql_result($result,$i,"teeth");

?>
<tr>
<td>
<?php echo $saved_day; ?>
</td>
<td>
<?php echo $saved_breakfast; ?>
</td>
<td>
<?php echo $saved_morning_potty; ?>
</td>
<td>
<?php echo $saved_walk; ?>
</td>
<td>
<?php echo $saved_dinner; ?>
</td>
<td>
<?php echo $saved_night_potty; ?>
</td>
<td>
<?php echo $saved_nails; ?>
</td>
<td>
<?php echo $saved_teeth; ?>
</td>
</tr>
<?php
$i++;
}
?>
</table>
</div>
<input class="submit" type="submit" value="New Week" name="submit">&nbsp;


<div>
<table border="0" cellspacing="2" cellpadding="2">
<caption><h3><b>Today</b></h3></caption>
<!--#include file="table_header.shtml" -->

<?php
include 'doggyDBCreds.php';
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM dog_activity";
$result=mysql_query($query);

mysql_close();

$id=mysql_result($result,0,"id");
$day=mysql_result($result,0,"day");
$breakfast=mysql_result($result,0,"breakfast");
$morning_potty=mysql_result($result,0,"morning_potty");
$dinner=mysql_result($result,0,"dinner");
$night_potty=mysql_result($result,0,"night_potty");
$walk=mysql_result($result,0,"walk");
$nails=mysql_result($result,0,"nails");
$teeth=mysql_result($result,0,"teeth");

?>
<tr>
<td>
	<select name="todaySel" id="todaySel" onchange="checkCheckboxState('<?php echo $id; ?>');">
		<option value="" </option>
		<option <?php echo ($day == 'Sunday')?"selected":"" ?> >Sunday</option>
		<option <?php echo ($day == 'Monday')?"selected":"" ?> >Monday</option>
		<option <?php echo ($day == 'Tuesday')?"selected":"" ?> >Tuesday</option>
		<option <?php echo ($day == 'Wednesday')?"selected":"" ?> >Wednesday</option>
		<option <?php echo ($day == 'Thursday')?"selected":"" ?> >Thursday</option>
		<option <?php echo ($day == 'Friday')?"selected":"" ?> >Friday</option>
		<option <?php echo ($day == 'Saturday')?"selected":"" ?> >Saturday</option>
	</select>
</td>
<td>
<input type="checkbox" name="breakfast" id="breakfast" onclick="checkCheckboxState('<?php echo $id; ?>');" value="yes" <?php if ($breakfast =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="morning_potty" id="morning_potty" onclick="checkCheckboxState('<?php echo $id; ?>');" value="yes" <?php if ($morning_potty =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="walk" id="walk" onclick="checkCheckboxState('<?php echo $id; ?>');" value="yes" <?php if ($walk =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="dinner" id="dinner" onclick="checkCheckboxState('<?php echo $id; ?>');" value="yes" <?php if ($dinner =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="night_potty" id="night_potty" onclick="checkCheckboxState('<?php echo $id; ?>');" value="yes" <?php if ($night_potty =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<?php if($day == 'Wednesday' || $day == 'Sunday') : ?>
    <input type="checkbox" name="nails" id="nails" onclick="checkCheckboxState('<?php echo $id; ?>');" value="yes" <?php if ($nails =='Y')echo 'checked="checked"'; ?>"/>
<?php else : ?>
	<hidden name="nails" id="nails"/>
<?php endif; ?>
</td>
<td>
<input type="checkbox" name="teeth" id="teeth" onclick="checkCheckboxState('<?php echo $id; ?>');" value="yes" <?php if ($teeth =='Y')echo 'checked="checked"'; ?>"/>
</td>
</tr>


</table>
</div>
<input class="submit" type="submit" value="Clear" name="submit">&nbsp;
<input class="submit" type="submit" value="Move" name="submit">&nbsp;

</form>
<div class="footer">
<?php echo "Last Updated: " . date('l jS \of F Y h:i:s A'); ?>
</div>
</center>
<?php
include 'doggyDBCreds.php';
 if ($_POST['submit'] == 'New Week')
{
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");


 $query = mysql_query("TRUNCATE TABLE dog_saved_activity");

mysql_close();
echo '<meta http-equiv="refresh" content="0" />';

}

function clear($id){
include 'doggyDBCreds.php';
//echo "<script type='text/javascript'>alert('$id');</script>";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

 $query = mysql_query("UPDATE dog_activity
SET breakfast = '',
day ='',
morning_potty = '',
walk = '',
dinner = '',
night_potty = '',
nails = '',
teeth = ''
WHERE id='$id'");

mysql_close();
echo '<meta http-equiv="refresh" content="0" />';

}

 if ($_POST['submit'] == 'Clear')
{
	clear($id);
}

 if ($_POST['submit'] == 'Move')
{
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$day1 = $_POST['todaySel'];
$breakfast1 = isset($_POST['breakfast']) ? 'Y' : 'N';
$morning_potty1 = isset($_POST['morning_potty']) ? 'Y' : 'N';
$walk1 = isset($_POST['walk']) ? 'Y' : 'N';
$dinner1 = isset($_POST['dinner']) ? 'Y' : 'N';
$night_potty1 = isset($_POST['night_potty']) ? 'Y' : 'N';
$nails1 = isset($_POST['nails']) ? 'Y' : 'N';
$teeth1 = isset($_POST['teeth']) ? 'Y' : 'N';


 $query = mysql_query("
INSERT INTO saved_dog_activity
(id, day, breakfast, morning_potty, dinner, night_potty, walk, nails, teeth) 
VALUES
(null, '$day1',  '$breakfast1', '$morning_potty1', '$dinner1', '$night_potty1', '$walk1', '$nails1', '$teeth1');");


//echo "<script type='text/javascript'>alert('$day1');</script>";


mysql_close();

clear($id);

}


?>

<center>
<a href="http://raspberrypi/">Home Page</a>
</center>
</body>
</html>
