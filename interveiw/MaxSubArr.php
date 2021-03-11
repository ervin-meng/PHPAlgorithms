<?php
/**
 * 输入: [-2,1,-3,4,-1,2,1,-5,4],输出: 6 解释: 连续子数组 [4,-1,2,1] 的和最大，为 6
 */

$arr = [-2,1,-3,4,-1,2,1,-5,4];

/**
 * 分治法
 * @param $arr
 * @param $low
 * @param $high
 * @return mixed
 */
function maxSubArray($arr, $low, $high)
{
    if ($low == $high) {
        return $arr[$low];
    }

    $middle   = floor(($low + $high) / 2);
    $leftSum  = maxSubArray($arr, $low, $middle);
    $rightSum = maxSubArray($arr, $middle + 1, $high);
    $crossSum = maxSubCrossArray($arr, $low, $middle, $high);

    if ($crossSum > $leftSum && $crossSum > $rightSum) {
        return $crossSum;
    }

    if ($leftSum > $rightSum) {
        return $leftSum;
    } else {
        return $rightSum;
    }
}

function maxSubCrossArray($arr, $low, $middle, $high)
{
    $leftMaxSum = -99999;
    $leftSum    = 0;

    for ($i = $middle; $i >= $low; $i--) {
        $leftSum = $leftSum + $arr[$i];
        $leftMaxSum = max($leftMaxSum, $leftSum);
    }

    $rightMaxSum = -99999;
    $rightSum    = 0;

    for ($j = $middle+1; $j <= $high; $j++) {
        $rightSum = $rightSum + $arr[$j];
        $rightMaxSum = max($rightMaxSum, $rightSum);
    }

    return $leftMaxSum + $rightMaxSum;
}

/**
 * 动态规划法
 * @param  $arr
 * @return mixed
 */
function maxSubArrayByDP($arr)
{
    if (count($arr) == 1) {
        return $arr[0];
    }

    $num = count($arr) - 1;

    $dp = [0 => $arr[0]];

    for ($i = 1; $i <= $num; $i++) {
        $dp[$i] = max($arr[$i], $dp[$i-1] + $arr[$i]);
    }

    return max($dp);
}

/**
 * Kadane法
 * @param  $arr
 * @return mixed
 */
function maxSubArrayByKadane($arr)
{
    if (count($arr) == 1) {
        return $arr[0];
    }

    $num   = count($arr) - 1;
    $maxDp = $dp = $arr[0];

    for ($i = 1; $i <= $num; $i++) {
        $dp    = max($arr[$i],$dp + $arr[$i]);
        $maxDp = max($maxDp, $dp);
    }

    return $maxDp;
}

function fib($num = 10)
{
    static $arr = [
        1 => 1,
        2 => 1
    ];

    for ($i = 1; $i <= 10; $i++) {
        if (isset($arr[$i])) {
            continue;
        }
        $arr[$i] = $arr[$i-1] + $arr[$i-2];
    }

    var_dump($arr);
}