<?php

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
