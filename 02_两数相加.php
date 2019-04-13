<?php
/** 
 * 给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 * 如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
 *  您可以假设除了数字 0 之外，这两个数都不会以 0 开头。 
 *  示例：
 *  输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 *  输出：7 -> 0 -> 8
 *
 */
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */



class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     *
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {

        $head1=$l1;
        $head2=$l2;
        $node = new Link();
        $i = 0;
        $next_val = false;
        while ($head1 || $head2) {
            $number = $head1->val + $head2->val;
            // 如果前一位进一  就加1
            if ($next_val) {
                $number++;
            }

            if ($number >= 10) {
                $number -= 10;
                $next_val = true;
            } else {
                $next_val = false;
            }
            $node->addItem($i, $number);
            $head1 = $head1->next;
            $head2 = $head2->next;
            $i++;
        }
        if ($next_val) {
            $node->addItem($i, 1);
        }
        return $node->head->next;
    }


    function getLength($head)
    {
        $length = 0;
        while ($head) {
            $head = $head->next;
            $length++;
        }
        return $length;
    }
}

class Link
{
    public $head;

    public function __construct()
    {
        $this->head = new ListNode(null);
    }

    public function addItem($index, $item)
    {
        $length = $this->getLength();
        $head = $this->head;
        if ($index < 0 || $index > $length) {
            return false;
        }
        for ($i = 0; $i < $index; $i++) {
            $head = $head->next;
        }
        $node = new ListNode($item);
        $node->next = $head->next;
        unset($head->next);
        $head->next = $node;
        return true;
    }

    public function setItem($index, $item)
    {
        $head = $this->head;
        for ($i = 0; $i < $index; $i++) {
            $head = $head->next;
        }
        $head->val = $item;
        return true;

    }

    public function getLength()
    {
        $head = $this->head;
        $step = 0;
        while ($head->next) {
            $step++;
            $head = $head->next;
        }
        return $step;
    }
}
