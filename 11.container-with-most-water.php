/*
 * @lc app=leetcode id=11 lang=php
 *
 * [11] Container With Most Water
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
        $_lowerHeight = $maxVol = $lIndex = 0;
        $width = count($height);
        $rIndex = $width - 1;
        
        while ($lIndex < $rIndex) {
            if ($_lowerHeight < $height[$lIndex] && $_lowerHeight < $height[$rIndex]) {
                if ($height[$lIndex] < $height[$rIndex]) {
                    $maxVol = max($maxVol, ($rIndex - $lIndex) * $height[$lIndex]);
                    $_lowerHeight = $height[$lIndex];
                } else {
                    $maxVol = max($maxVol, ($rIndex - $lIndex) * $height[$rIndex]);
                    $_lowerHeight = $height[$rIndex];
                }
            }
            
            if ($height[$lIndex] < $height[$rIndex]) {
                $lIndex++;
            } else {
                $rIndex--;
            }
        }
        
        return $maxVol;
    }
}
// @lc code=end

