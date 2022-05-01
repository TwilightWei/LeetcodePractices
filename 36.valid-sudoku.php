/*
 * @lc app=leetcode id=36 lang=php
 *
 * [36] Valid Sudoku
 */

// @lc code=start
class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {
        $rowCheck = $colCheck = array_fill(0, 9, array_fill(1, 9, 0));
        $boxCheck = [
            '00' => array_fill(1, 9, 0),
            '01' => array_fill(1, 9, 0),
            '02' => array_fill(1, 9, 0),
            '10' => array_fill(1, 9, 0),
            '11' => array_fill(1, 9, 0),
            '12' => array_fill(1, 9, 0),
            '20' => array_fill(1, 9, 0),
            '21' => array_fill(1, 9, 0),
            '22' => array_fill(1, 9, 0),
        ];

        for ($i=0; $i<9; $i++) {
            for ($j=0; $j<9; $j++) {
                $num = $board[$i][$j];

                if (!is_numeric($num)) {
                    continue;
                }

                if ($rowCheck[$i][$num]) {
                    return false;
                }
                $rowCheck[$i][$num] = 1;

                if ($colCheck[$j][$num]) {
                    return false;
                }
                $colCheck[$j][$num] = 1;

                $index = floor($i/3) . floor($j/3);
                if ($boxCheck[$index][$num]) {
                    return false;
                }
                $boxCheck[$index][$num] = 1;
            }
        }
        return true;
    }
}
// @lc code=end

