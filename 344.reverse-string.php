/*
 * @lc app=leetcode id=344 lang=php
 *
 * [344] Reverse String
 */

// @lc code=start
class Solution {

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $lIndex = 0;
        $rIndex = count($s) - 1;
        
        while ($lIndex < $rIndex) {
            $_tempChar = $s[$lIndex];
            $s[$lIndex] = $s[$rIndex];
            $s[$rIndex] = $_tempChar;
            $lIndex++;
            $rIndex--;
        }
        return $s;
    }
}
// @lc code=end

