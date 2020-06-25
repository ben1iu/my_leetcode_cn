<?php

/**
 * @desc 判断一个整数是否是回文数。回文数是指正序（从左向右）和倒序（从右向左）读都是一样的整数。
 * TODO:: 尝试不转string 方式解题
 * */

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $str = (string)$x;

        $test1 = new linked();

        for($i=0;$i<strlen($str);$i++){
            $test1->addNode($str[$i]);
        }

        $pointSlow = $test1->head;
        $pointFast = $test1->head;

        $temp = new Linked();

        //快指针走两步
        //快指针还能走 代表还未走到头

        //记录是奇数还是偶数

        $isOdd = true;
        while($pointFast){
            if($pointFast){
                $tempData = $pointSlow->data;
                $temp->reverseAddNode($tempData);
                $pointSlow = $pointSlow->next;
            }
            $pointFast = $pointFast->next;

            if(isset($pointFast)){
                $isOdd = !$isOdd;
            }

            $pointFast = $pointFast->next??null;

            if(isset($pointFast)){
                $isOdd = !$isOdd;
            }
            continue;
        }

        $tempPoint = $temp->head;
        //如果是奇数 取出 中位数
        if($isOdd){
            $tempPoint = $tempPoint->next;
        }

        while($pointSlow){
            //快指针到头 开始对比 慢指针的数据
            if ($tempPoint->data != $pointSlow->data) {
                return false;
            } else {
                $pointSlow = $pointSlow->next;
                $tempPoint = $tempPoint->next;
                continue;
            }
        }
        return true;
    }
}

class Node
{
    public $next = null;
    public $data;
    public function __construct($data=null)
    {
        $this->data = $data;
    }
}

class Linked
{
    public $head;

    public function __construct()
    {
        // 这里可以使用哨兵节点
        //$this->head = new Node(null);
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

/*
$solu = new Solution();

$int = -121;

var_dump($solu->isPalindrome($int));*/
