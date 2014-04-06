<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url()?>site_media/css/bootstrap.min.css">
        <style>
            body {
              padding: 0;
            }
            #map-canvas{
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
            }
        </style>

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.1.0.min.js"></script>
        <![endif]-->
    </head>
    <body>
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AlertaSAPAO</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url()?>">Inicio</a></li>
            <li class="active"><a href="<?php echo site_url()?>/inicio/mapa">Mapa</a></li>
            <li><a href="<?php echo site_url()?>/inicio/reportes">Reportes</a></li>
            <li><a href="<?php echo site_url()?>/inicio/estadisticas">Estadisticas</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

      <div id="map-canvas"></div>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
        <script src="<?php echo base_url()?>site_media/js/vendor/jquery-1.11.0.min.js"></script>
                <script src="<?php echo base_url()?>site_media/js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript">
         var triangleCoords =[];
            var i = 0;
            $(function(){
                var points = []
                 $.ajax({
                    url:"<?php echo site_url('inicio/polygons');?>",
                    type:'GET',
                    dataType:'JSON',
                    async:false,
                    success:function(data){
                        $(data).each( function(index, val) {
                            if(i == parseInt(val.id))
                            {
                                points.push(new google.maps.LatLng(parseFloat(val.latitud),parseFloat(val.longitud)));
                            }else{
                                var Triangle = new google.maps.Polygon({
                                  paths: points,
                                  strokeColor: '#FF0000',
                                  strokeOpacity: 0.8,
                                  strokeWeight: 2,
                                  fillColor: '#'+genColor(),
                                  fillOpacity: 0.35
                                });
                                triangleCoords.push(Triangle);
                                points = [];
                                i++;
                            }
                        });
                        var Triangle = new google.maps.Polygon({
                            paths: points,
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#'+genColor(),
                            fillOpacity: 0.35
                        });
                        triangleCoords.push(Triangle);
                    }
                 })
            })

function genColor() {
  var r = Math.floor(Math.random() * 255);
  var g = Math.floor(Math.random() * 255);
  var b = Math.floor(Math.random() * 255);

  r = Math.floor(r);
  g = Math.floor(g);
  b = Math.floor(b);

  if (r < 50 && g < 50 && b < 50) r += 50;

  if (r > 150 && g > 150 && b > 150) r -= 100;

  if (Math.abs(r - g) < 50 && Math.abs(r - b) < 50 && Math.abs(g - b) < 50) {
    if (r > 50) r -= 50;
    if (g > 50) g -= 50;
    if (b < 200) b += 50;
  }

  var rstr = r.toString(16);
  var gstr = g.toString(16);
  var bstr = b.toString(16);

  if (rstr.length === 1) {
    rstr = "0" + rstr;
  }
  if (gstr.length === 1) {
    gstr = "0" + gstr;
  }
  if (bstr.length === 1) {
    bstr = "0" + bstr;
  }

  return rstr + gstr + bstr;
}
        </script>
        <script type="text/javascript">
        var map;
        var style_array = [
                            {
                                "featureType": "administrative",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            },
                            {
                                "featureType": "road",
                                "elementType": "labels",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            },
                            {
                                "featureType": "water",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            },
                            {
                                "featureType": "transit",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "simplified"
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "visibility": "on"
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "visibility": "on"
                                    }
                                ]
                            },
                            {
                                "featureType": "water",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "color": "#84afa3"
                                    },
                                    {
                                        "lightness": 52
                                    }
                                ]
                            },
                            {
                                "featureType": "all",
                                "elementType": "all",
                                "stylers": [
                                    {
                                        "saturation": -17
                                    },
                                    {
                                        "gamma": 0.36
                                    }
                                ]
                            },
                            {
                                "featureType": "transit.line",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#3f518c"
                                    }
                                ]
                            }
                        ];

function initialize() {
  var mapOptions = {
    zoom: 15
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  for (var i = triangleCoords.length - 1; i >= 0; i--) {
      triangleCoords[i].setMap(map);
  };
  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var marker = new google.maps.Marker({
          position: pos,
          map: map,
          title: 'Aqui Toy XD',
          icon:"<?php echo base_url()?>site_media/img/marker.png",
          animation: google.maps.Animation.DROP
      });
      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);
        </script>

    </body>
</html>
