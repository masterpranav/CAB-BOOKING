<?php
$con = mysqli_connect("localhost","root","") or die("problem in connection with mysql");
$db = mysqli_select_db($con,"hospitals") or die("problem in selection of database");
$query='select*from hospital';
?>
  <html>
  <head><title>OpenLayers Marker Popups</title></head>
  <body>
  <script>
 
<?php 
if($is_query_run=mysqli_query($con,$query))
{
	while($row=mysqli_fetch_assoc($is_query_run))
	{
	$lng=$row['Lng'];
	$lat=$row['Lat'];
	$name="\"".$row['Name']."\"";
	<script>
	         var lng=<?php echo $lng ?>;
	         var lat=<?php echo $lat ?>;
	         var name=<?php echo $name?>;
			 document .write(name);
			 
    </script>
    }
} 
?> 

</script>
</body>
</html>
 