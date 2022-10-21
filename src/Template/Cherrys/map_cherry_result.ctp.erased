<style>
    #big {
        font-size: 1.5em;
    }
    #small {
        font-size: 0.7em;
    }

</style>

<!-- <div id="map"></div> -->

<ol>
    <?php foreach ($cherrys as $cherry) : ?>
        <li>
            <span id="big"> <?= h($cherry['name']) ?> </span> <span id="small"><?= h($cherry['yomi_name']) ?></span> <br>
            <?= h($cherry['pref']) ?><?= h($cherry['city']) ?>にある桜の名所です。
        </li>
    <?php endforeach; ?>
</ol>


<script>
    // ３件のデータを読み込む
    const dataset = [
        <?php foreach ($cherrys as $cherry): ?>
            [<?= $cherry['id'] ?>, '<?= $cherry['name'] ?>', '<?= $cherry['yomi_name'] ?>', '<?= $cherry['pref'] ?>', '<?= $cherry['city'] ?>', <?= $cherry['lat'] ?>, <?= $cherry['lng'] ?>],
        <?php endforeach; ?>
    ];

    // mapを初期化して追加
    function initMap() {
        const locations = new Array(3);
        const markers = new Array(3);

        // dataの座標を保持
        for (let i = 0; i < locations.length; i++) {
            const data = dataset[i];
            locations[i] = {
                lat: data[5],
                lng: data[6]
            };
        }

        // 座標配列が正常に作られているか確認
        console.log(locations);

        // 地図、中央はlocation[0]に
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: {lat: <?= $lat ?>, lng: <?= $lng ?>},
        });

        var yourPosition = new google.maps.Marker({
            position: {lat: <?= $lat ?>, lng: <?= $lng ?>},
            map: map
        });

        // locationを指すmarker
        for (let i = 0; i < markers.length; i++) {
            markers[i] = new google.maps.Marker({
                position: locations[i],
                map: map,
            });
        }
    }

    window.initMap = initMap;

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

