<?php
/**
 * @desc 给定一个链表，判断链表中是否有环。
 *       为了表示给定链表中的环，我们使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。 如果 pos 是 -1，则在该链表中没有环。
 *   输入：head = [3,2,0,-4], pos = 1      3->2->0->-4
 *                                           |- - - |
 *   输出：true
 *   解释：链表中有一个环，其尾部连接到第二个节点。
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
     * @param ListNode $head
     *
     * @return Boolean
     */
    function hasCycle($head)
    {
        $slowPoint = $head;
        $fastPoint = $head;
        /*
         * 如果有环形链表  无论环形为奇偶  快指针会追上慢指针
         * */
        while ($fastPoint && $fastPoint->next) {
            $slowPoint = $slowPoint->next;
            $fastPoint = $fastPoint->next->next;
            if ($slowPoint == $fastPoint) {
                return true;
            }

        }
        return false;
    }
}

