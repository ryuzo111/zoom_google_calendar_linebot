<?php
 function hottopeper() {
    $url = 'http://webservice.recruit.co.jp/hotpepper/gourmet/v1/?key='. $lat . '&lng='. $lon. '&range=5';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $result = json_decode($response, true);

    curl_close($ch);
    return $result;
 }
