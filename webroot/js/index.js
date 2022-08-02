// Initialize and add the map
function initMap() {
    // The location of places
    const ary=[];
    const set=[];
    ary.push({ lat: -25.344, lng: 131.031 });
    ary.push({lat:-33.856778,lng:151.215278});
    const uluru = { lat: -25.344, lng: 131.031 };
    const tokyo={lat:35.6809591,lng:139.7673068};
    ary.push(tokyo);
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: tokyo,
    });
    // The marker, positioned at Uluru
    /*const marker = new google.maps.Marker({
      position: ary[0],
      map: map,
    });*/
    
    for(const elem of ary){
      const marker = new google.maps.Marker({
        position: elem,
        map: map,
      });
      set.push(marker);
    }
    
  }
  
  window.initMap = initMap;