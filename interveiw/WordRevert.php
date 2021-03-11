<?php

/**
 * 反转字符串，连续的字符或‘.’当成一个字符，如$a = ‘ab...asd.asg..dsf’;输出为‘dsf..asg.asd...ab’
 */

function wordRevert($str)
{
    $count = strlen($str);
    $result = '';
    $breakChar = '.';
    $word = '';
    $words = [];

    for ($i = 0; $i < $count; $i++) {
        $char = $str[$i];
        if ($char == $breakChar) {
            if ($word != '') {
                $words[]=$word;
                $word = '';
            }
            $words[] = $char;
        } else {
            $word.=$char;
        }
    }

    if ($word != '') {
        $words[] = $word;
    }

    $wordsCount = count($words);

    for ($j = $wordsCount-1; $j >=0; $j-- ) {
        $result.= $words[$j];
    }

    return $result;
}

function wordRevertV1($str)
{
    $strLength = strlen($str);
    $leftWord  = '';
    $leftStr   = '';
    $rightWord = '';
    $rightStr  = '';

    for ($i = 0, $j = $strLength - 1; $i <= $j; $i++, $j--) {

        $leftChar = $str[$i];

        if ($leftChar == '.') {
            if ($leftWord) {
                $leftChar = $leftChar.$leftWord;
                $leftWord = '';
            }
            $leftStr = $leftChar.$leftStr;
        } else {
            $leftWord.= $leftChar;
        }

        if ($i == $j) {
            break;
        }

        $rightChar = $str[$j];

        if ($rightChar == '.') {
            if ($rightWord) {
                $rightChar = $rightWord.$rightChar;
                $rightWord = '';
            }
            $rightStr.=$rightChar;
        } else {
            $rightWord = $rightChar.$rightWord;
        }
    }

    return $rightStr.$rightWord.$leftWord.$leftStr;
}