<div id="map"></div>
<div class="search">
    <h2 id="text">あなたの現在地をクリックしてください</h2>
    緯度：<span id="lat"></span><br>
    経度：<span id="lng"></span><br>
</div>
<div id="res"></div>



<!-- code -->
<?php // CSRFトークン発行（AJAXで利用）
?>
<?= $this->Form->create(null) ?>
<?= $this->Form->end() ?>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    var marker = null;
    var lat = 36.38992;
    var lng = 139.06065;
    var cherrys = null;
    $("#res").hide();

    // mapを初期化して追加
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: {lat: 36.38992, lng: 139.06065},
        });

        //初期マーカー
        marker = new google.maps.Marker();

        // クリックイベントを追加
        map.addListener('click', function(e) {
            lat = Math.round(e.latLng.lat()*1000000)/1000000;
            lng = Math.round(e.latLng.lng()*1000000)/1000000;
            getClickLatLng(e.latLng, map);
        });
    }

    function getClickLatLng(lat_lng, map) {
      
        // 座標を表示
        document.getElementById('lat').textContent = lat;
        document.getElementById('lng').textContent = lng;
                            
        //マーカーの更新
        marker.setMap(null);
        marker = null;
        marker = new google.maps.Marker({
            position: lat_lng,
            map: map,
        });
        
        // 座標の中心をずらす
        // http://syncer.jp/google-maps-javascript-api-matome/map/method/panTo/
        map.panTo(lat_lng);

        // 付近の桜の名所３地点を検索、マーカー表示
        $('.search').fadeOut(500)
            .delay(100)
            .queue(function(n) {
                $(this).html("<h2>付近の桜の名所を3件表示します<h2>"); n();
            }).fadeIn(500);
            $(function() {
                var csrf = $('input[name=_csrfToken]').val();
                $.ajax({
                    method: "POST",
                    url: "<?= $this->Url->build(['controller' => 'Cherrys', 'action' => 'mapCherryResult']) ?>",
                    data: {
                        lat: lat,
                        lng: lng
                    },
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-Token', csrf);
                    }
                }).done(function(data) {
                    // 成功時処理

                    // データを変数cherrysに格納
                    cherrys = data.cherrys;
                    console.log(cherrys);
                    // 名前を表示するテキストを記述
                    $('#res').html('<ol id="list"></ol>');
                    cherrys.forEach(cherry => {
                        $('#list').append('<li> <span id="big"> ' + cherry['name'] + ' </span> <span id="small">' + cherry['yomi_name'] + '</span> <br>')
                        .append(cherry['pref'] + cherry['city'] + 'にある桜の名所です。</li>');
                    });
                    $('#res').fadeIn(500);

                    //マーカーの更新
                    cherrys.forEach(cherry => {
                        
                        marker = new google.maps.Marker({
                            animation: google.maps.Animation.DROP,
                            position: { lat: parseFloat(cherry['lat']), lng: parseFloat(cherry['lng']) },
                            map: map,
                            icon: '<?= $this->Url->image('sakura-icon0103.png') ?>'
                        });                   
                    });
                }).fail(function() {
                    // 失敗時処理
                    $('#res').html('エラー発生です');
                })
            });
    }
    window.initMap = initMap;
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

