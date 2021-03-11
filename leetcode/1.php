<?php
/**
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，数组中同一个元素不能使用两遍。
 * 给定 nums = [2, 7, 11, 15], target = 9
 * 因为 nums[0] + nums[1] = 2 + 7 = 9
 * 所以返回 [0, 1]
 */

/**
 * @param $nums
 * @param $target
 * @return array|mixed
 */
function twoSum($nums, $target)
{
    $numMap = [];

    foreach ($nums as $index => $num) {
        $numMap[$num][] = $index;
    }

    foreach ($nums as $index => $num) {
        $otherNum = $target - $num;
        if ($otherNum == $num) {
            if (count($numMap[$num]) == 1) {
                continue;
            } else {
                return $numMap[$num];
            }
        }

        if (isset($numMap[$otherNum])) {
            return [$numMap[$num][0], $numMap[$otherNum][0]];
        }
    }
}