<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use Config\Validation;

class CourseQuizController extends BaseController
{
    use ResponseTrait;

    private $model;
    private $validation;

    private $table = 'quiz'; // Assuming the table name is 'quizzes'

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules((new Validation())->quizRules, (new Validation())->quizErrors);
    }

    public function index($id = null)
    {
        if ($id !== null) {
            $fetchRecord = $this->model->selectRecord($this->table, ['section_id' => $id]);

            if ($fetchRecord) {
                return $this->respond(['status' => 200, 'data' => $fetchRecord]);
            }

            return $this->failNotFound('Quizzes not found.');
        } else {
            $fetchRecord = $this->model->selectRecord($this->table);

            if (!empty($fetchRecord)) {
                return $this->respond(['status' => 200, 'data' => $fetchRecord]);
            }

            return $this->respond(['status' => 204, 'message' => 'No content available.']);
        }
    }
    public function quiz($id = null)
    {
        if ($id !== null) {
            $fetchRecord = $this->model->rowRecord($this->table, ['section_id' => $id]);

            if ($fetchRecord) {
                return $this->respond(['status' => 200, 'data' => $fetchRecord]);
            }

            return $this->failNotFound('Quiz not found.');
        } else {
            $fetchRecord = $this->model->selectRecord($this->table);

            if (!empty($fetchRecord)) {
                return $this->respond(['status' => 200, 'data' => $fetchRecord]);
            }

            return $this->respond(['status' => 204, 'message' => 'No content available.']);
        }
    }

    public function create()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        $data = $this->request->getPost();
        // var_dump($data);
        if (!$this->validation->run($data)) {
            return $this->fail($this->validation->getErrors());
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        $insert = $this->model->insertRecord($this->table, $data);

        if ($insert) {
            return $this->respond(['status' => 201, 'message' => 'Quiz created successfully']);
        } else {
            return $this->respond(['status' => 500, 'message' => 'Failed to create quiz']);
        }
    }

    public function update($id = null)
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        $existingRecord = $this->model->rowRecord($this->table, ['quiz_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Quiz not found.');
        }

        $data = $this->request->getPost();
       

        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($this->model->updateRecord($this->table, ['quiz_id' => $id], $data)) {
            return $this->respond(['status' => 200, 'message' => 'Quiz updated successfully', 'data' => $data]);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to update quiz']);
    }

    public function delete($id = null)
    {
        if ($this->request->getMethod() !== 'DELETE') {
            return $this->respond(['status' => 405, 'message' => 'Only DELETE requests are allowed.']);
        }

        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        $existingRecord = $this->model->rowRecord($this->table, ['quiz_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Quiz not found.');
        }

        if ($this->model->deleteRecord($this->table, ['quiz_id' => $id])) {
            return $this->respond(['status' => 200, 'message' => 'Quiz deleted successfully']);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to delete quiz']);
    }

    

}

