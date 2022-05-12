/*
 * @lc app=leetcode id=563 lang=php
 *
 * [563] Binary Tree Tilt
 */

// @lc code=start
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function findTilt($root) {
        $sumOfTilt = 0;
        
        $this->inorderTraverse($root, $sumOfTilt);
        
        return $sumOfTilt;
    }
    
    function inorderTraverse($node, &$sumOfTilt) {
        if (!$node) {
            return 0;
        }
        $_leftSum = $this->inorderTraverse($node->left, $sumOfTilt);
        $_rightSum = $this->inorderTraverse($node->right, $sumOfTilt);
        $sum = $_leftSum + $_rightSum + $node->val;
        
        $node->val = abs($_leftSum - $_rightSum);
        $sumOfTilt += $node->val;
        
        return $sum;
    }
}
// @lc code=end

