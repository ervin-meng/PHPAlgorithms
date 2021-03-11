<?php
/**
 * 将待排序的无序数列看成是一个仅含有一个元素的有序数列和一个无序数列，将无序数列中的元素逐次插入到有序数列中，从而获得最终的有序数列。属于插入排序的一种
 */

$arr = [31,41,59,26,41,58];

//从小到大排序
//O(n^2)
function insertSort($arr)
{
    $n = count($arr);

    for ($i = 0; $i < $n; $i++) {
        for($j = $i+1; $j > 0; $j--) {
            if($arr[$j] < $arr[$j-1]) {
                $temp = $arr[$j];
                $arr[$j]   = $arr[$j-1];
                $arr[$j-1] = $temp;
            } else {
                break;
            }
        }
    }

    return $arr;
}