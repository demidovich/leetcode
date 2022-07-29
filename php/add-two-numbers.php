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
        $i1 = $this->listToDigits($this->invertedList($l1));
        $i2 = $this->listToDigits($this->invertedList($l2));

        $sum = bcadd($i1, $i2);

        return $this->invertedList($this->listFromDigits($sum));
    }

    private function invertedList(ListNode $list): ListNode
    {
        $node = $list;
        $invertedNext = null;

        while (1) {
            $inverted = new ListNode($node->val, $invertedNext);
            $invertedNext = $inverted;
            $node = $node->next;
            if (! $node) {
                break;
            }
        }

        return $inverted;
    }

    private function listToDigits(ListNode $list): string
    {
        $value = "";

        while (1) {
            $value .= (string) $list->val;
            $list = $list->next;
            if (! $list) {
                break;
            }
        }

        return $value;
    }

    private function listFromDigits(string $value): ListNode
    {
        $digits = str_split($value, 1);

        return $this->listFromArray($digits);
    }

    public function listFromArray(array $values): ListNode
    {
        if (! $values) {
            throw new \RuntimeException("Empty values");
        }

        $size = count($values) - 1;
        $next = null;

        for ($i = $size; $i >= 0; $i--) {
            $node = new ListNode((int) $values[$i], $next);
            $next = $node;
        }

        return $node;
    }
}

$s = new Solution;

$l1 = $s->listFromArray([1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1]);
$l2 = $s->listFromArray([5,6,4]);

dd($l1, $l2, $s->addTwoNumbers($l1, $l2));