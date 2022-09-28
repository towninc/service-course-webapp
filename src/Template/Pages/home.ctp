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
<html>
  <head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->script('/js/index') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
   
  </head>
  <body>
  <div class="center"><h2>杉並区駐輪場</h2>
  <label>
      検索欄
  </label></div>
  <form>
    <div class="center">
      <input type="text" id="search_text" size="12" placeholder="お探しの駐輪場">
      <input type="button" value="検索" id="search">
    </div>
  </form>
  <div id="map"></div>
  <br>
    <h4>
      オープンデータ一覧
    </h4>
    <table border="1">
      <thead>
        <tr>
            <th>id</th>
            <th>名称</th>
            <th>所在地</th>
            <th>緯度</th>
            <th>経度</th>
            <th>利用時間</th>
            <th>1日当たりの料金</th>
            <th>電話番号</th>
            <th>収容台数</th>
            <th>URL</th>
        </tr>
      </thead>
      <tbody id="tbodyID">
      </tbody>
    </table>
    <!--The div element for the map -->

    <!--
     The `defer` attribute causes the callback to execute after the full HTML
     document has been parsed. For non-blocking uses, avoiding race conditions,
     and consistent behavior across browsers, consider loading using Promises
     with https://www.npmjs.com/package/@googlemaps/js-api-loader.
    -->
    
    <script
      src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly"
      defer
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    let button = document.getElementById('search');
    button.addEventListener('click', ajaxSearch);
    </script>
  </body>
  <meta name="_csrfToken" content="{{ csrf_token() }}">
</html>
