@extends('layout.app')


<html>
<head>
</head>
<body>

<form method="post">
  <p>Enter Your Street name,City state,Country</p>
  <textarea name='address' placeholder='Street name,City state,Country'></textarea>
  <input type="submit" name="submit_address" value="Get Coordinates">
</form>



</body>
</html>


<?php
if(isset($_POST['submit_address']))
{
  $address =$_POST['address']; // Google HQ
  $prepAddr = str_replace(' ','+',$address);
  $sd = urlencode( $prepAddr );
  $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$sd.'&key=AIzaSyC-Cco4bsvBySwkZesWzDsI-1k0TV29jbM');
  $output= json_decode($geocode);
  $latitude = $output->results[0]->geometry->location->lat;
  $longitude = $output->results[0]->geometry->location->lng;
  echo "latitude - ".$latitude;
  echo "longitude - ".$longitude;
}


?>

<!DOCTYPE html>
<html>
  <head>
    <style>
       /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 30.7208817, lng: 76.8591235};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap">
    </script>
  </body>
</html>



AIzaSyC-Cco4bsvBySwkZesWzDsI-1k0TV29jbM


<?php 

$lat = 30.713700;
$lon = 76.732510;
$distance = 5; 
$R = 6371;

$maxLat = $lat + rad2deg($distance/$R);
$minLat = $lat - rad2deg($distance/$R);
$maxLon = $lon + rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
$minLon = $lon - rad2deg(asin($distance/$R) / cos(deg2rad($lat)));


echo "<br>";
echo  $minLat;
// 30.668733919704
echo "<br>";
echo $maxLat;
//30.758666080296



?>