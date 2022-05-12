/*
 * @lc app=leetcode id=104 lang=php
 *
 * [104] Maximum Depth of Binary Tree
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
    function maxDepth($root) {
        $maxDepth = $depth = 0;
        $this->countDepth($root, $depth, $maxDepth);
        return $maxDepth;
    }
    
    function countDepth($node, $depth, &$maxDepth) {
        $_depth = $depth + 1;
        
        if (!$node) {
            return true;
        }
        
        if (!$node->left && !$node->right) {
            // If node is a leaf
            $maxDepth = max($maxDepth, $_depth);
            return true;
        }
        
        $this->countDepth($node->left, $_depth, $maxDepth);
        $this->countDepth($node->right, $_depth, $maxDepth);
        
        return true;
    }
}
// @lc code=end

