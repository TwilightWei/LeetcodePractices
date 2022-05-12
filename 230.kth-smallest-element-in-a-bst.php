/*
 * @lc app=leetcode id=230 lang=php
 *
 * [230] Kth Smallest Element in a BST
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
     * @param Integer $k
     * @return Integer
     */
    function kthSmallest($root, $k) {
        $elemenmtList = [];
        $this->inorderTraversal($root, $elemenmtList, $k);
        return $elemenmtList[$k-1];
    }
    
    function inorderTraversal($node, &$elemenmtList, $k) {
        if (!$node) {
            return true;
        }
        
        $this->inorderTraversal($node->left, $elemenmtList, $k);
        $elemenmtList[] = $node->val;
        if (isset($elemenmtList[$k-1])) {
            return true;
        }
        $this->inorderTraversal($node->right, $elemenmtList, $k);
        
        return true;
    }
}
// @lc code=end

