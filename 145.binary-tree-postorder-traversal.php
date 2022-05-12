/*
 * @lc app=leetcode id=145 lang=php
 *
 * [145] Binary Tree Postorder Traversal
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
    function postorderTraversal($root) {
        $node = $root;
        $result = $stack = [];
        
        while ($node || $stack) {
            while ($node) {
                if ($node->right) {
                    $stack[] = $node->right;
                }
                $stack[] = $node;
                $node = $node->left;
            }
            
            $node = array_pop($stack);
            
            while ($node && (!$node->right || $node->right != end($stack))) {
                $result[] = $node->val;
                $node = array_pop($stack);
            }
            
            if ($node) {
                array_pop($stack);
                $stack[] = $node;
                $node = $node->right;
            }
        }
        
        return $result;
    }
}
// @lc code=end

