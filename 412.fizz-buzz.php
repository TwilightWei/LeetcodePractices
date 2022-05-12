/*
 * @lc app=leetcode id=412 lang=php
 *
 * [412] Fizz Buzz
 */

// @lc code=start
class Solution {

/**
 * @param Integer $n
 * @return String[]
 */
function fizzBuzz($n) {
    $result = [];
    
    for ($i=1; $i<=$n; $i++) {
        $string = '';
        // if $i is the multiple of 3, then $string append 'Fizz'
        $sumOfDigites = array_sum(str_split(strval($i), 1));
        $string .= ($sumOfDigites%3 === 0) ? 'Fizz' : '';
        
        // if $i is the multiple of 5, then $string append 'Buzz'
        $len = strlen(strval($i));
        $string .= ((strval($i)[$len-1] == 0) || (strval($i)[$len-1] == 5)) ? 'Buzz' : '';
        
        // if $string is empty, then $string will be (str)$i
        $string = $string ?: strval($i);
        
        $result[] = $string;
    }
    
    return $result;
}
}
// @lc code=end

