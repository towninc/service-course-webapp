let data = new Array();

data.push({
    "登録番号":"H0044",
    "施設名称":"札幌グランドホテル",
    "住所":"北海道札幌市中央区北一条西４丁目２番地",
    "電話番号":"011-261-3311",
    "URL":"http://www.grand1934.com/",
    "緯度":43.0626655,
    "経度":141.3504808,
    "場所情報コード":"00001B00000000030BD3D7A6D2B4FFC0"
});

data.push({
    "登録番号":"H0312",
    "施設名称":"センチュリーロイヤルホテル",
    "住所":"北海道札幌市中央区北五条西５の２",
    "電話番号":"011-221-2121",
    "URL":"http://www.cr-hotel.com/",
    "緯度":43.066734,
    "経度":141.3482639,
    "場所情報コード":"00001B00000000030BD42126D28CFFC0"
});

data.push({
    "登録番号":"H0538",
    "施設名称":"ニューオータニイン札幌",
    "住所":"北海道札幌市中央区北二条西１の１",
    "電話番号":"011-222-1111",
    "URL":"http://newotanisapporo.com/",
    "緯度":43.0646399,
    "経度":141.3547747,
    "場所情報コード":"00001B00000000030BD3FBA6D301FFC0"
});

let map;

async function initMap() {
    const position1 = { lat: data[0].緯度, lng: data[0].経度 };
    const position2 = { lat: data[1].緯度, lng: data[1].経度 };
    const position3 = { lat: data[2].緯度, lng: data[2].経度 };
    console.log(position1);

    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerView } = await google.maps.importLibrary("marker");
    map = new Map(document.getElementById("map"), {
        center: position1,
        zoom: 15,
        mapId: "DEMO_MAP_ID",
    });
    const marker1 = new AdvancedMarkerView({
        map: map,
        position: position1,
    });
    const marker2 = new AdvancedMarkerView({
        map: map,
        position: position2 
    })
    const marker3 = new AdvancedMarkerView({
        map: map,
        position: position3 
    })

}

initMap();

