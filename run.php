<?php
require __DIR__ . '/vendor/autoload.php';

$day = $argv[1];
$part = $argv[2];

if (empty($day) || empty($part)) {
    echo 'Day or puzzle part is empty. Please execute the file as this example: php run.php 01 1';
    exit();
}

$input = file_get_contents(__DIR__ . "/src/day{$day}_input.txt");
$className = "Advent_Of_Code\\Day$day";

$solution = new $className();
$method = "solvePart$part";

$result = $solution->$method($input);
echo "Day $day, Part $part: $result\n";