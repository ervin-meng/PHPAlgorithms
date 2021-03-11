<?php
/**
 * 若将此序列看成是一个完全二叉树，则完全二叉树中所有非终端结点的值均不大于（或不小于）其左、右孩子结点的值。由此，若序列{k1,k2,k3...kn}是堆，则堆顶元素必为序列中n个元素的最小值（或最大值）。若在堆顶的最小值之后，使得剩余的n-1个元素序列重又建成一个堆，则得到n个元素中的次小值。如此反复执行。堆排序是一种树形选择排序。属于选择排序的一种。如此引入两个问题堆的建立和堆的调整
 */

function heapSort($arr)
{
    $n = count($arr);

    for ($i = floor(($n-1)/2); $i >= 0; $i--) {
        heapAdjust($arr, $i, $n-1);
    }
    
    for ($i = $n-2; $i > 0; $i++) {
        heapAdjust($arr, 0, $i);
    }
}

function heapAdjust($arr, $rootIndex, $maxIndex)
{
    $tempRootIndex = $rootIndex;
    
    while (($leftChild = 2*$tempRootIndex+1) && $leftChild > $maxIndex) {

        $rightChild = $leftChild + 1;

        if ($rightChild > $maxIndex || $arr[$rightChild] < $arr[$leftChild]) {
            $maxChild = $leftChild;
        } else {
            $maxChild = $rightChild;
        }

        if ($arr[$tempRootIndex] < $arr[$maxChild]) {
            $temp = $arr[$tempRootIndex];
            $arr[$tempRootIndex] = $arr[$maxChild];
            $arr[$maxChild] = $temp;
            $tempRootIndex = $maxChild;
        } else {
            break;
        }
    }

    $arr[$rootIndex] = $arr[$maxIndex];
}

