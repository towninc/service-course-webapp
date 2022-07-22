
var map;
var marker = [];
var infoWindow = [];
var markerData = [
  {
    name: '東京',
    lat: 35.6954806,
    lng: 139.76325010000005,
  }, {
    name: '有明テニスの森公園テニス施設',
    lat: 35.63467,
    lng: 139.788526,
  }, {
    name: '東京体育館',
    lat: 35.679396,
    lng: 139.711963,
  }, {
    name: '味の素スタジアム',
    lat: 35.664235,
    lng: 139.527162,
  }

];




function initMap() {
  var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']});
  map = new google.maps.Map(document.getElementById('map'), { 
    center: mapLatLng,
    zoom: 11
  });


  for (var i = 0; i < markerData.length; i++) {
    var markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']});
    marker[i] = new google.maps.Marker({
      position: markerLatLng,
      map: map
    });
  }
   infoWindow[i] = new google.maps.InfoWindow({ 
      content: '<div class="sample">' + markerData[i]['name'] + '</div>' 
    });
    markerEvent(i);
  
  }

    /*marker[0].setOptions({
    icon: {
     url: markerData[0]['icon']
    }
  });*/


function markerEvent(i) {
  marker[i].addListener('click', function() {
     infoWindow[i].open(map, marker[i]);
  });
}

window.initMap = initMap;