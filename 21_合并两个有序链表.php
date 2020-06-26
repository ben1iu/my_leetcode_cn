<?php

/**
 * @desc 将两个升序链表合并为一个新的 升序 链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。
 *        输入：1->2->4, 1->3->4
 *        输出：1->1->2->3->4->4
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
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
    function mergeTwoLists($l1, $l2)
    {
        $Linked1 = new Linked();
        $Linked1->head = $l1;

        $Linked2 = new Linked();
        $Linked2->head = $l2;

        $point1 = $Linked1->head;
        $point2 = $Linked2->head;

        $newLinked = new Linked();

        while ($point1 || $point2) {

            // 如果 有一个已经走到头 就 直接循环另一个添加给新链表
            if($point1 && $point2){
                if ($point1->val < $point2->val) {
                    $newLinked->addNode($point1->val);
                    $point1 = $point1->next;
                }
                if ($point2->val <= $point1->val) {
                    $newLinked->addNode($point2->val);
                    $point2 = $point2->next;
                }
            }else{
                if(!$point1 && $point2){
                    $newLinked->addNode($point2->val);
                    $point2 = $point2->next;
                    continue;
                }
                if(!$point2 && $point1){
                    $newLinked->addNode($point1->val);
                    $point1 = $point1->next;
                    continue;
                }
            }
        }
        return $newLinked->head;
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
}


$solu = new Solution();

$linked1 = new Linked();
$arr = [2];
$arr = [2];
foreach($arr as $val){
    $linked1->addNode($val);
}

$linked2 = new Linked();
$arr = [3];
foreach($arr as $val){
    $linked2->addNode($val);
}

$res = $solu->mergeTwoLists($linked1->head,$linked2->head);
var_dump($res);
