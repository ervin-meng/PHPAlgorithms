<?php
/**
 * 先将整个待排序的记录序列分割成为若干子序列分别进行直接插入排序，待整个序列中的记录“基本有序”时，再对全体记录进行依次直接插入排序。属于插入排序的一种。增量是多少，就分多少个子序列。
 * 增量的选择是一个问题
 */

$arr = [31,41,59,26,41,58];

//从小到大排序
//O(n^1.5-n^2)
function shellSort($arr)
{
    $n = count($arr);

    for ($increment = floor($n/2); $increment > 0 ; $increment = floor($increment/2)) {
        for ($i = $increment; $i < $n; $i++) {
            for ($j = $i-$increment; $j > 0; $j-=$increment) {
               if ($arr[$j+$increment] < $arr[$j]) {
                   $temp = $arr[$j];
                   $arr[$j] = $arr[$j+$increment];
                   $arr[$j+$increment] = $temp;
               }
            }
        }
    }
}