<?php
$q = intval($_GET['q']);

$con = mysql_connect('localhost','root','');
if (!$con) {
    die('Could not connect: ' . mysql_error($con));
	//echo "Number Two was chosen";
}

mysql_select_db("jakuzaug_monitor");
$sql="SELECT * FROM disease WHERE id = '".$q."'";
$result = mysql_query($sql);

echo "<table>";
while($row = mysql_fetch_array($result)) {
"<tr><th> Disease</th><td> <strong>". $row['disease'] . "</strong></td></tr>";
"<tr><th> Description</th><td>" . $row['description'] ."</td></tr>";
"<tr><th> Symptoms</th><td> ". $row['symptoms'] ."</td></tr>";
"<tr><th> Prevention</th><td>" . $row['prevention'] ."</td></tr>";
"<tr><th> Treatment</th><td> ". $row['treatment'] ."</td></tr>";
  
}
echo "</table>";
mysql_close($con);
?>