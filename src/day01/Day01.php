<?php

declare(strict_types=1);

namespace Advent_Of_Code\day01;

class Day01
{
    public function solvePart1(string $input): int {
        $array = explode(PHP_EOL, $input);

        foreach ($array as $value) {
            $array2[] = explode('  ', $value);
        }

        foreach ($array2 as $value) {
            $firstArray[] = $value[0];
            $secondArray[] = $value[1];
        }

        sort($firstArray);
        sort($secondArray);

        $distance = 0;

        foreach ($firstArray as $key => $value) {
            if ((int)$value > (int)$secondArray[$key]) {
                $distance += (int)$value - (int)$secondArray[$key];
            } elseif ((int)$value < (int)$secondArray[$key]) {
                $distance += (int)$secondArray[$key] - (int)$value;
            }
        }

        print_r($distance);

        return 0;
    }
}