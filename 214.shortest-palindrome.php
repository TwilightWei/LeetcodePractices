/*
 * @lc app=leetcode id=214 lang=php
 *
 * [214] Shortest Palindrome
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function shortestPalindrome($s) {
        $len = strlen($s);
        $m = ceil($len/2);
        $result = '';

        $lStr = '';
        
        for ($i=0; $i<$m; $i++) {
            $lStr = $s[$i] . $lStr;
            $sub = substr($s, $i+1);
            $revSub = strrev($sub);

            if ($lStr === substr($s, $i+1, $i+1)) {
                // Check even length palindrome
                $result = $revSub . $sub;
            } elseif ($lStr === substr($s, $i, $i+1)) {
                // Check odd length palindrome
                $result = $revSub . $s[$i] . $sub;
            }
        }

        return $result;
    }
}
// @lc code=end

