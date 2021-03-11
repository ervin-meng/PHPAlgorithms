<?php
/**
 * 通过n-i次关键字的比较，从n-i+1个记录中选出关键字最小的记录，并和第i个记录交换。属于**选择排序**的一种。
 */

$arr = [31,41,59,26,41,58];

//从小到大排序O(n^2)
function selectSort($arr)
{
    $n = count($arr);

    $minKey   = 0;

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i+1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minKey]) {
                $minKey = $j;
            }
        }
        $minValue = $arr[$minKey];
        $arr[$minKey] = $arr[$i];
        $arr[$i] = $minValue;
    }
}