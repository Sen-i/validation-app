<?php
require_once('index.php');

$url = 'https://s3.amazonaws.com/cognisant-interview-resources/identifiers.json';
$arrayOfIds = getData($url);

function getData(string $url): array
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $output = curl_exec($ch);
    $result = json_decode($output, true);
    curl_close($ch);

    return $result;
}

$validCounter = 0;
$invalidCounter = 0;

foreach ($arrayOfIds as $id) {
    if (validate($id)) {
        $validCounter++;
    } else {
        $invalidCounter++;
    }
}

$result = '<br>' . ' Number of Valid Ids are : ' . $validCounter .
'<br>' . 'Number of Invalid Ids are : ' . $invalidCounter;

echo $result;
