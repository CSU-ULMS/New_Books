<?php
set_time_limit(0);

$ch = curl_init();
$url = 'https://api-eu.hosted.exlibrisgroup.com/almaws/v1/analytics/reports';
$queryParams = '?' . urlencode('path') . '=' . urlencode('/shared/San Diego State University Library/Reports/NewBooks/ByLCClassification/A') . '&' . urlencode('limit') . '=' . urlencode('250') . '&' . urlencode('col_names') . '=' . urlencode('true') . '&' . urlencode('apikey') . '=' . urlencode('l7xx263d03a9ce444beebe54e52aa34002f3');
curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$response = curl_exec($ch);
curl_close($ch);
/* creates xml array */

$my_file = 'b_books.xml';
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$data = $response;
fwrite($handle, $data);

$alma_analytics_result_array = simplexml_load_string($response);

$rowset = $alma_analytics_result_array->QueryResult->ResultXml->rowset;

/* build parameter for each value in the analytics results */

$i=0;
?>