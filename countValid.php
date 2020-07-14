<?php
require_once('index.php');


$url = 'https://s3.amazonaws.com/cognisant-interview-resources/identifiers.json';
$arrayOfIds = getData($url);

function getData(string $url)
{
    $output = file_get_contents($url);
    $result = json_decode($output, true);

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
