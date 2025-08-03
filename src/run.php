<?php
require '../vendor/autoload.php';

$day = $argv[1];
$part = $argv[2];

if (empty($day) || empty($part)) {
    echo 'Day or puzzle part is empty. Please execute the file as this example: php run.php 01 1';
    exit();
}

$input = file_get_contents(__DIR__ . "/day{$day}/day{$day}_input.txt");
$className = "Advent_Of_Code\\day$day\\Day$day";

$solution = new $className();
$method = "solvePart$part";

$result = $solution->$method($input);
echo "\nDay $day, Part $part: $result\n";