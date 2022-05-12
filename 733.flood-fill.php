/*
 * @lc app=leetcode id=733 lang=php
 *
 * [733] Flood Fill
 */

// @lc code=start
class Solution {

    /**
    * @param Integer[][] $image
    * @param Integer $sr
    * @param Integer $sc
    * @param Integer $newColor
    * @return Integer[][]
    */
    function floodFill($image, $sr, $sc, $newColor) {
        // The image is stored as an adjacency matrix
        $oldColor = $image[$sr][$sc];
        $width = count($image[0]);
        $height = count($image);
        $visitedVertices = [];
        $stack[] = [$sr, $sc];

        // Do BFS
        while(!empty($stack)) {
            // Unshift vertex
            $vertex = array_shift($stack);
            // Record visited vertices
            $visitedVertices[$vertex[0] . $vertex[1]] = 1;
            // Set new color
            $image[$vertex[0]][$vertex[1]] = $newColor;
            // Add the neighbors into stack
            $stack = array_merge($stack, $this->getNeighbors($image, $width, $height, $vertex, $oldColor, $visitedVertices));
        }

        return $image;
    }

    function getNeighbors($image, $width, $height, $vertex, $oldColor, $visitedVertices) {
        $neighbors = [];
        $neighborCandidates = [
            [$vertex[0]+1, $vertex[1]], [$vertex[0]-1, $vertex[1]],
            [$vertex[0], $vertex[1]+1], [$vertex[0], $vertex[1]-1],
        ];

        foreach ($neighborCandidates as $candidate) {
            if ($candidate[0]>=0 && $candidate[0]<$height &&
                $candidate[1]>=0 && $candidate[1]<$width &&
                empty($visitedVertices[$candidate[0] . $candidate[1]]) &&
                $image[$candidate[0]][$candidate[1]]==$oldColor) {
                $neighbors[] = $candidate;
            }
        }
        return $neighbors;
    }
}
// @lc code=end

