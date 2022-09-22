/*
const opendata = [
    ['下井草南自転車駐車場', '東京都杉並区下井草2-36-16', 35.7232180756658, 139.627436943207, 24, 100, '03-3397-8251', 'https://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007430.html'],
    ['下井草北第一自転車駐車場', '東京都杉並区井草1-10-17', 35.7244042210801, 139.626738245364, 24, 100, '03-3397-8251', 'http://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007431.html'],
    ['下井草北第二自転車駐車場', '東京都杉並区井草1-2-4', 35.724143955169, 139.624145514824, 24, 100, '03-3395-9677', 'http://www.city.suginami.tokyo.jp/shisetsu/jitensha/seibu/1007432.html'],
];

// Initialize and add the map
function initMap() {
  
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
    }

  }
*/
  
  function ajaxFanction(obj) {
    var data = {
      data: $('[name=huga]').val()
    };
    var csrf = $('input[name=_csrfToken]').val();
      $.ajax({
        type: "POST",
        //url: '<?= $this->Url->build(['controller' => 'bicycles', 'action' => 'translate']) ?>',
        url: "http://localhost:8765/bicycles/translate",
        dataType: "json",
        data: data,
        /*beforeSend: function(xhr) {
          xhr.setRequestHeader('X-CSRF-Token', csrf);
        },*/

        success: function (data, dataType) {
          console.log('Success : ' + data);
          //average
          const center = { lat: 35.69719188, lng: 139.6271358 };
          const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 13,
          center: center,
        });

        window.onload = function(){
          var tbody = document.getElementById('tbodyID');
          for (let i = 0; i < data.length; i++){
            var tr = document.createElement('tr');
            var td1 = document.createElement('td');
            var td2 = document.createElement('td');
            var td3 = document.createElement('td');
            var td4 = document.createElement('td');
            var td5 = document.createElement('td');
            var td6 = document.createElement('td');
            var td7 = document.createElement('td');
            var td8 = document.createElement('td');
            var td9 = document.createElement('td');
            var td10 = document.createElement('td');
            td1.innerHTML = data[i].id;
            td2.innerHTML = data[i].name;
            td3.innerHTML = data[i].location;
            td4.innerHTML = data[i].latitude;
            td5.innerHTML = data[i].longitude;
            td6.innerHTML = data[i].utilization_time;
            td7.innerHTML = data[i].price_per_day;
            td8.innerHTML = data[i].phone_number;
            td9.innerHTML = data[i].capacity;
            td10.innerHTML = data[i].url;
            tbody.appendChild(td1);
            tbody.appendChild(td2);
            tbody.appendChild(td3);
            tbody.appendChild(td4);
            tbody.appendChild(td5);
            tbody.appendChild(td6);
            tbody.appendChild(td7);
            tbody.appendChild(td8);
            tbody.appendChild(td9);
            tbody.appendChild(td10);
            tbody.appendChild(tr);
          }  
        };
        
  
        for (let i = 0; i < data.length; i++){
          const mark = { lat: data[i].latitude, lng: data[i].longitude };

          const contentString =
            '<div id="content">' +
            '<div id="siteNotice">' +
            "</div>" +
            '<h5 id="firstHeading" class="firstHeading">'+data[i].name+'</h5>' +
            '<div id="bodyContent">' +
            '<font size="2">' +
            data[i].location +
            '</font>' +
            "<br>利用時間：" + data[i].utilization_time +
            "<br>1日当たりの料金：" + data[i].price_per_day +
            "<br>収容台数：" + data[i].capacity + "台" +
            "<br>電話番号：" + data[i].phone_number +
            "<br>URL：" + '<a href=' + data[i].url + '>' + data[i].url + '</a>' +
            "</div>" +
            "</div>";
          const marker = new google.maps.Marker({
            position: mark,
            map: map,
            title: data[i].name,
            icon:{
              url:"https://www.silhouette-illust.com/wp-content/uploads/2016/07/4415-300x300.jpg",
              scaledSize: new google.maps.Size(30, 30)
            },
            optimized: false
          });
          

          const infowindow = new google.maps.InfoWindow({
            content: contentString,
          });
          
          marker.addListener("click", () => {
            infowindow.open({
              anchor: marker,
              map,
              shouldFocus: false,
            });
          });
          marker.addListener('closeclick', ()=>{
            infowindow.close();
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
