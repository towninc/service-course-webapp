let map;
let markers = [];

// Google Maps初期化
async function initMap() {
    // console.log("success loading map");
    const { Map, LatLngBounds } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

    const center = { lat: 36.0047, lng: 137.5936 };
    map = new Map(document.getElementById("map"), {
        center: center,
        zoom: 10,
        mapId: "DEMO_MAP_ID",
    });
    // console.log("center:",center)

    // 表示領域に応じて、領域内のホテルをマーカー表示
    map.addListener('idle', function() {
        handleMapIdle(AdvancedMarkerView);
    });
}

function handleMapIdle(Marker) {
    const bounds = map.getBounds();
    const ne = bounds.getNorthEast(); // 北東の座標
    const sw = bounds.getSouthWest(); // 南西の座標
    console.log("NorthWest:", { "lat": ne.lat(), "lng": ne.lng() })
    $.ajax({
        url: "/Hotels/ajaxRequest",
        type: "GET",
        dataType: "json",
        data: {
            neLat: ne.lat(),
            neLng: ne.lng(),
            swLat: sw.lat(),
            swLng: sw.lng()
        }
    })
    .then(function (data) {
        // console.log("Success fetching data", data)
        // サーバーからのデータを処理
        showMarkers(data, Marker);
    })
    .catch(function (error) {
        console.error("Error fetching data:", error)
    });
}

function showMarkers(hotelData, Marker) {
    clearMarkers();

    hotelData.forEach((hotel) => {
        const marker = new Marker({
            map: map,
            position: { lat: parseFloat(hotel.latitude), lng: parseFloat(hotel.longitude) },
            title: hotel.name,
        });
        markers.push(marker)
    });
}

function clearMarkers() {
    markers.forEach((marker) => marker.setMap(null));
    markers = [];
}

initMap();
