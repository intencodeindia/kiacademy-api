<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class CourseSectionController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $table = 'course_sections';

    public function __construct()
    {
        $this->model = new CommonModel();
    }

    public function index($id = null)
{
    // Ensure that section_id is provided
    if ($id === null) {
        return $this->respond([
            'status' => 400,
            'message' => 'Section ID is required to retrieve data.'
        ]);
    }

    // Fetch a single record based on section_id
    $fetchRecord = $this->model->rowRecord($this->table, ['section_id' => $id]);

    if ($fetchRecord) {
        return $this->respond([
            'status' => 200,
            'message' => 'Section retrieved successfully.',
            'data' => $fetchRecord,
        ]);
    }

    // If no record is found with the given section_id
    return $this->failNotFound('No section found with the provided ID.');
}

public function getSectionsByCourseId($courseId = null)
{
    // Ensure that course_id is provided
    if ($courseId === null) {
        return $this->respond([
            'status' => 400,
            'message' => 'Course ID is required to retrieve sections.'
        ]);
    }

    // Fetch all records based on course_id
    $fetchRecords = $this->model->selectRecord($this->table, ['course_id' => $courseId]);

    if (!empty($fetchRecords)) {
        return $this->respond([
            'status' => 200,
            'message' => 'Sections retrieved successfully.',
            'data' => $fetchRecords,
        ]);
    }

    // If no records are found for the given course_id
    return $this->respond([
        'status' => 204,
        'message' => 'No sections found for the provided Course ID.'
    ]);
}

    public function create()
    {
        // Check if the request method is POST
        if ($this->request->getMethod() === 'POST') {
            // Retrieve data from the request
            $course_id = $this->request->getPost('course_id');
            $title = $this->request->getPost('title');
            $description = $this->request->getPost('description');
            // Validate required fields
            if (empty($course_id) || empty($title)) {
                return $this->respond([
                    'status' => 400,
                    'message' => 'Both Course ID and Title are required to create a section.'
                ]);
            }

            // Prepare data for insertion
            $data = [
                'course_id' => $course_id,
                'title' => $title,
                'description' => $description,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Insert record into the table
            $insert = $this->model->insertRecord($this->table, $data);

            if ($insert) {
                return $this->respond([
                    'status' => 201,
                    'message' => 'New section created successfully.',
                ]);
            } else {
                return $this->respond([
                    'status' => 500,
                    'message' => 'There was an error creating the section. Please try again later.',
                ]);
            }
        } else {
            // Handle non-POST requests
            return $this->respond([
                'status' => 405,
                'message' => 'Invalid request method. POST requests are required for creating sections.'
            ]);
        }
    }

    public function update($id = null)
    {
        // Ensure the request method is POST
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond([
                'status' => 405,
                'message' => 'Invalid request method. POST requests are required for updating sections.'
            ]);
        }

        // Validate ID
        if ($id === null) {
            return $this->failNotFound('Section ID is required for updating.');
        }

        // Fetch existing record
        $existingRecord = $this->model->rowRecord($this->table, ['section_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('No section found with the provided ID.');
        }

        // Retrieve and prepare data from the request
        $data = [
            'course_id' => $this->request->getPost('course_id'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Update the record
        if ($this->model->updateRecord($this->table, ['section_id' => $id], $data)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Section updated successfully.',
                'data' => $data
            ]);
        }

        return $this->respond([
            'status' => 500,
            'message' => 'There was an error updating the section. Please try again later.'
        ]);
    }

    public function delete($id = null)
    {
        // Ensure the request method is DELETE
        if ($this->request->getMethod() !== 'DELETE') {
            return $this->respond([
                'status' => 405,
                'message' => 'Invalid request method. DELETE requests are required for deleting sections.'
            ]);
        }

        // Validate ID
        if ($id === null) {
            return $this->failNotFound('Section ID is required for deletion.');
        }

        // Fetch existing record
        $existingRecord = $this->model->rowRecord($this->table, ['section_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('No section found with the provided ID.');
        }

        // Delete the record
        if ($this->model->deleteRecord($this->table, ['section_id' => $id])) {
            return $this->respond([
                'status' => 200,
                'message' => 'Section deleted successfully.'
            ]);
        }

        return $this->respond([
            'status' => 500,
            'message' => 'There was an error deleting the section. Please try again later.'
        ]);
    }
}

