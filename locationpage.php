<!DOCTYPE html>
<script type="text/javascript" src="./js-samples"></script>
<script type="text/javascript" src="./bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="./js-samples/geolocate/geometa.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php include "./header.php" ?>

<?php if (checkAuth(true) != "") { ?>

<html>
  <head>
    <title>Books Near You</title>
    <link type="text/css" rel="stylesheet" href="./css/stylesheet.css"/>
    <link type="text/css" rel="stylesheet" href="./bower_components/semantic/dist/semantic.css"/>
    <link href="./js-samples/geolocate/geolocate.html"/>
    <script type="text/javascript" src="./map.js"></script>
  </head>
  <body>

    <br><br>
    <left class="sitename">BEAVERBOOKS</left>

    <ul class="navbar">
      <li><a href="./home.php">Home</a></li>
      <li><a href="./viewbooks.php">View Books</a></li>
      <li><a href="./yourbooks.php">Your Books</a></li>
      <li><a href="./booksell.php">Sell A Book</a></li>
      <li class="active"><a href="./locationpage.php">Books Near You</a></li>
      <li><a href="./about.html">About</a></li>
      <li style="float:right"><a href="./logout.php">Logout</a></li>

    </ul>

    <center><h1> Books Near You </h1></center>

    <div class="ui divider"></div>

    <div class="textbody">
      <center><p>Click below to see textbooks being sold near you!</p>

        <div class="ui form">

              <button class="ui positive button" id="current" onclick= "getLocation()">Current Location</button>


          <br><br>


        </div></center>
    </div>


    <p id="demo"></p>

<center><div id="mapholder"></div></center>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script>
///////////////////////////////////////////
//GET LOCATION SCRIPT FOR CURRENT LOCATION
//////////////////////////////////////////
var x = document.getElementById("demo");
function getLocation() {
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
} else {
    x.innerHTML = "Geolocation is not supported by this browser.";
}
}

function showPosition(position) {
lat = position.coords.latitude;
lon = position.coords.longitude;
latlon = new google.maps.LatLng(lat, lon)
mapholder = document.getElementById('mapholder')
mapholder.style.height = '500px';
mapholder.style.width = '750px';

var myOptions = {
center:latlon,zoom:10,
mapTypeId:google.maps.MapTypeId.ROADMAP,
mapTypeControl:false,
navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
}

var map = new google.maps.Map(document.getElementById("mapholder"), myOptions);
var marker = new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
}

function showError(error) {
switch(error.code) {
    case error.PERMISSION_DENIED:
        x.innerHTML = "User denied the request for Geolocation."
        break;
    case error.POSITION_UNAVAILABLE:
        x.innerHTML = "Location information is unavailable."
        break;
    case error.TIMEOUT:
        x.innerHTML = "The request to get user location timed out."
        break;
    case error.UNKNOWN_ERROR:
        x.innerHTML = "An unknown error occurred."
        break;
}
}
</script>

		<br><br>

  </body>
</html>

<?php } ?>
<?php include "./quicknav.php" ?>

<?php include "./footer.php" ?>
