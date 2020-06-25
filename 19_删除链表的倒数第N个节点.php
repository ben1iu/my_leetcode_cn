<?php

require "Linked.php";

/**
 * @desc 给定一个链表，删除链表的倒数第 n 个节点，并且返回链表的头结点。
 *
 *     给定一个链表: 1->2->3->4->5, 和 n = 2.
 *     当删除了倒数第二个节点后，链表变为 1->2->3->5.
 *
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {

        if($n==0){
            return $head;
        }

        $length = $this->getLength($head);

        $Linked = new Linked();

        $Linked->head = $head;

        //处理删除第一个节点的情况
        if($length==$n){
            $Linked->head = $Linked->head->next;
            return $Linked->head;
        }

        $point = $Linked->head;
        for($i=1;$i<$length-$n;$i++){
            $point = $point->next;
        }

        $tmp = $point->next;

        $point->next = $point->next->next;
        unset($tmp);
        return $Linked->head;
    }

    function getLength($head){
        $length = 0;
        if($head->next==null){
            return 1;
        }
        while($head){
            $head = $head->next;
            $length ++;
        }
        return $length;
    }
}

$test1 = new Linked();

$arr = [1,2,3,4,5];
$num = 2;

$arr = [1];
$num = 1;

foreach($arr as $val){
    $test1->addNode($val);
}

$solu = new Solution();
$res = $solu->removeNthFromEnd($test1->head,$num);

var_dump($res);
