<?php

define("NEWS_API_KEY", "74559b2b9cc14c92a61d67db9d8d0755");

function fetchNews($page = 1, $pageSize = 10) {
    $query = "tesla";
    $fromDate = date('Y-m-d', strtotime('-1 day'));


    $url = "https://newsapi.org/v2/everything?q=$query&from=$fromDate&sortBy=publishedAt&pageSize=$pageSize&page=$page&apiKey=" . NEWS_API_KEY;

    $headers = [
        "User-Agent: MyNewsApp/1.0"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if ($response === false) {
        die("<strong>Error:</strong> No se pudo conectar con NewsAPI (cURL Error): " . curl_error($ch));
    }

    curl_close($ch);

    $data = json_decode($response, true);

    if (!isset($data['status']) || $data['status'] !== 'ok') {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die("<strong>Error:</strong> NewsAPI devolvió una respuesta inválida.");
    }

    return $data;
}



function fetchRandomUsers($count) {
    $url = "https://randomuser.me/api/?results=$count";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        die("<strong>Error:</strong> No se pudo conectar con randomuser.me (cURL Error): " . curl_error($ch));
    }

    curl_close($ch);

    $data = json_decode($response, true);

    return $data['results'];
}
