/*
 * @lc app=leetcode id=5 lang=php
 *
 * [5] Longest Palindromic Substring
 */

// @lc code=start
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s) {
        // Max length of the palindrome substrings
        $maxLen = 0;
        // Length of the string
        $sLen = strlen($s);

        // The longes palindromic substring
        $longestSubstring = '';

        // Check every char in the string and expand it into longer palindrome
        for ($i=0; $i<$sLen; $i++) {
            // Check odd length palindromes
            $l = $r = $i;
            while ($l>=0 && $r<$sLen) {
                if ($s[$l] != $s[$r]) {
                    break;
                }

                $_len = $r - $l + 1;
                if ($_len > $maxLen) {
                    $maxLen = $_len;
                    $longestSubstring = substr($s, $l, $_len);
                }

                $l--;
                $r++;
            }

            // Check even length plaindromes
            $l = $i;
            $r = $i + 1;
            while ($l>=0 && $r<$sLen) {
                if ($s[$l] != $s[$r]) {
                    break;
                }

                $_len = $r - $l + 1;
                if ($_len > $maxLen) {
                    $maxLen = $_len;
                    $longestSubstring = substr($s, $l, $_len);
                }
                
                $l--;
                $r++;
            }
        }

        return $longestSubstring;
    }
}
// @lc code=end

