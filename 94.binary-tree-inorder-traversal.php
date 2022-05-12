/*
 * @lc app=leetcode id=94 lang=php
 *
 * [94] Binary Tree Inorder Traversal
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
     * @return Integer[]
     */
    function inorderTraversal($root) {
        $node = $root;
        $result = $stack = [];
        
        while ($node || $stack) {
            while ($node) {
                $stack[] = $node;
                $node = $node->left;
            }
            
            $node = array_pop($stack);
            
            while ($node) {
                $result[] = $node->val;
                if ($node->right) {
                    $node = $node->right;
                    break;
                }
                $node = array_pop($stack);
            }
        }
        
        return $result;
    }
}
// @lc code=end

