<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use Config\Validation;

class QuestionAnswerController extends BaseController
{
    use ResponseTrait;

    private $model;
    private $validation;
    private $db;
    private $questionTable = 'question';
    private $answerTable = 'answer';

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules((new Validation())->questionRules, (new Validation())->questionErrors);
        $this->validation->setRules((new Validation())->answerRules, (new Validation())->answerErrors);
        $this->db = \Config\Database::connect();
    }

    // public function index($quiz_id = null)
    // {
    //     if ($quiz_id !== null) {
    //         $questions = $this->model->selectRecord($this->questionTable, ['quiz_id' => $quiz_id]);

    //         if ($questions) {
    //             foreach ($questions as &$question) {
    //                 $question['answers'] = $this->model->selectRecord($this->answerTable, ['question_id' => $question['question_id']]);
    //             }

    //             return $this->respond(['status' => 200, 'data' => $questions]);
    //         }

    //         return $this->failNotFound('Questions not found.');
    //     } else {
    //         return $this->respond(['status' => 400, 'message' => 'Quiz ID is required.']);
    //     }
    // }


    public function index($quiz_id = null)
{
    if ($quiz_id !== null) {
        $questions = json_decode(json_encode($this->model->selectRecord($this->questionTable, ['quiz_id' => $quiz_id])), true);

        if ($questions) {
           return $this->respond(['status' => 200, 'data' => $questions]);
        }

        return $this->failNotFound('Questions not found.');
    } else {
        return $this->respond(['status' => 400, 'message' => 'Quiz ID is required.']);
    }
}


    public function create()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        $data = $this->request->getPost();
        // var_dump($data['answers']);

        // $data_answers = json_decode($data['answers'], true);
       
        // Validate question data
        if (!$this->validation->run($data, 'questionRules')) {
            return $this->fail($this->validation->getErrors());
        }

        // Add created_at timestamp for question

        // Start a transaction
        $this->db->transBegin();

        $dataQuestion = [
            'question_text' => $this->request->getPost('question_text'),
            'description' => $this->request->getPost('description'),
            'quiz_id' => $this->request->getPost('quiz_id'),
            'answers' => $this->request->getPost('answers'),
        ];

        $dataQuestion['created_at'] = date('Y-m-d H:i:s');
        $dataQuestion['updated_at'] = date('Y-m-d H:i:s');

    
            $question_id = $this->model->insertQuestionRecord($this->questionTable, $dataQuestion);
            // var_dump($question_id);
            // exit;
            if ($question_id) {
                // $question_id = $this->model->getInsertID(); // Get last inserted question ID

                $this->db->transCommit(); // Commit transaction
                return $this->respond(['status' => 201, 'message' => 'Question and answers created successfully']);
                    
                    // exit;
                }

              
            else {
                $this->db->transRollback(); // Rollback transaction if question insert fails
                return $this->respond(['status' => 500, 'message' => 'Failed to create question']);
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

        $existingQuestion = $this->model->rowRecord($this->questionTable, ['question_id' => $id]);
        if (empty($existingQuestion)) {
            return $this->failNotFound('Question not found.');
        }

        $data = $this->request->getPost();

        // Validate question data
        // if (!$this->validation->run($data, 'question')) {
        //     return $this->fail($this->validation->getErrors());
        // }

        $data['updated_at'] = date('Y-m-d H:i:s');

        if ($this->model->updateRecord($this->questionTable, ['question_id' => $id], $data)) {
            // Update answers
            return $this->respond(['status' => 200, 'message' => 'Question and answers updated successfully', 'data' => $data]);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to update question']);
    }


    public function delete($id = null)
    {
        if ($this->request->getMethod() !== 'DELETE') {
            return $this->respond(['status' => 405, 'message' => 'Only DELETE requests are allowed.']);
        }

        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        // Start a transaction
        $this->db->transBegin();

        try {
            // Check if the question exists
            $existingQuestion = $this->model->rowRecord($this->questionTable, ['question_id' => $id]);
            if (empty($existingQuestion)) {
                $this->db->transRollback(); // Rollback transaction if question does not exist
                return $this->failNotFound('Question not found.');
            }

            // Delete associated answers
            $this->model->deleteRecord($this->answerTable, ['question_id' => $id]);

            // Delete the question
            $result = $this->model->deleteRecord($this->questionTable, ['question_id' => $id]);

            if ($result) {
                $this->db->transCommit(); // Commit transaction
                return $this->respond(['status' => 200, 'message' => 'Question and associated answers deleted successfully']);
            } else {
                $this->db->transRollback(); // Rollback transaction if deletion fails
                return $this->respond(['status' => 500, 'message' => 'Failed to delete question']);
            }
        } catch (\Exception $e) {
            $this->db->transRollback(); // Rollback transaction in case of any exception
            return $this->respond(['status' => 500, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}


