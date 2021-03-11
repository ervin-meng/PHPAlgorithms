<?php
/**
 *给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
*/

class ListNode
{
    public $val  = 0;
    public $next = null;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

/**
 * @param  ListNode $l1
 * @param  ListNode $l2
 * @return ListNode
 */
function addTwoNumbers($l1, $l2)
{
    $headerNode = $resultNode = new ListNode(0);
    $forward    = 0;

    do {
        if ($l1 != NULL && $l2 != NULL) {
            $val = $l1->val + $l2->val;
        } elseif ($l1 != NULL) {
            $val = $l1->val;
        } elseif ($l2 != NULL) {
            $val = $l2->val;
        } else {
            $val = 0;
        }

        $val = $val + $forward;

        if ($val >= 10) {
            $val = $val - 10;
            $forward = 1;
        } else {
            $forward = 0;
        }

        $resultNode->val = $val;

        $l1 = $l1->next;
        $l2 = $l2->next;

        if ($l1 == NULL && $l2 == NULL && $forward == 0) {
            return $headerNode;
        }

        $resultNode->next = new ListNode(0);
        $resultNode = $resultNode->next;

    } while(true);
}