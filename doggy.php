<?php

if (!$link = mysql_connect('localhost', 'root', 'yourpassword')) {
    echo 'Could still not connect to mysql';
    exit;
}

if (!mysql_select_db('doggy', $link)) {
    echo 'Could not select database';
    exit;
}

$sql    = 'SELECT * FROM activity';
$result = mysql_query($sql, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_assoc($result)) {
    echo $row['breakfast'];
    echo $row['morning_potty'];
}

mysql_free_result($result);

?>
