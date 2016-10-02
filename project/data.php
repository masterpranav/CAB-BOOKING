<?php
$con = mysqli_connect("localhost","root","") or die("problem in connection with mysql");
$db = mysqli_select_db($con,"test") or die("problem in selection of database");
$query='select*from hospital';
$mylng=73.033611;
$mylat=26.270556;
$add="Our College Location";
?>
<html>
  <head><title>OpenLayers Marker Popups</title></head>
  <body>
  <p>HOSPITALS LIST</p>
  <TABLE BORDER="1">
  <TD><a href="aiims.php">1.AIIMS Hospital</a></TD>   
  <TD><a href="MATHURADAS.php">4.Mathuradas Mathur Hospital</a></TD>      
  <TD><a href="MAHATMAGANDHI.php">7.Mahatma Gandhi Hospital</a></TD>
  <TD><a href="GOYAL.php">10.Goyal Hospital</a></TD>
  <TD><a href="MEDIPULSE.php">13.Medipulse Hospitals</a></TD>
  <TR>
  <TD><a href="KOTHARI.php">2.Kothari Hospital</a></TD>
  <TD><a href="UMAID.php">5.Umaid Hospital</a></TD>
  <TD><a href="RAJ.php">8.Raj hospital</a></TD>
  <TD><a href="vasan.php">11.Vasan Eye Care Hospital</a></TD>
  <TD><a href="JEEVANJYOTI.php">14.Jeevan Jyoti Hospital</a></TD>
  </TR>
  <TR>
  <TD><a href="KAMLANAGAR.php">3.Kamla Nagar Hospital</a></TD>
  <TD><a href="ASGEYE.php">6.Asg Eye Hospital</a></TD>
  <TD><a href="PRAKARTIK.php">9.Prakratik Shikitsalaya</a></TD>
  <TD><a href="SARASWATI.php">12.Saraswati Hospital and Siwach Orthopaedic Centre</a></TD>
  <TD><a href="MANIDHARI.php">15.Manidhari Hospital</a></TD>
  </TR>
  </TABLE>
  <p><a href="isro.php">BACK</a></p>
  <div id="mapdiv"></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());
    
    epsg4326 =  new OpenLayers.Projection("EPSG:4326"); //WGS 1984 projection
    projectTo = map.getProjectionObject(); //The map projection (Spherical Mercator)
   
    var lonLat = new OpenLayers.LonLat(73.0161,26.2845).transform(epsg4326, projectTo);
          
    
    var zoom=14;
    map.setCenter (lonLat, zoom);

    var vectorLayer = new OpenLayers.Layer.Vector("Overlay");
    
    var markers = [
<?php 
if($is_query_run=mysqli_query($con,$query))
{
	while($row=mysqli_fetch_assoc($is_query_run))
	{
	echo "[".$row['Lng'].",".$row['Lat']."]";
	echo ",";
}
}
?>
];
var SNo = [
<?php 
if($is_query_run=mysqli_query($con,$query))
{
	while($row=mysqli_fetch_assoc($is_query_run))
	{
	echo $row['SNo'].",";
	echo ",";
}
}
?>
];
var myadd=[
<?php
echo $mylng.",".$mylat.","."\"".$add."\"";
?>
];   
//Loop through the markers array
   var num = 1;
for (var i=0; i<markers.length; i++) {
  
   var lon = markers[i][0];
   var lat = markers[i][1];

   var hos_name="Hospital";
	var feature = new OpenLayers.Feature.Vector(
			new OpenLayers.Geometry.Point(lon,lat).transform(epsg4326, projectTo),
			{description:hos_name+" "+num} ,
			{externalGraphic: 'img/marker.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
		);             
	vectorLayer.addFeatures(feature);
	num=num+1;
} 
var mylng=myadd[0];
var mylat=myadd[1];
var add=myadd[2];
var feature = new OpenLayers.Feature.Vector(
			new OpenLayers.Geometry.Point(mylng,mylat).transform(epsg4326, projectTo),
			{description:add} ,
			{externalGraphic: 'img/marker-gold.png', graphicHeight: 25, graphicWidth: 21, graphicXOffset:-12, graphicYOffset:-25  }
		);             
	vectorLayer.addFeatures(feature);                      
                     

   
    map.addLayer(vectorLayer);
 
    
    //Add a selector control to the vectorLayer with popup functions
    var controls = {
      selector: new OpenLayers.Control.SelectFeature(vectorLayer, { onSelect: createPopup, onUnselect: destroyPopup })
    };

    function createPopup(feature) {
      feature.popup = new OpenLayers.Popup.FramedCloud("pop",
          feature.geometry.getBounds().getCenterLonLat(),
          null,
          '<div class="markerContent">'+feature.attributes.description+'</div>',
          null,
          true,
          function() { controls['selector'].unselectAll(); }
      );
      //feature.popup.closeOnMove = true;
      map.addPopup(feature.popup);
    }

    function destroyPopup(feature) {
      feature.popup.destroy();
      feature.popup = null;
    }
    
    map.addControl(controls['selector']);
    controls['selector'].activate();
      
  </script>
  
</body></html>
    