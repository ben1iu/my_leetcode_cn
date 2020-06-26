<?php

/**
 * @desc 反转一个单链表
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
     * @return ListNode
     */
    function reverseList($head) {
        $resLink = new Linked();
        while($head){
            $resLink->reverseAddNode($head->val);
            $head = $head->next;
        }
        return $resLink->head;
    }
}

class Node
{
    public $next = null;
    public $val;
    public function __construct($data=null)
    {
        $this->val = $data;
    }
}

class Linked
{
    public $head;

    public function __construct()
    {
    }

    public function addNode($item)
    {
        if(!$this->head){
            $this->head = new Node($item);
            return;
        }
        $point = $this->head;
        while($point->next){
            $point = $point->next;
        }
        $node = new Node($item);
        $point->next = $node;
        return true;
    }

    public function reverseAddNode($item)
    {
        $node = new Node($item);
        $tmp = $this->head;
        $node->next = $tmp;
        $this->head = $node;
    }

}
