<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class Dashboard extends Controller
{
    use ResponseTrait; // Use ResponseTrait to handle API responses

    protected $model;
    private $usersTable = 'users'; // Correct table for users
    private $coursesTable = 'courses'; // Correct table for courses

    // Constructor to initialize the CommonModel
    public function __construct()
    {
        $this->model = new CommonModel();
    }

    public function index()
    {
        try {
            // Fetch the counts from the model
            $totalUsers = $this->model->getCount($this->usersTable);
            $totalStudents = $this->model->getCount($this->usersTable, ['role_id' => 3]); // Assuming role_id 3 represents students
            $totalAdmins = $this->model->getCount($this->usersTable, ['role_id' => 1]); // Assuming role_id 1 represents admins
            $totalInstructors = $this->model->getCount($this->usersTable, ['role_id' => 2]); // Assuming role_id 2 represents instructors
            $totalGuests = $this->model->getCount($this->usersTable, ['role_id' => 4]); // Assuming role_id 4 represents guests
            $totalCourses = $this->model->getCount($this->coursesTable); // Table for courses
            // You can uncomment and use the following line if needed:
            // $totalEnrollments = $this->model->getCount('enrollments');

            // Prepare the response data
            $result = [
                'status' => 200,
                'message' => 'Data fetched successfully',
                'data' => [
                    'total_users' => $totalUsers,
                    'total_admins' => $totalAdmins,
                    'total_students' => $totalStudents,
                    'total_instructors' => $totalInstructors,
                    'total_guests' => $totalGuests,
                    'total_courses' => $totalCourses,
                    // 'total_enrollments' => $totalEnrollments,
                ],
            ];

            return $this->respond($result, 200); // HTTP status 200 OK
        } catch (\Exception $e) {
            // If an exception occurs, return a 500 Internal Server Error response
            $result = [
                'status' => 500,
                'message' => 'An error occurred',
                'error' => $e->getMessage(),
            ];

            return $this->respond($result, 500); // HTTP status 500 Internal Server Error
        }
    }
}

