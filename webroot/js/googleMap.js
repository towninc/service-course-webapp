// 墨田区のAED設置場所のデータセット（施設名、所在地、緯度、経度、電話番号、施設概要、URL）
const placementOfAEDList = [
    ['両国シティコア' , '墨田区両国二丁目10番14号', 35.693887, 139.79269, '03-5624-1151', '使用可能時間帯：常時', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['スポーツクラブルネサンス両国', '墨田区両国二丁目10番14号 両国シティコア4階', 35.693879, 139.792769, '03-5600-5400', '使用可能時間帯：午前10時～午後11時（土曜日は午後9時30分、日曜日は午後8時まで、月曜日・年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html'],
    ['財団法人東京都結核予防会', '墨田区両国四丁目5番9号', 35.692559, 139.796028, '03-3633-4053', '使用可能時間帯：午前9時～午後5時（土・日曜日・祝日・年末年始は除く）', 'https://www.city.sumida.lg.jp/kenko_fukushi/kenko/iryou_kyuukyuu/aed/aedsetup.html']
];

// Initialize and add the map
function initMap() {
    // マップの中心を都庁に設定（緯度lat, 経度lng）
    const TOKYO_GOVEMENT_OFFICE = { lat: 35.689, lng: 139.691 };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 12,
      center: TOKYO_GOVEMENT_OFFICE,
    });
    // The marker, positioned at TOKYO_GOVEMENT_OFFICE
    const marker = new google.maps.Marker({
      position: TOKYO_GOVEMENT_OFFICE,
      map: map,
    });
    
    // 墨田区のAEDの設置場所を描画
    for(let i = 0; i < placementOfAEDList.length; i++){
        const eachPlacementOfAED = placementOfAEDList[i];
        const eachLatitude = eachPlacementOfAED[2]
        const eachLongitude = eachPlacementOfAED[3]
        const eachLocation = {
            lat: eachLatitude,
            lng: eachLongitude
        };

        const eachMeker = new google.maps.Marker({
            position: eachLocation,
            map: map
        });
    };
}
  
window.initMap = initMap;