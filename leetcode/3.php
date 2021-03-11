<?php
/**
 * 给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度
 */

/**
 * @param  string $s
 * @return int
 */
function lengthOfLongestSubstring($s)
{
    $charMap      = [];
    $strLen       = strlen($s) - 1;
    $maxSubStrLen = 0;
    $sentinel     = 0;

    for ($i = 0; $i <= $strLen; $i++) {
        if (isset($charMap[$s[$i]]) && $charMap[$s[$i]] >= $sentinel) {
            $maxSubStrLen = max($maxSubStrLen,$charMap[$s[$i]] - $sentinel + 1, $i - $sentinel);
            $sentinel     = $charMap[$s[$i]] + 1;
        }
        $charMap[$s[$i]] = $i;
    }

    return max($maxSubStrLen, $strLen - $sentinel + 1);
}