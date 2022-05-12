/*
 * @lc app=leetcode id=210 lang=php
 *
 * [210] Course Schedule II
 */

// @lc code=start
class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Integer[]
     */
    function findOrder($numCourses, $prerequisites) {
        $courseOrders = $adjacanceyList = array_fill(0, $numCourses, []);
        $lastCourses = array_fill(0, $numCourses, true);
        foreach ($prerequisites as $prerequisite) {
            $adjacanceyList[$prerequisite[0]][] = $prerequisite[1];
        }

        for ($course=0; $course<$numCourses; $course++) {
            $visitedVertices = $courseOrder = [];
            if (!$this->checkCourse($course, $adjacanceyList, $visitedVertices, $courseOrders, $courseOrder, $lastCourses)) {
                return [];
            }
            $courseOrders[$course] = $courseOrder;
            $adjacanceyList[$course] = [];
        }

        // print_r($courseOrders);
        $result = [];
        foreach ($lastCourses as $key => $lastCourse) {
            if ($lastCourse) {
                $result = array_unique(array_merge($result, $courseOrders[$key]));
            }
        }
        return $result;
    }

    function checkCourse($course, &$adjacanceyList, &$visitedVertices, &$courseOrders, &$courseOrder, &$lastCourses) {
        if (isset($visitedVertices[$course])) {
            return false;
        } elseif (!$neighbors = $adjacanceyList[$course]) {
            if (!in_array($course, $courseOrder)) {
                if ($_courseOrder = $courseOrders[$course]) {
                    $courseOrder = array_merge($courseOrder, $_courseOrder);
                } else {
                    $courseOrder[] = $course;
                }
            }
            return true;
        } else {
            $visitedVertices[$course] = 1;
            foreach ($neighbors as $neighbor) {
                if (!$result = $this->checkCourse($neighbor, $adjacanceyList, $visitedVertices, $courseOrders, $courseOrder, $lastCourses)) {
                    return false;
                }
                $lastCourses[$neighbor] = false;
            }
            unset($visitedVertices[$course]);
            if (!in_array($course, $courseOrder)) {
                $courseOrder[] = $course;
            }
            return true;
        }
    }
}
// @lc code=end

