<?php

namespace LongestSubstring;

include __DIR__ . "/util/debug.php";

/**
 * https://leetcode.com/problems/longest-substring-without-repeating-characters/
 */
class Solution
{
    /**
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring(string $s): int
    {
        $chars = [];
        $left  = 0;
        $right = 0;
        $res   = 0;

        while ($right < strlen($s)) {
            $r = $s[$right];
            $chars[$r] = isset($chars[$r]) ? $chars[$r]++ : 1;

            while ($chars[$r] > 1) {
                $l = $s[$left];
                $chars[$l]--;
                $left++;
            }

            $res = max($res, $right - $left + 1);
            $right++;
        }

        return $res;
    }
}

$s = new Solution;

dd(
    $s->lengthOfLongestSubstring(" "),
    $s->lengthOfLongestSubstring("au"),
    $s->lengthOfLongestSubstring("aurwrsdfer4r34rfssfsfsfsrgfergergfeghtrhtyrhytr")
);
