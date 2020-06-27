<?php
/**
 * @desc 给定一个带有头结点 head 的非空单链表，返回链表的中间结点。
 *       如果有两个中间结点，则返回第二个中间结点。
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
    function middleNode($head) {
        $pointFast = $head;
        $pointSlow = $head;
        while($pointFast){
            $midPoint = $pointSlow;
            $pointSlow = $pointSlow->next;

            //如果链表长度为偶数,到结尾时快指针还能走一步，但是不能走两笔
            //为偶数有两个中间节点  返回后一个中间节点，
            if($pointFast->next && !$pointFast->next->next){
                $midPoint = $pointSlow;
            }
            $pointFast = $pointFast->next->next??null;
        }

        return $midPoint;
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
}

$solu = new Solution();

$linked1 = new Linked();
$arr = [1,2,3,4,5];
$arr = [1,2,3,4,5,6];
foreach($arr as $val){
    $linked1->addNode($val);
}
$res = $solu->middleNode($linked1->head);
var_dump($res);
