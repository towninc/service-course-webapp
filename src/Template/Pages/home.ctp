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

</head>

<body>

  <!-- cssの記述 -->
  <style>
    /* マップを保持する要素のサイズを指定 */
    #map {
      height: 400px;
      /* 高さの長さを400ピクセルに */
      width: 100%;
      /* 横の長さをページ長に合わせる */
    }
  </style>

  <!-- APIの読み込み -->
  <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer>
  </script>

  <!-- 地図を追加するコード -->
  <script>
    // 実験的に３件のデータを読み込む
    const dataset = [
      [1, '松前公園', 'まつまえこうえん', '北海道', '松前町', 41.430848, 140.10868],
      [2, '二十間道路桜並木', 'にじゅっけんどうろさくらなみき', '北海道', '新ひだか町', 42.386001, 142.422621],
      [3, '弘前公園', 'ひろさきこうえん', '青森県', '弘前市', 40.608036, 140.463806]
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
