//opendata
const opendata = [
    ['下井草南自転車駐車場', '東京都杉並区下井草2-36-16', 139.627436943207, 35.7232180756658, '利用時間：24時間', '03-3397-8251', 'https://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007430.html'],
    ['下井草北第一自転車駐車場', '東京都杉並区井草1-10-17', 139.626738245364, 35.7244042210801, '利用時間：24時間', '03-3397-8251', 'http://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007431.html'],
    ['下井草北第二自転車駐車場', '東京都杉並区井草1-2-4', 139.624145514824, 35.724143955169, '利用時間：24時間', '03-3395-9677', 'http://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007432.html'],
];


// Initialize and add the map
function initMap() {
    // The location of 下井草南自転車駐車場
    const center = { lat: 35.7232180756658, lng: 139.627436943207 };
    // The map, centered at 下井草南自転車駐車場
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 17,
      center: center,
    });

    for (let i = 0; i < opendata.length; i++){
        const mark = { lat: opendata[i][3], lng: opendata[i][2] };

        const marker = new google.maps.Marker({
            position: mark,
            map: map,
          });
    }
  }
  
  window.initMap = initMap;