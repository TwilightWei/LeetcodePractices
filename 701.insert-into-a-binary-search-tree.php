/*
 * @lc app=leetcode id=701 lang=php
 *
 * [701] Insert into a Binary Search Tree
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
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val) {
        $newNode = new TreeNode($val, null, null);
        if (!$root) {
            $root = $newNode;
            return $root;
        }
        
        // Find insertion point and insert new node
        $node = $root;
        while (true) {
            if ($val < $node->val) {
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node->left = $newNode;
                    break;
                }
            } else {
                if ($node->right) {
                    $node = $node->right;
                } else {
                    $node->right = $newNode;
                    break;
                }
            }
        }
        
        return $root;
    }
}
// @lc code=end

