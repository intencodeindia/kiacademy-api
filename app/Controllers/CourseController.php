<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class CourseController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $table = 'courses';

    public function __construct()
    {
        $this->model = new CommonModel();
        helper('course');
    }

    public function index($id = null)
    {
        // Instantiate LocationController
        $locationController = new \App\Controllers\LocationController();

        // Fetch location data to get the currency
        $locationData = $locationController->Location(); // Fetch method returns data
        $currency = $locationData['locationData']['allData']['currency'] ?? 'INR'; // Default to INR if currency is not set

        if ($id !== null) {
            // Fetch details for a single course with dynamic pricing and user details
            $fetchRecord = $this->model->getCourseWithDetails($id, $currency);
            

            if ($fetchRecord) {
                $fetchRecord = getAverageRatingsForCourses($fetchRecord);
                return $this->respond([
                    'status' => 200,
                    'data' => $fetchRecord,
                ]);
            }

            return $this->failNotFound($id . ' Record not found.');
        } else {
            // Fetch details for all courses with dynamic pricing and user details
            $fetchRecord = $this->model->getAllCoursesWithDetails($currency);

            if (!empty($fetchRecord)) {
                $fetchRecord = getAverageRatingsForCourses($fetchRecord);
                return $this->respond([
                    'status' => 200,
                    'data' => $fetchRecord,
                ]);
            }

            return $this->respond([
                'status' => 204,
                'message' => 'No content available.'
            ]);
        }
    }

    public function recomended($id)
    {
        // Instantiate LocationController
        $locationController = new \App\Controllers\LocationController();

        // Fetch location data to get the currency
        $locationData = $locationController->Location(); // Fetch method returns data
        $currency = $locationData['locationData']['allData']['currency'] ?? 'INR'; // Default to INR if currency is not set

        
            // Fetch details for a single course with dynamic pricing and user details
            $fetchRecord = $this->model->getRecomendedCourse($id,$currency);
            

            if ($fetchRecord) {
                $fetchRecord = getAverageRatingsForCourses($fetchRecord);
                return $this->respond([
                    'status' => 200,
                    'data' => $fetchRecord,
                ]);
            }

            return $this->failNotFound($id . ' Record not found.');
        
    }

    public function getCoursesByInstructor($creatorId = null)
    {
        // Instantiate LocationController
        $locationController = new \App\Controllers\LocationController();

        // Fetch location data to get the currency
        $locationData = $locationController->Location(); // Fetch method returns data
        $currency = $locationData['locationData']['allData']['currency'] ?? 'INR'; // Default to INR if currency is not set

        if ($creatorId !== null) {
            // Validate the creatorId (e.g., ensure it's numeric or valid)
            if (!is_numeric($creatorId)) {
                return $this->respond([
                    'status' => 400,
                    'message' => 'Invalid instructor ID format.',
                ]);
            }

            // Fetch details for courses by instructor with dynamic pricing and user details
            $fetchRecords = $this->model->getAllCoursesByCreator($creatorId, $currency);

            if (!empty($fetchRecords)) {
                $fetchRecords = getAverageRatingsForCourses($fetchRecords);
                return $this->respond([
                    'status' => 200,
                    'data' => $fetchRecords,
                ]);
            }

            return $this->respond([
                'status' => 404,
                'message' => 'No courses found for the given instructor ID.',
            ]);
        }

        return $this->respond([
            'status' => 400,
            'message' => 'Instructor ID is required.',
        ]);
    }
    public function getCoursesForReview()
    {
        // Instantiate LocationController
        $locationController = new \App\Controllers\LocationController();
    
        // Fetch location data to get the currency
        $locationData = $locationController->Location(); // Fetch method returns data
        $currency = $locationData['locationData']['allData']['currency'] ?? 'INR'; // Default to INR if currency is not set
    
        // Fetch details for courses by instructor with dynamic pricing and user details
        $fetchRecords = $this->model->getAllCoursesForReview($currency);
    
        if (!empty($fetchRecords)) {
            return $this->respond([
                'status' => 200,
                'data' => $fetchRecords,
            ]);
        }
    
        return $this->respond([
            'status' => 404,
            'message' => 'No courses found for the given instructor ID.',
        ]);
    }
    

    public function create()
    {
        // Check if the request method is POST
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        // Get all POST data
        $postData = $this->request->getPost();
        error_log('Received POST data: ' . print_r($postData, true)); // Log received data for debugging

        // Validate course_title
        $course_title = $postData['course_title'] ?? null;
        if (empty($course_title)) {
            return $this->respond(['status' => 400, 'message' => 'Course title is required.']);
        }

        // Prepare data for insertion
        $data = [
            'course_title' => $course_title,
            'course_description' => $postData['course_description'] ?? null,
            'instructor_id' => $postData['instructor_id'], // Adjust based on authenticated user
            'course_category_id' => $postData['course_category_id'] ?? null,
            'course_language' => $postData['course_language'] ?? null,
            'course_price' => $postData['course_price'] ?? null,
            'course_level' => $postData['course_level'] ?? null,
            'course_status' => 0, // Default status
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null,
        ];

        // Handle file uploads
        $uploadPaths = [
            'course_thumbnail' => 'uploads/courses/image',
            'course_intro_video' => 'uploads/courses/introvideo'
        ];

        foreach ($uploadPaths as $field => $path) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $data[$field] = $file->getRandomName();
                $file->move(FCPATH . $path, $data[$field]);
            } else {
                $data[$field] = null; // Set to null if file is not valid
                if ($file) {
                    $this->logFileUploadError($field, $file);
                }
            }
        }

        //var_dump($data);
        //exit;   
        // Insert the new record into the database
        if ($this->model->insertRecord($this->table, $data)) {
            return $this->respond(['status' => 201, 'message' => 'Course Created Successfully']);
        } else {
            return $this->respond(['status' => 500, 'message' => 'Failed to create course']);
        }
    }

    private function logFileUploadError($field, $file)
    {
        echo ucfirst(str_replace('_', ' ', $field)) . " file error: " . $file->getErrorString();
    }


    public function update($id = null)
    {
        if (!in_array($this->request->getMethod(), ['put', 'patch', 'POST'])) {
            return $this->respond(['status' => 405, 'message' => 'Only PUT/PATCH/POST requests are allowed.']);
        }

        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        // Retrieve existing record
        $existingRecord = $this->model->selectRecord($this->table, ['course_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Course not found.');
        }

        $existingRecord = $existingRecord[0];

        // Retrieve and prepare data from the request
        $data = [
            'course_title' => $this->request->getVar('course_title') ?? $existingRecord->course_title,
            'course_description' => $this->request->getVar('course_description') ?? $existingRecord->course_description,
            'instructor_id' => $this->request->getVar('instructor_id') ?? $existingRecord->instructor_id,
            'course_category_id' => $this->request->getVar('course_category_id') ?? $existingRecord->course_category_id,
            'course_language' => $this->request->getVar('course_language') ?? $existingRecord->course_language,
            'course_price' => $this->request->getVar('course_price') ?? $existingRecord->course_price,
            'course_level' => $this->request->getVar('course_level') ?? $existingRecord->course_level,
            'course_status' => $this->request->getVar('course_status') ?? $existingRecord->course_status,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Handle file uploads
        foreach (['course_thumbnail' => 'uploads/courses/image', 'course_intro_video' => 'uploads/courses/introvideo'] as $field => $path) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                // Remove old file
                if ($existingRecord->$field && file_exists(FCPATH . $path . '/' . $existingRecord->$field)) {
                    unlink(FCPATH . $path . '/' . $existingRecord->$field);
                }
                // Move new file
                $data[$field] = $file->getRandomName();
                $file->move(FCPATH . $path, $data[$field]);
            } else {
                $data[$field] = $existingRecord->$field; // Keep existing value if no new file is uploaded
                if ($file) {
                    echo ucfirst(str_replace('_', ' ', $field)) . " file error: " . $file->getErrorString();
                }
            }
        }

        // Update the record
        return $this->model->updateRecord($this->table, ['course_id' => $id], $data)
            ? $this->respond(['status' => 200, 'message' => 'Course Updated Successfully', 'data' => $data])
            : $this->respond(['status' => 500, 'message' => 'Failed to update course']);
    }

    public function searchCourses($searchtearm = null){
          // Instantiate LocationController
          $locationController = new \App\Controllers\LocationController();

          // Fetch location data to get the currency
          $locationData = $locationController->Location(); // Fetch method returns data
          $currency = $locationData['locationData']['allData']['currency'] ?? 'INR'; // Default to INR if currency is not set
  
          if ($searchtearm !== null) {
              // Fetch details for a single course with dynamic pricing and user details
              $fetchRecord = $this->model->getCourseSearch($searchtearm, $currency);
              
  
              if ($fetchRecord) {
                  $fetchRecord = getAverageRatingsForCourses($fetchRecord);
                  return $this->respond([
                      'status' => 200,
                      'data' => $fetchRecord,
                  ]);
              }
  
              return $this->failNotFound($searchtearm . ' Record not found.');
          } 
          return $this->failNotFound('Record not found.');
    }


    public function delete($id = null)
    {

        if ($id === null) {
            return $this->failNotFound('Course ID is required.');
        }

        $where = ['course_id' => $id];
        $recordExists = $this->model->rowRecord($this->table, $where);

        if ($recordExists) {
            if ($this->model->deleteRecord($this->table, $where)) {

                $result = [
                    'status' => 200,
                    'message' => 'Course successfully deleted.',
                    'data' => ['course_id' => $id]
                ];
                return $this->respondDeleted($result);
            } else {
                return $this->fail('Deletion failed.', 500);
            }
        }

        return $this->failNotFound('Course not found.');
    }
}
