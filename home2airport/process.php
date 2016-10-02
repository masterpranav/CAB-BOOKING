<?php include 'database.php'; ?>
<?php
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$time = $_POST['time'];
$date = $_POST['date'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$dist = $_POST['dist'];
$cost = $dist*15;

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script   src="/js/jquery.min.js"></script>
  <script type="text/javascript" src='/js/design.js'></script>
</head>
<body>
	<div id="form">
	<div class="fish" id="fish"></div>
	<div class="fish" id="fish2"></div>

	<?php
		mysqli_query($link,"INSERT INTO employees (name,mobile,email,`date`,`time`,lat,lng,dist) VALUES ('$name','$mobile','$email','$date','$time','$lat','$lng','$dist')");
		if(mysqli_affected_rows($link) > 0){
			echo "<p>Booking Made Succesfully</p><br>";
			echo "Thank you for using our Cab Services<br>.Your bill costs Rupees".$cost.".<br>You may pay either by cash or Card.<br>Hope to see u again.<br>";
			echo "<a href='index.php'>Go Back</a>";
		} 
		else{
			echo "Booking Was Not Made<br />";
			echo mysqli_error ($link);
		}
	?>			
	</div>

</body>
</html>
