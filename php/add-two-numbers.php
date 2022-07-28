<?php

include __DIR__ . "/util/debug.php";

class ListNode
{
    public $val  = 0;
    public $next = null;
    
    function __construct($val = 0, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
    }

    public static function fromArray(array $values): self
    {
        if (! $values) {
            throw new RuntimeException("Empty values");
        }

        $size = count($values) - 1;
        $next = null;

        for ($i = $size; $i >= 0; $i--) {
            $node = new ListNode($values[$i], $next);
            $next = $node;
        }

        return $node;
    }

    public function toInverted(): self
    {

    }
}

/**
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
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        
    }
}

$l1 = ListNode::fromArray([2,4,3]);


dd($l1);