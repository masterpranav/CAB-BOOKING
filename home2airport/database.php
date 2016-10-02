
<?php
// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// $db_host        = 'us-cdbr-iron-east-04.cleardb.net';
// $db_user        = 'b1c0ffd7bab7ed';
// $db_pass        = '61518b44';
// $db_database    = 'ad_68476fcdffa6523'; 
// $db_port        = '3306';

$server = "us-cdbr-iron-east-04.cleardb.net";
$username = "b1c0ffd7bab7ed";
$password = "61518b44";
$db = "ad_68476fcdffa6523";

$link = new mysqli($server, $username, $password, $db);


if(mysqli_connect_errno($link))
{		
		echo 'Failed to connect';
}
?>