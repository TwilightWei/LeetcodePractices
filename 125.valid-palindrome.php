/*
 * @lc app=leetcode id=125 lang=php
 *
 * [125] Valid Palindrome
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $_s = preg_replace("/[^a-zA-Z0-9]/", '', $s);
        $_s = strtolower($_s);
        $len = strlen($_s);
        $lIndex = 0;
        $rIndex = $len-1;
        
        while ($lIndex < $rIndex) {
            if ($_s[$lIndex] != $_s[$rIndex]) {
                return false;
            }
            $lIndex++;
            $rIndex--;
        }
        
        return true;
    }
}
// @lc code=end

