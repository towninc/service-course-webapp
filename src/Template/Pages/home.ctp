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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFd7DJ4EbzWeguZ60BSYm5TJ1OdkOdyRY&callback=initMap&v=beta"
        defer></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>