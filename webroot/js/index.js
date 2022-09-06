var data = new Array();
data.push({lat:35.722239,lng:139.674026,name:'哲学堂公園野球場'});
data.push({lat:35.530829,lng:140.269654,name:'土気駅'});
data.push({lat:36.781014,lng:137.107817,name:'あかね丸'});

// Initialize and add the map
function initMap() {
    // The location of Uluru
    const Uluru = { lat: 35.714982, lng: 139.687253 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 6,
      center: Uluru,
    });
    // The marker, positioned at Uluru

    for (i = 0; i < data.length; i++) {
      　create_marker(data[i].lat, data[i].lng);
      }
    
    function create_marker(lat, lng){
      var marker_options = {
        map: map,
        position: new google.maps.LatLng(lat, lng),
      };

      var marker = new google.maps.Marker(marker_options);
    }


  }
  
  window.initMap = initMap;