/*
 * @lc app=leetcode id=207 lang=php
 *
 * [207] Course Schedule
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) {
        // Generate adjancey list
        $adjacanceyList = array_fill(0, $numCourses, []);
        foreach ($prerequisites as $prerequisite) {
            $adjacanceyList[$prerequisite[0]][] = $prerequisite[1];
        }
        
        // Do DFS
        for ($course=0; $course<$numCourses; $course++){
            $visitedVertices = [];
            if (!$this->checkFinishabile($adjacanceyList, $course, $visitedVertices)) {
                return false;
            }
        }
        return true;
    }

    function checkFinishabile(&$adjacanceyList, $course, &$visitedVertices) {
        if (isset($visitedVertices[$course])) {
            return false;
        } elseif (!$preCourses = $adjacanceyList[$course]) {
            return true;
        }

        $visitedVertices[$course] = 1;
        foreach ($preCourses as $preCourse) {
            
            if (!$this->checkFinishabile($adjacanceyList, $preCourse, $visitedVertices)) {
                return false;
            }
        }
        unset($visitedVertices[$course]);
        $adjacanceyList[$course] = [];
        return true;
    }
}
// @lc code=end

