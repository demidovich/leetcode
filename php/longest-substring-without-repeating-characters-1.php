<?php

namespace LongestSubstring;

include __DIR__ . "/util/debug.php";

/**
 * https://leetcode.com/problems/longest-substring-without-repeating-characters/
 */
class Solution
{
    private int $windowMaxSize = 0;

    /**
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring(string $s): int
    {
        $count  = strlen($s);
        $window = [];

        for ($left = 0; $left < $count; $left++) {
            $window = [$s[$left] => true];

            for ($right = $left + 1; $right < $count; $right++) {
                $char = $s[$right];

                if (array_key_exists($char, $window)) {
                    $this->setWindowMaxSize($window);
                    break 1;
                }

                $window[$char] = true;

                // Достигли последнего символа
                // Если не будет остановлен внешний цикл "au" вернет 1,
                // потому что следующая итерация left перезатрет состояние window

                if ($right == $count - 1) {
                    break 2;
                }
            }
        }

        $this->setWindowMaxSize($window);

        return $this->windowMaxSize;
    }

    private function setWindowMaxSize(array $window): void
    {
        $size = count($window);

        if ($size > $this->windowMaxSize) {
            $this->windowMaxSize = $size;
        }
    }
}

$s = new Solution;

dd(
    $s->lengthOfLongestSubstring(" "),
    $s->lengthOfLongestSubstring("au"),
    $s->lengthOfLongestSubstring("aurwrsdfer4r34rfssfsfsfsrgfergergfeghtrhtyrhytr")
);
