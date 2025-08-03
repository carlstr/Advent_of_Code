<?php

declare(strict_types=1);

namespace Advent_Of_Code\day02;

class Day02
{
    public function solvePart1(string $input): int {
        $startTime = microtime(true);

        $array = explode(PHP_EOL, $input);

        $safeRowCount = 0;
        foreach ($array as $key => $value) {
            $row = explode(' ', $array[$key]);

            $isSafe = true;
            foreach ($row as $key => $value) {
                if (!isset($row[$key + 1])) {
                    continue;
                }

                if ($row[0] > $row[1]) {
                    $condition = -1; //decreasing
                } else if ($row[0] < $row[1]) {
                    $condition = 1; //increasing
                } else {
                    $condition = 0; //equal
                }

                //TODO try this with a switch statement
                if ($condition === -1) { // decreasing
                    if (($row[$key] - $row[$key + 1]) > 3 || ($row[$key] - $row[$key + 1]) < 1) {
                        $isSafe = false;
                        continue;
                    }
                } else if ($condition === 1) { // increasing
                    if (($row[$key + 1] - $row[$key]) > 3 || ($row[$key + 1] - $row[$key]) < 1) {
                        $isSafe = false;
                        continue;
                    }
                } else if ($condition === 0) { // equal aka unsafe row
                    $isSafe = false;
                    continue;
                }

                if (!$isSafe) {
                    continue;
                }
            }

            $safeRowCount += $isSafe ? 1 : 0; 
        }

        print_r($safeRowCount . PHP_EOL);

        $endTime = microtime(true);

        $executionTime = $endTime - $startTime;

        print_r($executionTime);

        return 0;
    }
}