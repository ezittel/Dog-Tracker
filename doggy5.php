<html>
<head>
<title>Dog Chores</title>
<style type="text/css">
body {
  background-color:#5f9ab3;
}
table   { border: 1px solid #ffffff;}
th      { background:#eee; padding:5px; border:1px solid #ccc; }
td      { padding:5px; border :1px solid #ccc; }

</style>


</head>
<body>
<form action="" method="post">
<center>
<table border="0" cellspacing="2" cellpadding="2">
<caption><h1>Dog Day</h1><br><?php echo date('l jS \of F Y h:i:s A'); ?></caption>
<tr>
<th>
Breakfast
</th>
<th>
Morning Potty
</th>
<th>
Walk
</th>
<th>
Dinner
</th>
<th>
Night Potty
</th>
<th>
Nails
</th>
<th>
Teeth
</th>
</tr>

<?php
$username="root";
$password="Dudeman3833";
$database="doggy";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM activity";
$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();

$i=0;
while ($i < $num) {
$id=mysql_result($result,$i,"id");
$breakfast=mysql_result($result,$i,"breakfast");
$morning_potty=mysql_result($result,$i,"morning_potty");
$dinner=mysql_result($result,$i,"dinner");
$night_potty=mysql_result($result,$i,"night_potty");
$walk=mysql_result($result,$i,"walk");
$nails=mysql_result($result,$i,"nails");
$teeth=mysql_result($result,$i,"teeth");

?>
<tr>
<td>
<input type="checkbox" name="breakfast" id="breakfast" value="yes" <?php if ($breakfast =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="morning_potty" id="morning_potty" value="yes" <?php if ($morning_potty =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="walk" id="walk" value="yes" <?php if ($walk =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="dinner" id="dinner" value="yes" <?php if ($dinner =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="night_potty" id="night_potty" value="yes" <?php if ($night_potty =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="nails" id="nails" value="yes" <?php if ($nails =='Y')echo 'checked="checked"'; ?>"/>
</td>
<td>
<input type="checkbox" name="teeth" id="teeth" value="yes" <?php if ($teeth =='Y')echo 'checked="checked"'; ?>"/>
</td>
</tr>




<?php
//echo "Breakfast: $breakfast<br>Morning Potty: $morning_potty<br>Dinner: $dinner<br>Night Potty: $night_potty<br>Walk: $walk<br>Nails: $nails<br>$notes<hr><br>";

$i++;
}

?>
</table>
</form>
<input class="submit" type="submit" value="<?php echo $i; ?>" name="submit">&nbsp;<input class="submit" type="submit" value="Clear" name="clear">&nbsp;
</center>
<?php
 if (isset($_POST['submit']))
{
$username="root";
$password="Dudeman3833";
$database="doggy";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

 $breakfast1 = isset($_POST['breakfast']) ? 'Y' : 'N';
$morning_potty1 = isset($_POST['morning_potty']) ? 'Y' : 'N';
$walk1 = isset($_POST['walk']) ? 'Y' : 'N';
$dinner1 = isset($_POST['dinner']) ? 'Y' : 'N';
$night_potty1 = isset($_POST['night_potty']) ? 'Y' : 'N';
$nails1 = isset($_POST['nails']) ? 'Y' : 'N';
$teeth1 = isset($_POST['teeth']) ? 'Y' : 'N';

// echo $nails1;


 $query = mysql_query("UPDATE activity 
SET breakfast ='$breakfast1',
morning_potty = '$morning_potty1',
walk = '$walk1',
dinner = '$dinner1',
night_potty = '$night_potty1',
nails = '$nails1',
teeth = '$teeth1'
WHERE id='$id'");

$breakfast = $breakfast1;
$morning_potty = $morning_potty1;
$walk = $walk1;
$dinner = $dinner1;
$night_potty = $night_potty1;
$nails = $nails1;
$teeth = $teeth1;


mysql_close();
echo '<meta http-equiv="refresh" content="0" />';

}

if (isset($_POST['clear']))
{
$username="root";
$password="Dudeman3833";
$database="doggy";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");


 $query = mysql_query("UPDATE activity 
SET breakfast ='',
morning_potty = '',
walk = '',
dinner = '',
night_potty = '',
nails = '',
teeth = ''
WHERE id='$id'");

$breakfast = $breakfast1;
$morning_potty = $morning_potty1;
$walk = $walk1;
$dinner = $dinner1;
$night_potty = $night_potty1;
$nails = $nails1;
$teeth = $teeth1;

mysql_close();
echo '<meta http-equiv="refresh" content="0" />';

}


?><center>
<a href="http://raspberrypi/">Home Page</a>
</center>
</body>
</html>
