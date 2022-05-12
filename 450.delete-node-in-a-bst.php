/*
 * @lc app=leetcode id=450 lang=php
 *
 * [450] Delete Node in a BST
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
     * @param Integer $key
     * @return TreeNode
     */
    function deleteNode($root, $key) {
        // Search the target node
        $parent = null;
        $node = $root;
        while ($node && ($key != $node->val)) {
            $parent = $node;
            if ($key > $node->val) {
                $node = $node->right;
            } else {
                $node = $node->left;
            }
        }
               
        if (!$node) {
            return $root;
        }
        
        // Delete the node
        $delete = function (&$parent, &$node) use (&$root) {
            if ($parent === null) {
                // If the node is root
                if ($node->left) {
                    $root = $node->left;
                } else {
                    $root = $node->right;
                }
            } else {
                if ($parent->left == $node) {
                    if ($node->left) {
                        $parent->left = $node->left;
                    } else {
                        $parent->left = $node->right;
                    }
                } else {
                    if ($node->left) {
                        $parent->right = $node->left;
                    } else {
                        $parent->right = $node->right;
                    }
                }
            }
        };
        
        if (!$node->right || !$node->left) {
            $delete($parent, $node);
        } else {
            $sParent = $node;
            $sNode = $node->right;
            
            while (true) {
                if (!$sNode->left) {
                    break;
                }
                $sParent = $sNode;
                $sNode = $sNode->left;
            }
            $node->val = $sNode->val;
            $delete($sParent, $sNode);
        }        
        
        return $root;
    }
}
// @lc code=end

