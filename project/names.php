<?php
$con = mysqli_connect("localhost","root","") or die("problem in connection with mysql");
$db = mysqli_select_db($con,"hospitals") or die("problem in selection of database");
$query='select*from hospital';
?>
  <html>
  <head><title>OpenLayers Marker Popups</title></head>
  <body>
  <script>
  var markers = [
<?php 
if($is_query_run=mysqli_query($con,$query))
{
	while($row=mysqli_fetch_assoc($is_query_run))
	{
	echo "[".$row['Lng'].",".$row['Lat']."\"".$row['Name']."\""."]";
	echo ",";
}
}
?>
];

for (var i=0; i<markers.length; i++) {
  
   var lon = markers[i][0];
   var lat = markers[i][1];

<?php
 //$k="<script>document.write(i)</script>";
 //$k=$k+1;
for($k=1;$k<=9;$k=$k+1)
{
if($is_query_run=mysqli_query($con,"select Name from hospital where Rollno='".$k."'"))
{
	while($row=mysqli_fetch_assoc($is_query_run))
	{
	$name="\"".$row['Name']."\"";
    }
	
} 
}
?> 
var hos_name=<?php echo $name?>;
document.write(hos_name);
document.write(lat); 
} 
</script>
</body>
</html>
 