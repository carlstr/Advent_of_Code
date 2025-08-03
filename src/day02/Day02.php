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

    public function solvePart2(string $input): int {
        $startTime = microtime(true);

        $array = explode(PHP_EOL, $input);

        $safeRowCount = 0;
        foreach ($array as $key => $value) {
            $row = explode(' ', $array[$key]);

            $isSafe = true;
            $removeElement = 0;
            
            //print_r(json_encode($row) . PHP_EOL);
            $tempRow = $row;

            foreach ($row as $key2 => $value) {
                print_r(json_encode($tempRow) . ' og row: ' . json_encode($row));
                for ($key = 0; $key < count($tempRow); $key++) {
                    $isSafe = true;
                    //print_r(json_encode($tempRow) . ' og row: ' . json_encode($row) . PHP_EOL);
                    //print_r('count: ' . count($tempRow) . PHP_EOL);
                    //print_r($removeElement . PHP_EOL);
                    //print_r('key ' . $key . PHP_EOL);
                    //$safe = $isSafe ? 'true' : 'false';
                    //print_r('issafe? ' . $safe . PHP_EOL);
                    
                    //if ($removeElement === count($row)) {
                    //    break;
                    //}

                    if (!isset($tempRow[$key + 1])) {
                        continue;
                    }

                    if ($tempRow[0] > $tempRow[count($tempRow) - 1]) {
                        $condition = -1; //decreasing
                    } else if ($tempRow[0] < $tempRow[count($tempRow) - 1]) {
                        $condition = 1; //increasing
                    } else {
                        $condition = 0; //equal
                    }

                    //TODO try this with a switch statement
                    if ($condition === -1) { // decreasing
                        if (($tempRow[$key] - $tempRow[$key + 1]) > 3 || ($tempRow[$key] - $tempRow[$key + 1]) < 1) {
                            $tempRow = $row;
                            unset($tempRow[$removeElement]);
                            $tempRow = array_values($tempRow);
                            $key = -1;
                            $isSafe = false;
                            $removeElement++;
                            //print("fuck1" . PHP_EOL);
                            if ($removeElement === count($row)) {
                                break;
                            }
                            continue;
                        }
                    } else if ($condition === 1) { // increasing
                        if (($tempRow[$key + 1] - $tempRow[$key]) > 3 || ($tempRow[$key + 1] - $tempRow[$key]) < 1) {
                            $tempRow = $row;
                            unset($tempRow[$removeElement]);
                            $tempRow = array_values($tempRow);
                            $key = -1;
                            $isSafe = false;
                            $removeElement++;
                            //print("fuck2" . PHP_EOL);
                            if ($removeElement === count($row)) {
                                break;
                            }
                            continue;
                        }
                    } else if ($condition === 0) { // equal aka unsafe row
                        $tempRow = $row;
                        unset($tempRow[$removeElement]);
                        $tempRow = array_values($tempRow);
                        $key = -1;
                        $isSafe = false;
                        $removeElement++;
                        //print("fuck3" . PHP_EOL);
                        if ($removeElement === count($row)) {
                            break;
                        }
                        continue;
                    }

                    //if ($removeElement === count($row) - 1 && $isSafe) {
                    //    break;
                    //}
//
                    //if ($removeElement === count($row) - 1 && !$isSafe) {
                    //    break;
                    //}
                }

                if ($isSafe || !$isSafe) {
                    break;
                }
            }

            //if ($isSafe) {
            //    break;
            //}

            $res = $isSafe ? 'true' : 'false';
            print_r("       is safe?:   " . $res . PHP_EOL);
            $safeRowCount += $isSafe ? 1 : 0;
        }

        print_r($safeRowCount . PHP_EOL);

        $endTime = microtime(true);

        $executionTime = $endTime - $startTime;

        print_r($executionTime);

        return 0;
    }
}