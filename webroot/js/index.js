/*
const opendata = [
    ['下井草南自転車駐車場', '東京都杉並区下井草2-36-16', 35.7232180756658, 139.627436943207, 24, 100, '03-3397-8251', 'https://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007430.html'],
    ['下井草北第一自転車駐車場', '東京都杉並区井草1-10-17', 35.7244042210801, 139.626738245364, 24, 100, '03-3397-8251', 'http://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007431.html'],
    ['下井草北第二自転車駐車場', '東京都杉並区井草1-2-4', 35.724143955169, 139.624145514824, 24, 100, '03-3395-9677', 'http://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007432.html'],
];
*/




// Initialize and add the map
function initMap() {
  /*
    // The location of 下井草南自転車駐車場
    const center = { lat: 35.7232180756658, lng: 139.627436943207 };
    // The map, centered at 下井草南自転車駐車場
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: center,
    });

    for (let i = 0; i < data.length; i++){
        debug(data[2]);
        const mark = { lat: data[2], lng: data[3] };

        const marker = new google.maps.Marker({
            position: mark,
            map: map,
          });
    }*/

  }

  function ajaxFanction(obj) {
    var data = {
      data: $('[name=huga]').val()
    };
      $.ajax({
        url: "http://localhost:8765/bicycles",
        type: "POST",
        dataType: "json",
        data: data,
        success: function (data, dataType) {
          json = eval("(" + response + ")");
          data = JSON.parse(response);
          console.log('Success : ' + data);
  
          const center = { lat: 35.7232180756658, lng: 139.627436943207 };
        // The map, centered at 下井草南自転車駐車場
          const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 10,
          center: center,
        });
  
          for (let i = 0; i < data.length; i++){
            const mark = { lat: data[2], lng: data[3] };
    
            const marker = new google.maps.Marker({
                position: mark,
                map: map,
            });
          }
  
      },
      error: function (data, dataType) {
        console.log('Error : ' + data);
      }
      });
  }

  
  //window.initMap = initMap;
  window.initMap = ajaxFanction;
