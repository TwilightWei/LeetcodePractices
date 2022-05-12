/*
 * @lc app=leetcode id=144 lang=php
 *
 * [144] Binary Tree Preorder Traversal
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
    function preorderTraversal($root) {
        $node = $root;
        $stack = $result = [];
        
        while($node || $stack) {
            while ($node) {
                $result[] = $node->val;
                if ($node->right) {
                    $stack[] = $node->right;
                }
                $node = $node->left;
            }
            
            $node = array_pop($stack);
        }
        
        return $result;
    }
    
//     function preorderTraversal($root) {
//         $result = [];
        
//         $this->traverse($root, $result);
        
//         return $result;
//     }
    
//     function traverse($node, &$result) {
//         if (!$node) {
//             return true;
//         }
        
//         $result[] = $node->val;
//         $this->traverse($node->left, $result);
//         $this->traverse($node->right, $result);
        
//         return true;
//     }
}
// @lc code=end

