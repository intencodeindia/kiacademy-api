<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class QuizResultController extends BaseController
{
    use ResponseTrait;

    private $model;
    // private $validation;

    private $table = 'quiz_result'; // Assuming your table name is 'quiz_result'

    public function __construct()
    {
        $this->model = new CommonModel();
       
    }

    // Retrieve all quiz results or results for a specific student/course
   
    // Retrieve a specific quiz result by quiz_result_id
    public function index($id = null,$user_id = 0)
    {
        if ($id === null && $user_id === null) {
            $fetchRecord = $this->model->selectRecord($this->table);

        if ($fetchRecord) {
            return $this->respond(['status' => 200, 'data' => $fetchRecord]);
        }
        else{
            return $this->failNotFound('Quiz result not found.');
        }
        }

        $fetchRecord = $this->model->rowRecord($this->table, ['quiz_id' => $id,'student_id' => $user_id]);

        if ($fetchRecord) {
            return $this->respond(['status' => 200, 'data' => $fetchRecord]);
        }
        return $this->respond(['status' => 201, 'message'=>'Quiz result not found for quiz_id '.$id]);
        // return $this->failNotFound('Quiz result not found.');
    }

    // Create a new quiz result entry
    public function create()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->fail('Only POST requests are allowed.', 405);
        }

        $data = $this->request->getPost();
        $data['created_at'] = date('Y-m-d H:i:s');
        //return $this->respond(['status' => 200, 'message' => 'Quiz result aaa updated successfully', 'data' => $data]);

       
        $insertId = $this->model->insertRecord($this->table, $data);

        if ($insertId) {
            return $this->respondCreated(['status' => 201, 'message' => 'Quiz result created successfully', 'data' => $data]);
        }

        return $this->failServerError('Failed to create quiz result');
    }

    // Update a quiz result entry
    public function update($id = null)
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->fail('Only POST requests are allowed.', 405);
        }

        if ($id === null) {
            return $this->fail('Quiz result ID is required.');
        }

        $existingRecord = $this->model->rowRecord($this->table, ['quiz_result_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Quiz result not found.');
        }

        $data = $this->request->getPost();
        $data['updated_at'] = date('Y-m-d H:i:s');
        // return $this->respond(['status' => 200, 'message' => 'Quiz result not updated successfully', 'data' => $data]);
        if ($this->model->updateRecord($this->table, ['quiz_result_id' => $id], $data)) {
            return $this->respond(['status' => 200, 'message' => 'Quiz result updated successfully', 'data' => $data]);
        }
        return $this->respond(['status' => 201, 'message' => 'Quiz result not updated', 'data' => $data]);
        // return $this->failServerError('Failed to update quiz result');
    }
}
