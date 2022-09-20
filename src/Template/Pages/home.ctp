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
    <script type="text/javascript">
    console.log("Hello");
    </script>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('GoogleMap.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->script('GoogleMap.js') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">

</head>
<body class="home">
    <div class="head">
        <h1>預けてスポーツ！～墨田区～  </h1>
        <label>定期利用保育園</label>
        <input type="button" id="open" value="開く">
        <input type="button" id="close" value="閉じる">
        <label>スポーツ施設</label>
        <input type="button" id="open_sports" value="開く">
        <input type="button" id="close_sports" value="閉じる">
    </div>
    <div id="map"></div>
    <form action="/register" method="POST" id='form'>
        <div class="serch">
            <label>絞り込む</label>
            <input type="text" placeholder="〇〇保育園" name="serch_text">
        </div>
        <input type="button"value="検索"id="serch_button"onclick="AjaxPost()">
    </form>
    <label>定期利用保育園</label>
    <table>
        <thead>
            <tr>
            <td>ID</td>
            <td>施設名</td>
            <td>住所</td>
            <td>URL</td>
            <td>電話番号</td>
            </tr>
        </thead>
        <tbody id="tbodyID">
            <!-- ここをループ -->
        </tbody>
    </table>
    <label>スポーツ施設</label>
    <table>
        <thead>
            <tr>
            <td>ID</td>
            <td>施設名</td>
            <td>住所</td>
            <td>URL</td>
            <td>電話番号</td>
            </tr>
        </thead>
        <tbody id="tbodyID2">
        </tbody>
    </table>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=weekly"
        defer
    ></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
</body>
</html>
