<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- 内容 -->
    <h3>My Google Maps Demo</h3>

    <div id="map"></div>

    <!-- コード類 -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        function ajaxFunction(obj) {
            var data = {
                data: $('[name=huga]').val()
            };
            $.ajax({
                url: "http://linkdata.org/api/1/rdf1s544i/100Cherry_List/datapackage.json",
                type: "POST",
                dataType: "json",
                data: data,
                success: function (data, dataType) {
                    //通信成功時の処理
                    console.log('Success : ' + data);
                },
                error: function (data, dataType) {
                //通信失敗時の処理
                    console.log('Error : ' + data);
                }
            });
        }   
        // // 実験的に３件のデータを読み込む
        // const dataset = [
        //     [1, '松前公園', 'まつまえこうえん', '北海道', '松前町', 41.430848, 140.10868],
        //     [2, '二十間道路桜並木', 'にじゅっけんどうろさくらなみき', '北海道', '新ひだか町', 42.386001, 142.422621],
        //     [3, '弘前公園', 'ひろさきこうえん', '青森県', '弘前市', 40.608036, 140.463806]
        // ];

        // // mapを初期化して追加
        // function initMap() {
        //     const locations = new Array(3);
        //     const markers = new Array(3);

        //     // dataの座標を保持
        //     for (let i = 0; i < locations.length; i++) {
        //         const data = dataset[i];
        //         locations[i] = {
        //             lat: data[5],
        //             lng: data[6]
        //         };
        //     }

        //     // 座標配列が正常に作られているか確認
        //     console.log(locations);

        //     // 地図、中央はlocation[0]に
        //     const map = new google.maps.Map(document.getElementById("map"), {
        //         zoom: 4,
        //         center: locations[0],
        //     });

        //     // locationを指すmarker
        //     for (let i = 0; i < markers.length; i++) {
        //         markers[i] = new google.maps.Marker({
        //             position: locations[i],
        //             map: map,
        //         });
        //     }
        // }
        
        // window.initMap = initMap;

    </script>
    <script>
        // // 実験的に３件のデータを読み込む
        // const dataset = [
        //     [1, '松前公園', 'まつまえこうえん', '北海道', '松前町', 41.430848, 140.10868],
        //     [2, '二十間道路桜並木', 'にじゅっけんどうろさくらなみき', '北海道', '新ひだか町', 42.386001, 142.422621],
        //     [3, '弘前公園', 'ひろさきこうえん', '青森県', '弘前市', 40.608036, 140.463806]
        // ];

        // // mapを初期化して追加
        // function initMap() {
        //     const locations = new Array(3);
        //     const markers = new Array(3);

        //     // dataの座標を保持
        //     for (let i = 0; i < locations.length; i++) {
        //         const data = dataset[i];
        //         locations[i] = {
        //             lat: data[5],
        //             lng: data[6]
        //         };
        //     }

        //     // 座標配列が正常に作られているか確認
        //     console.log(locations);

        //     // 地図、中央はlocation[0]に
        //     const map = new google.maps.Map(document.getElementById("map"), {
        //         zoom: 4,
        //         center: locations[0],
        //     });

        //     // locationを指すmarker
        //     for (let i = 0; i < markers.length; i++) {
        //         markers[i] = new google.maps.Marker({
        //             position: locations[i],
        //             map: map,
        //         });
        //     }
        // }
        
        // window.initMap = initMap;
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script> -->

</body>

</html>