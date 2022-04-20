/*
 * @lc app=leetcode id=207 lang=php
 *
 * [207] Course Schedule
 */

// @lc code=start

// BFS
class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) {
        // The goal of this problem is to check if all the courses can be finished.
        // If there are any circle in the relations between the courses, then not all of the courses can be finished.
        // Therefore, I will traverse through each of the course through its relations and check if circles exit.
        // If a course has no prerequisites or all of its prerequisites can be finished, then the course can be finished.
        // On the other hand a course is visited more than once while traversing through the prerequisites of a course, then thers is a circle and the course cannot be finished.


        // Use hash table to find the prerequisites of courses quickly.
        // The adjacency list of the courses is transformed into an array which has course as key and its prerequisites as an integer array.
        $coursePrereqs = array_fill(0, $numCourses, []);
        foreach ($prerequisites as $prerequisite) {
            $coursePrereqs[$prerequisite[0]][] = $prerequisite[1];
        }

        // Use BFS to travers through prerequisites
        for ($course=0; $course<$numCourses; $course++) {
            
        }

        return true;
    }
}

// DFS
class Solution {

    /**
     * @param Integer $numCourses
     * @param Integer[][] $prerequisites
     * @return Boolean
     */
    function canFinish($numCourses, $prerequisites) {
        // The goal of this problem is to check if all the courses can be finished.
        // If there are any circle in the relations between the courses, then not all of the courses can be finished.
        // Therefore, I will traverse through each of the course through its relations and check if circles exit.
        // If a course has no prerequisites or all of its prerequisites can be finished, then the course can be finished.
        // On the other hand a course is visited more than once while traversing through the prerequisites of a course, then thers is a circle and the course cannot be finished.


        // Use hash table to find the prerequisites of courses quickly.
        // The adjacency list of the courses is transformed into an array which has course as key and its prerequisites as an integer array.
        $coursePrereqs = array_fill(0, $numCourses, []);
        foreach ($prerequisites as $prerequisite) {
            $coursePrereqs[$prerequisite[0]][] = $prerequisite[1];
        }

        for ($course=0; $course<$numCourses; $course++) {
            $traveredCourses = array_fill(0, $numCourses, 0);
            $result = $this->checkPrerequisite($course, $traveredCourses, $coursePrereqs);
            if (!$result) {
                return false;
            }
            $coursePrereqs[$course] = [];
        }

        return true;
    }

    function checkPrerequisite($course, $traveredCourses, &$coursePrereqs) {
        if ($traveredCourses[$course]) {
            // If the course is already traversed, then it cannot be finished
            return false;
        } elseif (!$coursePrereqs[$course]) {
            // If the course has no prerequisites, then it can be finished
            return true;
        } else {
            // If the course has prerequisites, then keep traversing
            $traveredCourses[$course] = 1;
            $prerequisites = $coursePrereqs[$course];
            foreach ($prerequisites as $prerequisite) {
                $result = $this->checkPrerequisite($prerequisite, $traveredCourses, $coursePrereqs);
                if (!$result) {
                    return false;
                }
            }
            return true;
        }
    }
}
// @lc code=end

