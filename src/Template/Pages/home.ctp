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





<!-- ここからHTML本文 -->

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
</head>

<body>

  <!-- cssの記述 -->
  <style>
    /* Set the size of the div element that contains the map */
    #map {
      height: 400px;
      /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
  </style>

  <!-- APIの読み込み -->
  <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer>
  </script>

  <!-- 地図を追加するコード -->
  <script>
    // 実験的に３件のデータを読み込む
    const dataset = [
      [1, '松陰神社', 'しょういんじんじゃ', '東京都', '世田谷区', 35.64718, 139.65612],
      [2, '豪徳寺', 'ごうとくじ', '東京都', '世田谷区', 35.64897, 139.64745],
      [3, '太子堂八幡神社', 'たいしどうはちまんじんじゃ', '東京都', '世田谷区', 35.64755, 139.66518]
    ];

    // mapを初期化して追加
    function initMap() {
      const locations = new Array(3);
      const markers = new Array(3);

      // dataの座標を保持
      for (let i = 0; i < locations.length; i++) {
        const data = dataset[i];
        locations[i] = { lat: data[5], lng: data[6] };
      }
      
      // 座標配列が正常に作られているか確認
      console.log(locations);

      // 地図、中央はlocation[0]に
      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: locations[0],
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


  <!-- 内容 -->
  <h3>My Google Maps Demo</h3>

  <!-- map用のdivブロック-->
  <div id="map"></div>

</body>

</html>