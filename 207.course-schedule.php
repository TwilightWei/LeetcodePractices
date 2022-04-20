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

        for ($i=0; $i<$numCourses; $i++) {
            // A stack to perform DFS
            // An array to store traversed courses
            $traveredCourses = [];
            $stack = [$i];
            print($i);
            while ($stack) {
                $course = end($stack);
                if (in_array($course, $traveredCourses)) {
                    // If the course is already traversed, then the course cannot be finished.
                    return false;
                } elseif ($coursePrereqs[$course]) {
                    // If the course has prerequisites, than push them into stack
                    $stack = array_merge($stack, $coursePrereqs[$course]);
                } else {
                    // If the course can be finishedm then set its prerequisites to [] and add it to traversed courses.
                    $prerequisites[$course] = [];
                    array_pop($stack);
                    $traveredCourses[] = $course;
                }
            }
        }

        return true;
    }   
}
// @lc code=end

