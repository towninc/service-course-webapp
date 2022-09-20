var data = new Array();
data.push({
    "業態": "店舗販売業",
    "施設名称": "ローソン赤坂インターシティＡＩＲ店",
    "施設所在地": "東京都港区赤坂一丁目8番1号",
    "施設方書": "B1",
    "施設電話番号": "03-3583-3939",
    "開設者名称": "有限会社セブンワイズ",
    "許可番号": "31港み生薬第30号",
    "許可開始日": "2019/9/4",
    "緯度":139.742701,
    "経度":35.67005

});
data.push({
    "業態": "店舗販売業",
    "施設名称": "トモズ　アークヒルズ店",
    "施設所在地": "東京都港区赤坂一丁目12番32号",
    "施設方書": "2階",
    "施設電話番号": "03-6277-6381",
    "開設者名称": "株式会社トモズ",
    "許可番号": "29港み生薬第20号",
    "許可開始日": "2017/7/7",
    "緯度":139.740015,
    "経度":35.667137,
});     
data.push({
    "業態": "店舗販売業",
    "施設名称": "薬マツモトキヨシ　溜池山王メトロピア店",
    "施設所在地": "東京都港区赤坂二丁目3番7号先",
    "施設方書": "銀座線溜池山王駅構内",
    "施設電話番号": "03-3582-7800",
    "開設者名称": "株式会社マツモトキヨシ",
    "許可番号": "29港み生薬第87号",
    "許可開始日": "2018/4/25",
    "緯度":139.742096,
    "経度":35.671440,
});

function initMap() {
  // const data1 = { lat:data[0].経度,lng:data[0].緯度}
  // const data2 = { lat:data[1].経度,lng:data[1].緯度}
  // const data3 = { lat:data[2].経度,lng:data[2].緯度}
  // console.log(data1);
  // const map = new google.maps.Map(document.getElementById("map"), {
  //   zoom: 15,
  //   center: data1,
  // });
  // const marker1 = new google.maps.Marker({
  //   position: data1,
  //   map: map,
  // });
  //   const marker2 = new google.maps.Marker({
  //   position: data2,
  //   map: map,
  // });
  // const marker3 = new google.maps.Marker({
  //   position: data3,
  //   map: map,
  // });

}

function AjaxGet() {
    const center = { lat: 35.69786, lng: 139.792409};
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 15,
    center: center,
    });
    $.ajax({
      url: "Childrens/ajaxget",
      type: "GET",
      success: function (response) {
        //通信成功時の処理
        console.log('response ok')
        data = JSON.parse(response);
        console.log(data);
        for (let i = 0; i < data.length; i++){
          const mark = { lat: data[i].latitude, lng: data[i].longitude };
          const marker = new google.maps.Marker({
              position: mark,
              map: map,
              icon: {
                url: "https://japaclip.com/files/baby.png" ,
                scaledSize: new google.maps.Size( 50, 50 ) ,
              }
          });
        }
        document.getElementById('open').onclick = function(){
          for (let i = 0; i < data.length; i++){
            const mark = { lat: data[i].latitude, lng: data[i].longitude };
            let infowindow = new google.maps.InfoWindow({
              content: data[i].name,
              position: mark,
            });
            infowindow.open(map);
          }
        }
        document.getElementById('close').onclick = function(){
          infowindow.close();
        }
        //  一覧表示作成
        var tbody = document.getElementById('tbodyID');
        for (i = 0; i < data.length; i++){
          var tr = document.createElement('tr');
          var td_id = document.createElement('td');td_id.innerHTML = data[i].id;tbody.appendChild(td_id);
          var td_name = document.createElement('td');td_name.innerHTML = data[i].name;tbody.appendChild(td_name);
          var td_address = document.createElement('td');td_address.innerHTML = data[i].address;tbody.appendChild(td_address);
          var td_url = document.createElement('td');td_url.innerHTML = data[i].url;tbody.appendChild(td_url);
          var td_tel = document.createElement('td');td_tel.innerHTML = data[i].tel;tbody.appendChild(td_tel);
          
          tbody.appendChild(tr);
        }
    },
    error: function () {
      //通信失敗時の処理
      console.log('response error')
    }
    });
    
    //sprts
    $.ajax({
      url: "Sports/ajaxget",
      type: "GET",
      success: function (response) {
        //通信成功時の処理
        console.log('response ok sprts_data')
        data_sports = JSON.parse(response);
        console.log(data_sports);
        for (let s = 0; s < data_sports.length; s++){
          const mark_sports = { lat: data_sports[s].longitude, lng: data_sports[s].latitude};
          const marker_sports = new google.maps.Marker({
              position: mark_sports,
              map: map,
              icon: {
                url: "https://3.bp.blogspot.com/-GK5M3Ssqycs/VD3R0tz0RdI/AAAAAAAAoJQ/n42JIfOa7RY/s800/sports_instructor.png" ,
                scaledSize: new google.maps.Size( 50, 50 ) ,
              }
          });
        }

        //  一覧表示作成
        // var tbody = document.getElementById('tbodyID');
        // for (i = 0; i < data.length; i++){
        //   var tr = document.createElement('tr');
        //   var td_id = document.createElement('td');td_id.innerHTML = data[i].id;tbody.appendChild(td_id);
        //   var td_name = document.createElement('td');td_name.innerHTML = data[i].name;tbody.appendChild(td_name);
        //   var td_address = document.createElement('td');td_address.innerHTML = data[i].address;tbody.appendChild(td_address);
        //   var td_url = document.createElement('td');td_url.innerHTML = data[i].url;tbody.appendChild(td_url);
        //   var td_tel = document.createElement('td');td_tel.innerHTML = data[i].tel;tbody.appendChild(td_tel);
          
        //   tbody.appendChild(tr);
        // }
    },
    error: function () {
      //通信失敗時の処理
      console.log('response error')
    }
    });
}

window.initMap = AjaxGet;

function AjaxPost(){
  const Form = document.getElementById('form');
  const formData = new FormData(Form);
  const obj = Object.fromEntries(formData);
  const json_data = JSON.stringify(obj)
  console.log(json_data);
  $.ajax({
    url:"Childrens/ajaxpost",
    type: "POST",
    dataType: "json",
    data: json_data,
    success: function () {
      //通信成功時の処理

  },
  error: function () {
    //通信失敗時の処理

  }
  });
}
