/*
 * @lc app=leetcode id=98 lang=php
 *
 * [98] Validate Binary Search Tree
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
     * @return Boolean
     */
    function isValidBST($root) {
        $minMax = [-INF, INF];
        return $this->checkValidity($root, $minMax);
    }
    
    function checkValidity($node, $minMax) {
        if (!$node) {
            return true;
        }
        
        if (($node->val <= $minMax[0]) || ($node->val >= $minMax[1])) {
            return false;
        }
        
        if ($node->left && ($node->left->val >= $node->val)) {
            return false;
        }
        
        if ($node->right && ($node->right->val <= $node->val)) {
            return false;
        }
        
        $leftMinMax = [$minMax[0] , $node->val];
        $rightMinMax = [$node->val, $minMax[1]];
        
        return $this->checkValidity($node->left, $leftMinMax) & $this->checkValidity($node->right, $rightMinMax);
    }
}
// @lc code=end

