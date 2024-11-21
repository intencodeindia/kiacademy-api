<?php

if (!function_exists('getAverageRatingsForCourses')) {
    function getAverageRatingsForCourses(array $courses)
    {
        // Get an instance of the database
        $db = \Config\Database::connect();

        // Loop through each course and calculate the average rating
        foreach ($courses as &$course) {
            // Assuming the course array has a 'course_id' key
            $course_id = $course['course_id'];

            // Query the average rating for the current course_id
            $builder = $db->table('course_review');
            $result = $builder->select('AVG(rating) as average_rating')
                              ->where('course_id', $course_id)
                              ->groupBy('course_id')
                              ->get()
                              ->getRow();

            // Append the average rating to the course array
            $course['average_rating'] = $result ? $result->average_rating : null;
        }

        // Return the updated courses array with average ratings
        return $courses;
    }
}
