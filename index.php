<?php

function numberCheck(string $id): bool {
    if(!$id) {
        return false;
    }elseif (strlen($id) !== 10) {
        return false;
    }elseif (!is_numeric($id) || $id < 0) {
        return false;
    }elseif (is_numeric($id) && strpos($id,'.') !== false ) {
        return false;
    }elseif(repeatingNumber($id)) {
        return false;
    }
    return true;
}

function repeatingNumber(string $id): bool {
    for($i = 0; $i < strlen($id); $i++) {
        if($id[0] !== $id[$i]) {
            return false;
        }
    }
    return true;
}

function digitCheck(string $id): bool {
    $sum = 0;
    $digits = str_split( $id, 1);

    for($i = 0; $i < 9; $i++) {
        $sum += ($digits[$i] * (11 - $i));
    }

    $remainder = $sum % 12;
    $result = 12 - $remainder;
    $result = strval($result);

    if($result === '10' || $result === '12') {
        return false;
    }elseif ($result === '11' && $digits[9] === '0') {
        return true;
    }elseif ($result === $digits[9]) {
        return true;
    }
    return false;
}

function validate(string $id): bool {
    if(numberCheck($id) && digitCheck($id)) {
        return true;
    }else {
        return false;
    }
}

$url = 'https://s3.amazonaws.com/cognisant-interview-resources/identifiers.json';
$arrayOfId = getData($url);

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
foreach($arrayOfId as $id) {
    if(validate($id)){
        $validCounter++;
    }else{
        $invalidCounter++;
    }
}

echo $validCounter . " + " . $invalidCounter ." = " . ($validCounter + $invalidCounter);