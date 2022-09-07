<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript">
        // Initialize and add the map
        function initMap() {
            // locArrayにピンの位置を格納 (東京駅,皇居,未来科学館)
            const locArray =[[35.681236,139.767125],[35.685175,139.7528],[35.619336,139.7764]];
            //1つ目のピン
            const loc0 = new google.maps.LatLng(locArray[0][0],locArray[0][1]);
            // htmlの取得とズーム、中心位置の設定
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15,
                center: loc0,
            });
            const marker0 = new google.maps.Marker({
                position: loc0,
                map:map
            });
            //2つ目のピン
            const loc1 = new google.maps.LatLng(locArray[1][0],locArray[1][1]);
            const marker1 = new google.maps.Marker({
                position: loc1,
                map:map
            });
            //3つ目のピン
            const loc2 = new google.maps.LatLng(locArray[2][0],locArray[2][1]);
            const marker2 = new google.maps.Marker({
                position: loc2,
                map:map
            });
        }
        window.initMap = initMap;
    </script>
    <!-- <script>
        function ajaxFanction(obj) {
        var data = {
            data: $('[name=huga]').val()
        };
            $.ajax({
            url: "/CakeProj/Hoge/ajaxTest",
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
  </script> -->
    <style>
        /* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!--
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
      defer
    ></script>
    <script src="ajax.js"></script>
  </body>
</html>
