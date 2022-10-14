<!-- 小さなプロジェクトですので、可読性のため、style,script共にこちらに記述します -->
<!-- style -->
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>

<button id="btn">テスト</button>

<div id="map"></div>
<h2 id="text">現在地を選択してください</h2>

<div id="res"></div>

<script>
    // mapを初期化して追加
    function initMap() {
        const japan = {
            lat: 36.2048,
            lng: 138.2529
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 5,
            center: japan,
        });
    }

    window.initMap = initMap;
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

<!-- code -->
<?php // CSRFトークン発行（AJAXで利用）
?>
<?= $this->Form->create(null) ?>
<?= $this->Form->end() ?>

<!-- ajax通信で受け取る情報 -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $('#btn').click(function() {
        $('#text').fadeOut(500)
            .delay(100)
            .queue(function(n) {
                $(this).html("付近の桜の名所を3件表示します");
                n();
            }).fadeIn(500);
        $(function() {
            var csrf = $('input[name=_csrfToken]').val();
            $.ajax({
                method: "POST",
                url: "<?= $this->Url->build(['controller' => 'Cherrys', 'action' => 'mapCherryResult']) ?>",
                data: {
                    // ...
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