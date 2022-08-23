// Initialize and add the map
function initMap() {
    // The location of places
    const ary=[];
    const set=[];
    var data_json;
    var d;
    //data={};

    $.ajax({
      url: 'hoge/ajaxTest', //アクセスするURL
      type: 'get', //post or get
      cache: false,        //cacheを使うか使わないかを設定
      dataType:'json',     //data type script・xmlDocument・jsonなど
      //data:data,           //アクセスするときに必要なデータを記載      
    })
    .done(function(data) { 
       //通信成功時の処理
       //成功したとき実行したいスクリプトを記載
       console.log(data);
       d=data;
      
       /*var data_stringify = JSON.stringify(data);
       data_json = JSON.parse(data_stringify);
       print(data_json=>length);*/

       console.log('Success : '/*+ data*/);
       //print("o3");
       const uluru = { lat: -25.344, lng: 131.031 };
    const tokyo={lat:35.6809591,lng:139.7673068};
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: tokyo,
    });

    function clickEventFunc(event) {
      alert("position:"+event.latLng.toString());
      for(const elem of data){
        console.log(elem.longitude==event.latLng.lat()&&elem.lengitude==event.latLng.lng());
        if(elem.longitude==event.latLng.lat()&&elem.lengitude==event.latLng.lng()){
          alert("name:"+elem.name);
        }
      }
    }
   
    
    for(const elem of data){
      console.log(elem.latitude+":"+elem.longitude);
      const marker = new google.maps.Marker({
        position: {lat:elem.longitude,lng:elem.latitude},
        map: map,
      });
      set.push(marker);
      google.maps.event.addListener(marker, 'click', clickEventFunc);
    }
    const marker = new google.maps.Marker({
      position: { lat: -25.344, lng: 131.031 },
      map: map,
    });
    set.push(marker);
    
    
       
       
       
       
       
    })
    .fail(function(xhr) {  
      console.log(xhr);
      
      //通信失敗時の処理
      //失敗したときに実行したいスクリプトを記載
      console.log('Error : ' /*+ data*/);
    });   

    /*
    $.ajax({
      url:"http://localhost:8765/hoge/ajaxTest",
      type:"GET",
      dataType:"json",
      //data:String,
      success:function (data, dataType) {
        //通信成功時の処理
        console.log('Success : ' + data);
      },
      error:function (data, dataType) {
          //通信失敗時の処理
        console.log('Error : ' + data);
      },
    });*/
    /*
    for(const elem of data_json){
      print(elem);
      //ary.push({lat:data(1),lng:data(2)});
    }*/
    


    /*ary.push({ lat: -25.344, lng: 131.031 });
    ary.push({lat:-33.856778,lng:151.215278});
    const uluru = { lat: -25.344, lng: 131.031 };
    const tokyo={lat:35.6809591,lng:139.7673068};
    ary.push(tokyo);*/
    // The map, centered at Uluru
    
    
    /*for(const elem of d){
      //print(data_json);
      ary.push({lat:elem["latitude"],lng:elem["longitude"]});
    }*/
    
    
  }
  window.initMap = initMap;
  
  