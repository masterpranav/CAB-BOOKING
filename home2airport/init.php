<?php

$db_host        = 'us-cdbr-iron-east-04.cleardb.net';
$db_user        = 'b1c0ffd7bab7ed';
$db_pass        = '61518b44';
$db_database    = 'ad_68476fcdffa6523'; 
$db_port        = '3306';
// us-cdbr-iron-east-04.cleardb.net

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

if(mysqli_connect_errno($link))
{		
		echo 'Failed to connect';
}

mysqli_query($link,"
  CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `dist` float NOT NULL,
  PRIMARY KEY (`id`)
  );
");
		if(!mysqli_connect_errno()){
			echo "<p>Table made Made Added</p>";
			echo "<a href='index.php'>Go Back</a>";
		} 
		else{
			echo "Booking Was Not Made<br />";
			echo mysqli_error ($link);
		}
 
?>
