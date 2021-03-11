<?php
/**
 * 给定两个大小为 m 和 n 的正序（从小到大）数组 nums1 和 nums2。请你找出并返回这两个正序数组的中位数。
 * 进阶：你能设计一个时间复杂度为 O(log (m+n)) 的算法解决此问题吗？
 */

/**
 * @param  array $nums1
 * @param  array $nums2
 * @return int
 */
function findMedianSortedArrays($nums1, $nums2)
{
    $count1 = count($nums1);
    $count2 = count($nums2);
    $remind = ($count1 + $count2) % 2;

    if ($remind == 0) {
        $pos = ($count1 + $count2) / 2 + 1;
    } else {
        $pos = floor(($count1 + $count2) / 2);
    }

    $num1Key = 0;
    $num2Key = 0;
    $result  = 0;

    for ($i = 0; $i <= $pos; $i ++) {
        if ($nums1[$num1Key] < $nums2[$num2Key]) {
            $current = $nums1[$num1Key];
            $num1Key ++;
        } else {
            $current = $nums2[$num2Key];
            $num2Key ++;
        }
        if (($i == $pos -1 && $remind == 0) || $i == $pos) {
            $result += $current;
        }
    }

    if ($remind == 0) {
        return $result / 2;
    } else {
        return $result;
    }
}

function findMedianSortedArraysV1($nums1, $nums2)
{
    $num1Key = 0;
    $num2Key = 0;
    $num1End = 0;
    $num2End = 0;
    $count1  = count($nums1);
    $count2  = count($nums2);
    $even    = ($count1 + $count2) % 2 == 0;

    if ($even) {
        $pos = ($count1 + $count2) / 2 + 1;
    } else {
        $pos = floor(($count1 + $count2) / 2);
    }

    while ($pos != 1) {
        $tempPos = floor($pos/2) - 1;
        if (!isset($nums1[$tempPos])) {
            $num2Key = $num2Key + $tempPos;
            $num1End = 1;
        } elseif (!isset($nums2[$tempPos])) {
            $num1Key = $num1Key + $tempPos;
            $num2End = 1;
        } elseif ($nums1[$tempPos] <= $nums2[$tempPos]) {
            $num1Key = $num1Key + $tempPos;
        } else {
            $num2Key = $num2Key + $tempPos;
        }
        $pos = $pos - $tempPos - 1;
    }

    if ($even) {
        if ($num2End) {
            return ($nums1[$num1Key-1] + $nums1[$num1Key]) / 2;
        } elseif($num1End){
            return ($nums2[$num2Key-1] + $nums2[$num2Key]) / 2;
        } else {
            return ($nums1[$num1Key] + $nums2[$num2Key]) / 2;
        }
    } else {
        if ($num2End || $nums2[$num2Key] <= $nums1[$num1Key]){
            return $nums1[$num1Key];
        } elseif($num1End || $nums2[$num2Key] > $nums1[$num1Key]) {
            return $nums2[$num2Key];
        }
    }
}