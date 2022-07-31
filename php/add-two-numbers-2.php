<?php

include __DIR__ . "/util/debug.php";

class ListNode
{
    public int $val = 0;
    public ?ListNode $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
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
    public function addTwoNumbers($l1, $l2)
    {
        $i1 = $this->listToString($l1);
        $i2 = $this->listToString($l2);

        $sum = bcadd(
            strrev($i1),
            strrev($i2)
        );

        return $this->listFromString(
            strrev($sum)
        );
    }

    private function listToString(ListNode $list): string
    {
        $str  = "";
        $node = $list;

        while (1) {
            $str .= (string) $node->val;
            $node = $node->next;
            if (! $node) {
                break;
            }
        }

        return $str;
    }

    public function listFromString(string $value): ListNode
    {
        $digits = str_split($value, 1);
        $size   = count($digits) - 1;
        $next   = null;

        for ($i = $size; $i >= 0; $i--) {
            $node = new ListNode((int) $digits[$i], $next);
            $next = $node;
        }

        return $node;
    }
}

$s = new Solution;

// $l1 = listFromArray([1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1]);
// $l2 = listFromArray([5,6,4]);

$l1 = $s->listFromString("123");
$l2 = $s->listFromString("564");

dd($l1, $l2, $s->addTwoNumbers($l1, $l2));
