<?php
//require_once 'GMaps.php';
		
// Your Google key
$google_key = 'AIzaSyCqqqHKC97UGLp-bqwcwj-c-oO6wOA24ug';


//echo $GMap->getLatitude();
?>



<!DOCTYPE html>
<html>
<head>
<script
src="http://maps.googleapis.com/maps/api/js?libraries=drawing,geometry&sensor=true">


</script>

<script>

// === first support methods that don't (yet) exist in v3
google.maps.LatLng.prototype.distanceFrom = function(newLatLng) {
  var EarthRadiusMeters = 6378137.0; // meters
  var lat1 = this.lat();
  var lon1 = this.lng();
  var lat2 = newLatLng.lat();
  var lon2 = newLatLng.lng();
  var dLat = (lat2-lat1) * Math.PI / 180;
  var dLon = (lon2-lon1) * Math.PI / 180;
  var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(lat1 * Math.PI / 180 ) * Math.cos(lat2 * Math.PI / 180 ) *
    Math.sin(dLon/2) * Math.sin(dLon/2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = EarthRadiusMeters * c;
  return d;
}

google.maps.LatLng.prototype.latRadians = function() {
  return this.lat() * Math.PI/180;
}

google.maps.LatLng.prototype.lngRadians = function() {
  return this.lng() * Math.PI/180;
}

// === A method for testing if a point is inside a polygon
// === Returns true if poly contains point
// === Algorithm shamelessly stolen from http://alienryderflex.com/polygon/ 
google.maps.Polygon.prototype.Contains = function(point) {
  var j=0;
  var oddNodes = false;
  var x = point.lng();
  var y = point.lat();
  for (var i=0; i < this.getPath().getLength(); i++) {
    j++;
    if (j == this.getPath().getLength()) {j = 0;}
    if (((this.getPath().getAt(i).lat() < y) && (this.getPath().getAt(j).lat() >= y))
    || ((this.getPath().getAt(j).lat() < y) && (this.getPath().getAt(i).lat() >= y))) {
      if ( this.getPath().getAt(i).lng() + (y - this.getPath().getAt(i).lat())
      /  (this.getPath().getAt(j).lat()-this.getPath().getAt(i).lat())
      *  (this.getPath().getAt(j).lng() - this.getPath().getAt(i).lng())<x ) {
        oddNodes = !oddNodes
      }
    }
  }
  return oddNodes;
}

// === A method which returns the approximate area of a non-intersecting polygon in square metres ===
// === It doesn't fully account for spherical geometry, so will be inaccurate for large polygons ===
// === The polygon must not intersect itself ===
google.maps.Polygon.prototype.Area = function() {
  var a = 0;
  var j = 0;
  var b = this.Bounds();
  var x0 = b.getSouthWest().lng();
  var y0 = b.getSouthWest().lat();
  for (var i=0; i < this.getPath().getLength(); i++) {
    j++;
    if (j == this.getPath().getLength()) {j = 0;}
    var x1 = this.getPath().getAt(i).distanceFrom(new google.maps.LatLng(this.getPath().getAt(i).lat(),x0));
    var x2 = this.getPath().getAt(j).distanceFrom(new google.maps.LatLng(this.getPath().getAt(j).lat(),x0));
    var y1 = this.getPath().getAt(i).distanceFrom(new google.maps.LatLng(y0,this.getPath().getAt(i).lng()));
    var y2 = this.getPath().getAt(j).distanceFrom(new google.maps.LatLng(y0,this.getPath().getAt(j).lng()));
    a += x1*y2 - x2*y1;
  }
  return Math.abs(a * 0.5);
}

// === A method which returns the length of a path in metres ===
google.maps.Polygon.prototype.Distance = function() {
  var dist = 0;
  for (var i=1; i < this.getPath().getLength(); i++) {
    dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i-1));
  }
  return dist;
}

// === A method which returns the bounds as a GLatLngBounds ===
google.maps.Polygon.prototype.Bounds = function() {
  var bounds = new google.maps.LatLngBounds();
  for (var i=0; i < this.getPath().getLength(); i++) {
    bounds.extend(this.getPath().getAt(i));
  }
  return bounds;
}

// === A method which returns a GLatLng of a point a given distance along the path ===
// === Returns null if the path is shorter than the specified distance ===
google.maps.Polygon.prototype.GetPointAtDistance = function(metres) {
  // some awkward special cases
  if (metres == 0) return this.getPath().getAt(0);
  if (metres < 0) return null;
  if (this.getPath().getLength() < 2) return null;
  var dist=0;
  var olddist=0;
  for (var i=1; (i < this.getPath().getLength() && dist < metres); i++) {
    olddist = dist;
    dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i-1));
  }
  if (dist < metres) {
    return null;
  }
  var p1= this.getPath().getAt(i-2);
  var p2= this.getPath().getAt(i-1);
  var m = (metres-olddist)/(dist-olddist);
  return new google.maps.LatLng( p1.lat() + (p2.lat()-p1.lat())*m, p1.lng() + (p2.lng()-p1.lng())*m);
}

// === A method which returns an array of GLatLngs of points a given interval along the path ===
google.maps.Polygon.prototype.GetPointsAtDistance = function(metres) {
  var next = metres;
  var points = [];
  // some awkward special cases
  if (metres <= 0) return points;
  var dist=0;
  var olddist=0;
  for (var i=1; (i < this.getPath().getLength()); i++) {
    olddist = dist;
    dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i-1));
    while (dist > next) {
      var p1= this.getPath().getAt(i-1);
      var p2= this.getPath().getAt(i);
      var m = (next-olddist)/(dist-olddist);
      points.push(new google.maps.LatLng( p1.lat() + (p2.lat()-p1.lat())*m, p1.lng() + (p2.lng()-p1.lng())*m));
      next += metres;    
    }
  }
  return points;
}

// === A method which returns the Vertex number at a given distance along the path ===
// === Returns null if the path is shorter than the specified distance ===
google.maps.Polygon.prototype.GetIndexAtDistance = function(metres) {
  // some awkward special cases
  if (metres == 0) return this.getPath().getAt(0);
  if (metres < 0) return null;
  var dist=0;
  var olddist=0;
  for (var i=1; (i < this.getPath().getLength() && dist < metres); i++) {
    olddist = dist;
    dist += this.getPath().getAt(i).distanceFrom(this.getPath().getAt(i-1));
  }
  if (dist < metres) {return null;}
  return i;
}

// === A function which returns the bearing between two vertices in decgrees from 0 to 360===
// === If v1 is null, it returns the bearing between the first and last vertex ===
// === If v1 is present but v2 is null, returns the bearing from v1 to the next vertex ===
// === If either vertex is out of range, returns void ===
google.maps.Polygon.prototype.Bearing = function(v1,v2) {
  if (v1 == null) {
    v1 = 0;
    v2 = this.getPath().getLength()-1;
  } else if (v2 ==  null) {
    v2 = v1+1;
  }
  if ((v1 < 0) || (v1 >= this.getPath().getLength()) || (v2 < 0) || (v2 >= this.getPath().getLength())) {
    return;
  }
  var from = this.getPath().getAt(v1);
  var to = this.getPath().getAt(v2);
  if (from.equals(to)) {
    return 0;
  }
  var lat1 = from.latRadians();
  var lon1 = from.lngRadians();
  var lat2 = to.latRadians();
  var lon2 = to.lngRadians();
  var angle = - Math.atan2( Math.sin( lon1 - lon2 ) * Math.cos( lat2 ), Math.cos( lat1 ) * Math.sin( lat2 ) - Math.sin( lat1 ) * Math.cos( lat2 ) * Math.cos( lon1 - lon2 ) );
  if ( angle < 0.0 ) angle  += Math.PI * 2.0;
  angle = angle * 180.0 / Math.PI;
  return parseFloat(angle.toFixed(1));
}


var EarthRadiusMeters = 6378137.0; // meters
/* Based the on the Latitude/longitude spherical geodesy formulae & scripts
   at http://www.movable-type.co.uk/scripts/latlong.html
   (c) Chris Veness 2002-2010
*/ 
google.maps.LatLng.prototype.DestinationPoint = function (brng, dist) {
var R = EarthRadiusMeters; // earth's mean radius in meters
var brng = brng.toRad();
var lat1 = this.lat().toRad(), lon1 = this.lng().toRad();
var lat2 = Math.asin( Math.sin(lat1)*Math.cos(dist/R) + 
                      Math.cos(lat1)*Math.sin(dist/R)*Math.cos(brng) );
var lon2 = lon1 + Math.atan2(Math.sin(brng)*Math.sin(dist/R)*Math.cos(lat1), 
                             Math.cos(dist/R)-Math.sin(lat1)*Math.sin(lat2));

return new google.maps.LatLng(lat2.toDeg(), lon2.toDeg());
}

// === A function which returns the bearing between two LatLng in radians ===
// === If v1 is null, it returns the bearing between the first and last vertex ===
// === If v1 is present but v2 is null, returns the bearing from v1 to the next vertex ===
// === If either vertex is out of range, returns void ===
google.maps.LatLng.prototype.Bearing = function(otherLatLng) {
  var from = this;
  var to = otherLatLng;
  if (from.equals(to)) {
    return 0;
  }
  var lat1 = from.latRadians();
  var lon1 = from.lngRadians();
  var lat2 = to.latRadians();
  var lon2 = to.lngRadians();
  var angle = - Math.atan2( Math.sin( lon1 - lon2 ) * Math.cos( lat2 ), Math.cos( lat1 ) * Math.sin( lat2 ) - Math.sin( lat1 ) * Math.cos( lat2 ) * Math.cos( lon1 - lon2 ) );
  if ( angle < 0.0 ) angle  += Math.PI * 2.0;
  if ( angle > Math.PI ) angle -= Math.PI * 2.0; 
  return parseFloat(angle.toDeg());
}


/**
 * Extend the Number object to convert degrees to radians
 *
 * @return {Number} Bearing in radians
 * @ignore
 */ 
Number.prototype.toRad = function () {
  return this * Math.PI / 180;
};

/**
 * Extend the Number object to convert radians to degrees
 *
 * @return {Number} Bearing in degrees
 * @ignore
 */ 
Number.prototype.toDeg = function () {
  return this * 180 / Math.PI;
};

/**
 * Normalize a heading in degrees to between 0 and +360
 *
 * @return {Number} Return 
 * @ignore
 */ 
Number.prototype.toBrng = function () {
  return (this.toDeg() + 360) % 360;
};

var infowindow = new google.maps.InfoWindow(
  { 
    size: new google.maps.Size(150,50)
  });


function createMarker(latlng, html) {
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });
    bounds.extend(latlng);
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });
}



function drawArc(center, initialBearing, finalBearing, radius) { 
var d2r = Math.PI / 180;   // degrees to radians 
var r2d = 180 / Math.PI;   // radians to degrees 

   var points = 32; 

   // find the raidus in lat/lon 
   var rlat = (radius / EarthRadiusMeters) * r2d; 
   var rlng = rlat / Math.cos(center.lat() * d2r); 

   var extp = new Array();

   var deltaBearing = (finalBearing - initialBearing)/points;
   for (var i=0; (i < points+1); i++) 
   { 
      extp.push(center.DestinationPoint(initialBearing + i*deltaBearing, radius)); 
      bounds.extend(extp[extp.length-1]);
   } 
   return extp;
   }




function drawCircle(point, radius) { 
var d2r = Math.PI / 180;   // degrees to radians 
var r2d = 180 / Math.PI;   // radians to degrees 
var EarthRadiusMeters = 6378137.0; // meters
var earthsradius = 3963; // 3963 is the radius of the earth in miles

   var points = 32; 

   // find the raidus in lat/lon 
   var rlat = (radius / EarthRadiusMeters) * r2d; 
   var rlng = rlat / Math.cos(point.lat() * d2r); 


   var extp = new Array(); 
   for (var i=0; i < points+1; i++) // one extra here makes sure we connect the 
   { 
      var theta = Math.PI * (i / (points/2)); 
      ey = point.lng() + (rlng * Math.cos(theta)); // center a + radius x * cos(theta) 
      ex = point.lat() + (rlat * Math.sin(theta)); // center b + radius y * sin(theta) 
      extp.push(new google.maps.LatLng(ex, ey)); 
      bounds.extend(extp[extp.length-1]);
   } 
   // alert(extp.length);
   return extp;
   }

var map = null;
var bounds = null;

function initialize() {
  var myOptions = {
    zoom: 10,
    center: new google.maps.LatLng(-33.9, 151.2),
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map_canvas"),
                                myOptions);
 
  bounds = new google.maps.LatLngBounds();

  google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
        });

  var startPoint = new google.maps.LatLng(48.610335003092956, -1.6123447775299600);
  var endPoint = new google.maps.LatLng(48.596190206866830,-1.5551704322317228);
  var centerPoint = new google.maps.LatLng(48.565630000000006, -1.6050300000000002);
  createMarker(startPoint,"start: "+startPoint.toUrlValue(6)+"<br>distance to center: "+(centerPoint.distanceFrom(startPoint)/1000).toFixed(3)+" km<br>Bearing: "+centerPoint.Bearing(startPoint)+"<br><a href='javascript:map.setCenter(new google.maps.LatLng("+startPoint.toUrlValue(6)+"));map.setZoom(20);'>zoom in</a> - <a href='javascript:map.fitBounds(bounds);'>zoom out</a>");
  createMarker(endPoint,"end: "+endPoint.toUrlValue(6)+"<br>distance to center: "+(centerPoint.distanceFrom(endPoint)/1000).toFixed(3)+" km<br>Bearing: "+centerPoint.Bearing(endPoint)+"<br><a href='javascript:map.setCenter(new google.maps.LatLng("+endPoint.toUrlValue(6)+"));map.setZoom(20);'>zoom in</a> - <a href='javascript:map.fitBounds(bounds);'>zoom out</a>");
  createMarker(centerPoint,"center: "+centerPoint.toUrlValue(6));

 /* var arc = new google.maps.Polyline({
                 path: [drawCircle(centerPoint,  5000)],
                 strokeColor: "#0000FF",
                 strokeOpacity: 0.4,
                 strokeWeight: 4
     });
     arc.setMap(map);*/

	  var lineSymbol = {
        path: 'M 0,-0.5 0,0.5',
        strokeWeight: 2,
        strokeOpacity: 1,
        scale: 3
    };

  var arc = new google.maps.Polyline({
                 path: [drawArc(centerPoint, centerPoint.Bearing(startPoint), centerPoint.Bearing(endPoint), 5000)],
                 strokeColor: "#FF0000",
				strokeColor: "red",
        strokeOpacity: 0,
        icons: [{
            icon: lineSymbol,
            offset: '100%',
            repeat: '10px'}],
                 
                 
     });
     arc.setMap(map);
 
 /* var startLine = new google.maps.Polyline({
                 path: [centerPoint, startPoint],
                 strokeColor: "#00FF00",
                 strokeOpacity: 0.2,
                 strokeWeight: 2
     });
     startLine.setMap(map);

  var endLine = new google.maps.Polyline({
                 path: [centerPoint, endPoint],
                 strokeColor: "#00FF00",
                 strokeOpacity: 0.2,
                 strokeWeight: 2
     });
     endLine.setMap(map);
  var arc2 = new google.maps.Polyline({
                 path: [drawArc(centerPoint, centerPoint.Bearing(startPoint), centerPoint.Bearing(endPoint), centerPoint.distanceFrom(startPoint))],
                 strokeColor: "#00FF00",
                 strokeOpacity: 0.2,
                 strokeWeight: 2
     });
     arc2.setMap(map);*/

 map.fitBounds(bounds);


google.maps.event.addDomListener(window, 'load', initialize);

}
</script>
</head>

<body onload="initialize()">


<div id="map_canvas" style="width:600px;height:600px;"></div>


</body>
</html>

