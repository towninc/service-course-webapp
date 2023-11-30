<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
<head>
    <title>Add Map</title>
    <script src="https://polyfillo/v3/polyfill.min.js?features=default"></script>
    <?= $this->Html->script("GoogleMap.js") ?>
    <?= $this->Html->css("GoogleMap.css") ?>
</head>
<body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap&v=beta"
        defer></script>

</body>
</html>