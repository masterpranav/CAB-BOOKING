<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <script   src="/js/jquery.min.js"></script>
  <script type="text/javascript" src='/js/design.js'></script>
</head>
<body>

<header>
  <h1>Travel with us</h1>
</header>

<div id="form">

<div class="fish" id="fish"></div>
<div class="fish" id="fish2"></div>

<form id="waterform" method="post" action="process.php">

<div class="formgroup" id="name-form">
    <label for="name">Your name*</label>
    <input type="text" id="name" name="name" />
</div>

<div class="formgroup" id="email-form">
    <label for="email">Your e-mail*</label>
    <input type="email" id="email" name="email" />
</div>

<div class="formgroup" id="message-form">
    <label for="mobile">Your Mobile</label>
    <input type="text" id="mobile" name="mobile" />
</div>

<div class="formgroup">
    <label for="time">Time</label>
    <input type="time" id="time" name="time" />
</div>

<div class="formgroup">
    <label for="date">Date</label>
    <input type="date" name="date" min="2016-09-23"><br>
</div>

<input type="hidden" name="dist" id="dist" >
<input type="hidden" name="lat" id="lat" >
<input type="hidden" name="lng" id="lng" >

<input type="submit" value="Book your Ride" />

 
</form>
</div>

<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alert("Geolocation is not supported by this browser.");
        return;
    }
}

function showPosition(position) {
    lat = position.coords.latitude;
    lng = position.coords.longitude;
}

var dis = document.getElementById("distance");
function calculateDistance(lat1,lon1,lat2,lon2) {
  var R = 6371; // km
  var dLat = (lat2 - lat1).toRad();
  var dLon = (lon2 - lon1).toRad(); 
  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
          Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * 
          Math.sin(dLon / 2) * Math.sin(dLon / 2); 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)); 
  var d = R * c;
  return d;
}
Number.prototype.toRad = function() {
  return this * Math.PI / 180;
}
navigator.geolocation.watchPosition(function(position) {
  var distance = calculateDistance(position.coords.latitude,position.coords.longitude,26.8241187,75.81059930000004);
  document.getElementById('lat').value=position.coords.latitude;
  document.getElementById('lng').value=position.coords.longitude;
  document.getElementById('dist').value=distance;
});
</script>
</body>
</html>


