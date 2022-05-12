/*
 * @lc app=leetcode id=226 lang=php
 *
 * [226] Invert Binary Tree
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
    * @return TreeNode
    */
    function invertTree($root) {
        $this->invertSubtree($root);
        return $root;
    }

    function invertSubtree($node) {
        
        if ($node->left || $node->right) {
            if ($node->left) {
                $this->invertSubtree($node->left);
            }
            if ($node->right) {
                $this->invertSubtree($node->right);
            }
            
            $temp = $node->left;
            $node->left = $node->right;
            $node->right = $temp;
        }
        
        return true;
    }
}
// @lc code=end

