<?php

namespace LaravelJpCon\q004;

/**
 * Created by PhpStorm.
 * User: fortegp05
 */
class BubbleSort
{

    /**
     * @param array $array
     * @return array
     */
    public function sort(array $array): array
    {
        $size = count($array);
        for ($i = 0; $i < $size; $i++) {
            for ($j = ($size - 1); $i < $j; $j--) {
                if ($array[$j] < $array[$j - 1]) {
                    $temp = $array[$j - 1];
                    $array[$j - 1] = $array[$j];
                    $array[$j] = $temp;
                }
            }
        }

        return $array;
    }
}