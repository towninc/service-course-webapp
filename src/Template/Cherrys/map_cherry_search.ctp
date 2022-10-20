<!-- 小さなプロジェクトですので、可読性のため、style,script共にこちらに記述します -->

<style>
    #map {
        height: 400px;
        width: 100%;
    }
    #credit {
        color: gainsboro;
    }
</style>

<div id="map"></div>
<div class="search">
    <h2 id="text">現在地を選択してください</h2>
    緯度：<span id="lat"></span><br>
    経度：<span id="lng"></span><br>
<button id="btn">この現在地で検索</button>
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
    document.getElementById('lat').textContent = lat;
    document.getElementById('lng').textContent = lng;

    // mapを初期化して追加
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: {lat: 36.38992, lng: 139.06065},
        });

        //初期マーカー
        marker = new google.maps.Marker({
            map: map, position: new google.maps.LatLng(lat, lng),
        });

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
            map: map
        });

        // 座標の中心をずらす
        // http://syncer.jp/google-maps-javascript-api-matome/map/method/panTo/
        map.panTo(lat_lng);
    }

    window.initMap = initMap;

    $('#btn').click(function() {
        $('.search').fadeOut(500)
            .delay(100)
            .queue(function(n) {
                $(this).html("<h2>付近の桜の名所を3件表示します<h2>");
                n();
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
                dataType: 'html',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('X-CSRF-Token', csrf);
                }
            }).done(function(data) {
                // 成功時処理
                $("#res").html(data);
            }).fail(function() {
                // 失敗時処理
                $('#res').html('エラー発生です');
            })
        })
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>