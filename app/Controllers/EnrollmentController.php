<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class EnrollmentController extends BaseController
{
    use ResponseTrait;

    private $model;

    public function __construct()
    {
        $this->model = new CommonModel();
        helper('course');

    }

    public function enroll()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        $userId = $this->request->getPost('user_id');
    $courseId = $this->request->getPost('course_id');
    
    // Check for existing enrollment
    $existingEnrollment = $this->model->rowRecord('enrollment', ['user_id'=> $userId, 'course_id' => $courseId]);
                                      
    if ($existingEnrollment) {
        return $this->respond([
            'status' => 409, // Conflict status code
            'message' => 'User is already enrolled in this course.'
        ]);
    }


        $enrollmentData = [
            'user_id' => $this->request->getPost('user_id'),
            'course_id' => $this->request->getPost('course_id'),
            'payment_id' => $this->request->getPost('payment_id'),
            'enrollment_date' => date('Y-m-d H:i:s'),
            'status' => 'active'
        ];

         // Insert record and handle success/failure
         if ($this->model->insertRecord('enrollment', $enrollmentData)) {
            return $this->respond(['status' => 201, 'message' => 'Enrollment successful.']);
        } else {
            // Capture the database error
            $db = \Config\Database::connect();
            $error = $db->error();

            return $this->respond([
                'status' => 500,
                'message' => 'Enrollment failed.',
                'error' => $error['message'] ?? 'Unknown error occurred' // Provide a default message if blank
            ]);
        }
    }

    public function getEnrollments()
    {
        $enrollments = $this->model->getEnrollmentDetails();

        if (!empty($enrollments)) {
            return $this->respond(['status' => 200, 'data' => $enrollments]);
        }

        return $this->respond(['status' => 204, 'message' => 'No enrollments found.']);
    }

    public function getEnrollmentsByStudentId($student_id)
    {
        $enrollments = $this->model->getEnrollmentsByStudentId($student_id);

        if (!empty($enrollments)) {
            $enrollments = getAverageRatingsForCourses($enrollments);
            return $this->respond(['status' => 200, 'data' => $enrollments]);
        }

        return $this->respond(['status' => 204, 'message' => 'No enrollments found.']);
    }

    public function getEnrollmentsByInstructorId($instructor_id)
    {
        $enrollments = $this->model->getEnrollmentsByInstructorId($instructor_id);

        if (!empty($enrollments)) {
            return $this->respond(['status' => 200, 'data' => $enrollments]);
        }

        return $this->respond(['status' => 204, 'message' => 'No enrollments found.']);
    }
    public function getEnrollmentsByCourseId($courseId)
    {
        $enrollments = $this->model->getEnrollmentsByCourseId($courseId);

        if (!empty($enrollments)) {
            return $this->respond(['status' => 200, 'data' => $enrollments]);
        }

        return $this->respond(['status' => 204, 'message' => 'No enrollments found.']);
    }
}

