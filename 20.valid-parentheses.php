/*
 * @lc app=leetcode id=20 lang=php
 *
 * [20] Valid Parentheses
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $len = strlen($s);
        $stack = [];
        $hash = [
            '(' => 1,
            '{' => 2,
            '[' => 3,
            ')' => -1,
            '}' => -2,
            ']' => -3];

        for ($i=0; $i<$len; $i++) {
            $c = $s[$i];
            if ($hash[$c] > 0) {
                $stack[] = $hash[$c];
            } else {
                $l = array_pop($stack);
                if ($l+$hash[$c] !== 0) {
                    return false;
                }
            }
        }

        return empty($stack);
    }
}
// @lc code=end

