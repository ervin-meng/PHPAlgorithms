<?php
/**
 * 对冒泡排序的一种改进。通过一趟排序将待排记录分割成独立的两部分，其中一部分记录的关键字均比另一部分的关键字小，可分别对这两部分记录继续进行排序，以达到整个序列有序。分治思想。属于交换排序的一种。附设两个指针low和high,它们的初值分别为low和high,设枢轴记录的关键字为pivotkey，则首先从high所指位置起向前搜索找到第一个小于pivotkey的记录和枢轴记录互相交换，然后从low指针位置起向后搜索找到第一个关键字大于pivotkey的记录和枢轴记录互相交换，重复这两部直至low=high为止。
 */

$arr = [31,41,59,26,41,58];

//从小到大排序 O(nlogn)
function quickSort(&$arr, $start, $end)
{
    if ($start >= $end) {
        return;
    }

    //选第一个元素作为轴的值
    $pivotValue =  $arr[$start];

    $low  = $start;
    $high = $end;

    while($low < $high) {

        while($low < $high && $arr[$high] > $pivotValue) {
            $high--;
        }

        if ($low < $high) {
            $arr[$low] = $arr[$high];
        }

        while($low < $high && $arr[$low] < $pivotValue) {
            $low++;
        }

        if ($low < $high) {
            $arr[$high] = $arr[$low];
        }
    }

    $arr[$low] = $pivotValue; //此处$low和$high相等 就是轴的值


    quickSort($arr, $start, $low);
    quickSort($arr, $low+1, $end);
}