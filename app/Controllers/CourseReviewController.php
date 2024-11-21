<?php
namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use Config\Validation;

class CourseReviewController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $table = 'course_review';
    private $validation;

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules((new Validation())->courseReviewRules, (new Validation())->courseReviewErrors);
    }

    public function index($id = null)
    {
        if ($id !== null) {
            // Fetch reviews by course_id if ID is provided
            $fetchRecords = $this->model->selectRecord($this->table, ['course_id' => $id]);

            if (!empty($fetchRecords)) {
                return $this->respond([
                    'status' => 200,
                    'data' => $fetchRecords,
                ]);
            }

            return $this->respond([
                'status' => 204,
                'message' => 'No reviews found for this course.'
            ]);
        } else {
            // Fetch all reviews if no ID is provided
            $fetchRecords = $this->model->selectRecord($this->table);

            if (!empty($fetchRecords)) {
                return $this->respond([
                    'status' => 200,
                    'data' => $fetchRecords,
                ]);
            }

            return $this->respond([
                'status' => 204,
                'message' => 'No reviews available.'
            ]);
        }
    }
    public function getAllReviews($courseId)
{
    if ($courseId === null) {
        return $this->respond([
            'status' => 400,
            'message' => 'course_id is required.'
        ]);
    }

    $fetchRecords = $this->model->getAllReviewsWithUsersByCourseId(['course_id' => $courseId]);

    if (!empty($fetchRecords)) {
        return $this->respond([
            'status' => 200,
            'data' => $fetchRecords,
        ]);
    }

    return $this->respond([
        'status' => 204,
        'message' => 'No reviews found for this course.'
    ]);
}


    public function create()
    {
        // Check if the request method is POST
        if ($this->request->getMethod() === 'POST') {
            // Validate input data
            if (!$this->validate($this->validation->getRules(), $this->validation->getErrors())) {
                return $this->respond([
                    'status' => 400,
                    'message' => $this->validator->getErrors()
                ]);
            }

            // Retrieve data from the request
            $course_id = $this->request->getPost('course_id');
            $student_id = $this->request->getPost('student_id');
            $rating = $this->request->getPost('rating');
            $comment = $this->request->getPost('comment');

            // Prepare data for insertion
            $data = [
                'course_id' => $course_id,
                'student_id' => $student_id,
                'rating' => $rating,
                'comment' => $comment,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Check if a review already exists for the same course and student
            $existingReview = $this->model->rowRecord($this->table, [
                'course_id' => $course_id,
                'student_id' => $student_id
            ]);

            if ($existingReview) {
                return $this->respond([
                    'status' => 409,
                    'message' => 'Review already exists for this course by this student.'
                ]);
            }

            // Insert record into the table
            $insert = $this->model->insertRecord($this->table, $data);

            if ($insert) {
                return $this->respond([
                    'status' => 201,
                    'message' => 'Review created successfully',
                ]);
            } else {
                return $this->respond([
                    'status' => 500,
                    'message' => 'Failed to create review',
                ]);
            }
        } else {
            // Handle non-POST requests
            return $this->respond([
                'status' => 405,
                'message' => 'Only POST requests are allowed.'
            ]);
        }
    }

    public function update($id = null)
    {
        // Ensure the request method is POST
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        // Validate ID
        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        // Fetch existing record
        $existingRecord = $this->model->rowRecord($this->table, ['review_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Review not found.');
        }

        // Validate input data
        if (!$this->validate($this->validation->getRules(), $this->validation->getErrors())) {
            return $this->respond([
                'status' => 400,
                'message' => $this->validator->getErrors()
            ]);
        }

        // Retrieve and prepare data from the request
        $data = [
            'rating' => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Update the record
        if ($this->model->updateRecord($this->table, ['review_id' => $id], $data)) {
            return $this->respond(['status' => 200, 'message' => 'Review updated successfully', 'data' => $data]);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to update review']);
    }

    public function delete($id = null)
    {
        // Ensure the request method is DELETE
        if ($this->request->getMethod() !== 'delete') {
            return $this->respond(['status' => 405, 'message' => 'Only DELETE requests are allowed.']);
        }

        // Validate ID
        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        // Fetch existing record
        $existingRecord = $this->model->rowRecord($this->table, ['review_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Review not found.');
        }

        // Delete the record
        if ($this->model->deleteRecord($this->table, ['review_id' => $id])) {
            return $this->respond(['status' => 200, 'message' => 'Review deleted successfully']);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to delete review']);
    }
}



