<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\RESTful\ResourceController;

class AnalyticsController extends ResourceController
{
    protected $commonModel;

    public function __construct()
    {
        $this->commonModel = new CommonModel();
    }

    // 1. Get total users, courses, and enrollments
    public function getTotalCounts()
    {
        $data = $this->commonModel->getTotalCounts();
        return $this->respond($data);
    }

    public function getTotalCountsByInstitution($institute_id)
    {
        $data = $this->commonModel->getTotalCountsByInstitution($institute_id);
        return $this->respond($data);
    }

    // 2. Get total revenue by currency (default USD)
    public function getTotalRevenue($currency = 'USD')
    {
        $data = $this->commonModel->getTotalRevenue($currency);
        return $this->respond($data);
    }

    // 3. Get average ratings for each course
    public function getAverageCourseRatings()
    {
        $data = $this->commonModel->getAverageCourseRatings();
        return $this->respond($data);
    }

    // 4. Get monthly enrollment trends
    public function getMonthlyEnrollmentTrends()
    {
        $data = $this->commonModel->getMonthlyEnrollmentTrends();
        return $this->respond($data);
    }

    // 5. Get active and completed enrollments per course
    public function getCourseEnrollmentStatus()
    {
        $data = $this->commonModel->getCourseEnrollmentStatus();
        return $this->respond($data);
    }

    public function getStudentsEnrolledInInstructorCourses($instructorId)
    {
        $data = $this->commonModel->getStudentsEnrolledInInstructorCourses($instructorId);
        return $this->respond($data);
    }
}
