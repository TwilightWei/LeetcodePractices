/*
 * @lc app=leetcode id=238 lang=php
 *
 * [238] Product of Array Except Self
 */

// @lc code=start
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums) {
        $result = [];
        $zeroCount = 0;
        $zeroIndex = null;
        $product = 1;

        $len = count($nums);
        foreach ($nums as $key => $num) {
            if (!$num) {
                if (++$zeroCount > 1) {
                    return array_fill(0, $len, 0);
                }
                $zeroIndex = $key;
            } else {
                $product *= $num;
            }
        }

        if ($zeroCount) {
            $result = array_fill(0, $len, 0);
            $result[$zeroIndex] = $product;
            return $result;
        } 

        foreach ($nums as $num) {
            $result[] = $product/$num;
        }
        return $result;
    }
}
// @lc code=end

