<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;
use App\Models\CommonModel;

class LectureController extends Controller
{
    use ResponseTrait;

    private $model;
    private $table = 'lectures';

    public function __construct()
    {
        $this->model = new CommonModel();
    }

    public function index($id = null)
    {
        // Fetch a single lecture if ID is provided, otherwise fetch all lectures
        if ($id !== null) {
            $lecture = $this->model->rowRecord($this->table, ['lecture_id' => $id]);

            if ($lecture) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'Lecture retrieved successfully.',
                    'data' => $lecture,
                ]);
            }

            return $this->failNotFound('No lecture found with the provided ID.');
        } else {
            $lectures = $this->model->selectRecord($this->table, []);

            if (!empty($lectures)) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'Lectures retrieved successfully.',
                    'data' => $lectures,
                ]);
            }

            return $this->respond([
                'status' => 204,
                'message' => 'No lectures available at the moment.'
            ]);
        }
    }

    public function BySection($section_id)
    {
        // Check if section_id is provided
        if ($section_id === null) {
            return $this->failNotFound('Section ID is required.');
        }

        // Fetch lectures for the specified section
        $lectures = $this->model->selectRecord($this->table, ['section_id' => $section_id]);

        if (!empty($lectures)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Lectures retrieved successfully.',
                'data' => $lectures,
            ]);
        }

        return $this->failNotFound('No lectures found for the provided section ID.');
    }


    public function create()
    {
        // Check if the request method is POST
        if ($this->request->getMethod() === 'POST') {
            // Retrieve data from the request

	//return $this->respond($this->request->getPost());
            $section_id = $this->request->getPost('section_id');
            $lecture_title = $this->request->getPost('lecture_title');
            $file_type = $this->request->getPost('file_type');
            $content = $this->request->getPost('content');

            // Check if the required fields are present
            if (empty($section_id) || empty($lecture_title)) {
                return $this->respond([
                    'status' => 400,
                    'message' => 'Section ID and lecture title are required.'
                ]);
            }

            // Initialize video URL
            $lecture_video_url = null;

            // Handle file uploads
            $file = $this->request->getFile('lecture_video');
            if ($file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Move the file to the specified directory
                    $lecture_video_url = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/courses/lecturerVideo', $lecture_video_url);
                } else {
                    // Return error if the file is not valid or has moved
                    return $this->respond([
                        'status' => 400,
                        'message' => 'Video upload error: ' . $file->getErrorString()
                    ]);
                }
            }

            // Prepare data for insertion
            $data = [
                'section_id' => $section_id,
                'lecture_title' => $lecture_title,
                'lecture_video_url' => $lecture_video_url,
                'file_type' => $file_type,
                'content' => $content,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Insert record into the table
            if ($this->model->insertRecord($this->table, $data)) {
                return $this->respond([
                    'status' => 201,
                    'message' => 'Lecture created successfully',
                ]);
            } else {
                return $this->respond([
                    'status' => 500,
                    'message' => 'Failed to create lecture',
                ]);
            }
        } else {
            // Handle non-POST requests
            return $this->respond([
                'status' => 405,
                'message' => 'POST requests are required for creating lectures.'
            ]);
        }
    }


    public function update($id = null)
    {
        // Ensure the request method is POST
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond([
                'status' => 405,
                'message' => 'POST requests are required for updating lectures.'
            ]);
        }

        // Validate ID
        if ($id === null) {
            return $this->failNotFound('Lecture ID is required for updating.');
        }

        // Fetch existing record
        $existingLecture = $this->model->rowRecord($this->table, ['lecture_id' => $id]);
        if (empty($existingLecture)) {
            return $this->failNotFound('No lecture found with the provided ID.');
        }

        // Retrieve and prepare data from the request
        $data = [
            'section_id' => $this->request->getPost('section_id'),
            'lecture_title' => $this->request->getPost('lecture_title'),
            'file_type' => $this->request->getPost('file_type'),
            'content' => $this->request->getPost('content'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Handle file uploads
        $file = $this->request->getFile('lecture_video');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $lecture_video_url = $file->getRandomName();
            $file->move(FCPATH . 'uploads/courses/lecturerVideo', $lecture_video_url);
            $data['lecture_video_url'] = $lecture_video_url;
        } else {
            if ($file) {
                return $this->respond([
                    'status' => 400,
                    'message' => 'Video upload error: ' . $file->getErrorString()
                ]);
            }
        }

        // Update the record
        if ($this->model->updateRecord($this->table, ['lecture_id' => $id], $data)) {
            return $this->respond([
                'status' => 200,
                'message' => 'Lecture updated successfully',
                'data' => $data
            ]);
        }

        return $this->respond([
            'status' => 500,
            'message' => 'Failed to update lecture'
        ]);
    }

    public function delete($id = null)
    {
        // Ensure the request method is DELETE
        if ($this->request->getMethod() !== 'DELETE') {
            return $this->respond([
                'status' => 405,
                'message' => 'DELETE requests are required for deleting lectures.'
            ]);
        }

        // Validate ID
        if ($id === null) {
            return $this->failNotFound('Lecture ID is required for deletion.');
        }

        // Fetch existing record
        $existingLecture = $this->model->rowRecord($this->table, ['lecture_id' => $id]);
        if (empty($existingLecture)) {
            return $this->failNotFound('No lecture found with the provided ID.');
        }

        // Delete the record
        if ($this->model->deleteRecord($this->table, ['lecture_id' => $id])) {
            // Optionally delete the video file from the server
            // if ($existingLecture['lecture_video_url']) {
            //     @unlink(FCPATH . 'uploads/courses/lecturerVideo/' . $existingLecture['lecture_video_url']);
            // }
            return $this->respond([
                'status' => 200,
                'message' => 'Lecture deleted successfully'
            ]);
        }

        return $this->respond([
            'status' => 500,
            'message' => 'Failed to delete lecture'
        ]);
    }
}
