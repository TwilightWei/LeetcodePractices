/*
 * @lc app=leetcode id=101 lang=php
 *
 * [101] Symmetric Tree
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
    function isSymmetric($root) {
        $leftStack = [$root->left];
        $rightStack = [$root->right];

        while ($leftStack && $rightStack) {
            $leftNode = array_shift($leftStack);
            $rightNode = array_shift($rightStack);
            
            if (($leftNode && !$rightNode) || (!$leftNode && $rightNode) || ($leftNode->val != $rightNode->val)) {
                return false;
            }
            
            if ($leftNode) {
                array_push($leftStack, $leftNode->left, $leftNode->right);
            }
            
            if ($rightNode) {
                array_push($rightStack, $rightNode->right, $rightNode->left);
            }
            
        }
        
        return $leftStack == $rightStack;
    }
}
// @lc code=end

