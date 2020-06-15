<?php

function numberCheck(string $id): bool
{
    if (!$id) {
        return false;
    } elseif (strlen($id) !== 10) {
        return false;
    } elseif (!is_numeric($id) || $id < 0) {
        return false;
    } elseif (is_numeric($id) && strpos($id, '.') !== false) {
        return false;
    } elseif (repeatingNumber($id)) {
        return false;
    }
    return true;
}

function repeatingNumber(string $id): bool
{
    for ($i = 0; $i < strlen($id); $i++) {
        if ($id[0] !== $id[$i]) {
            return false;
        }
    }
    return true;
}

function digitCheck(string $id): bool
{
    $sum = 0;
    $digits = str_split($id, 1);

    for ($i = 0; $i < 9; $i++) {
        $sum += ($digits[$i] * (11 - $i));
    }

    $remainder = $sum % 12;
    $result = 12 - $remainder;
    $result = strval($result);

    if ($result === '10' || $result === '12') {
        return false;
    } elseif ($result === '11' && $digits[9] === '0') {
        return true;
    } elseif ($result === $digits[9]) {
        return true;
    }
    return false;
}

function validate(string $id): string
{
    if (numberCheck($id) && digitCheck($id)) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if (validate($id)) {
        $result = 'ID : ' . $id . ' is Valid';
    } else {
        $result = 'ID : ' . $id . ' is Invalid';
    }
}
