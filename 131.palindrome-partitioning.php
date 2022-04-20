/*
 * @lc app=leetcode id=131 lang=php
 *
 * [131] Palindrome Partitioning
 */

// @lc code=start
class Solution {
    public $palindromes = [];
    /**
     * @param String $s
     * @return String[][]
     */
    function partition($s) {
        $partitions = [];

        // Iterate through $s
        $len = strlen($s);
        for ($i=0; $i<$len; $i++) {
            $lSubStr = substr($s, 0, $i + 1);
            
            if (!$this->checkPalindrome($lSubStr)) {
                continue;
            }

            if ($i == $len - 1) {
                $partitions[] = [$lSubStr];
            } else {
                $rSubStr = substr($s, $i + 1);
                $_partitions = $this->partition($rSubStr);
                foreach ($_partitions as $_partition) {
                    array_unshift($_partition, $lSubStr);
                    $partitions[] = $_partition;
                }
            }
        }

        return $partitions;
    }

    function checkPalindrome($s) {
        if ($this->palindromes[$s]) {
            return true;
        }

        $len = strlen($s);
        $l = 0;
        $r = $len - 1;
        while ($l <= $r) {
            if ($s[$l] != $s[$r]) {
                return false;
            }
            $l++;
            $r--; 
        }

        $this->palindromes[$s] = 1;
        return true;
    }
}
// @lc code=end

