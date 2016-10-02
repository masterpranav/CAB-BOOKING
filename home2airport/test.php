<?php

$db_host        = 'us-cdbr-iron-east-04.cleardb.net';
$db_user        = 'ba7b26bd0f5e2e';
$db_pass        = 'ca941d98';
$db_database    = 'ad_159c7cbbcb11a30'; 
$db_port        = '3306';
// us-cdbr-iron-east-04.cleardb.net

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

if(mysqli_connect_errno($link))
{		
		echo 'Failed to connect';
}

$result = mysqli_query($link,"select * from employees");
if(!mysqli_connect_errno()){
	echo "<p>Table made Made Added</p>";
	echo "<a href='index.php'>Go Back</a>";
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  var_dump($row);
	echo mysqli_error ($link);
} 
else{
  echo "Booking Was Not Made<br />";
}

?>
