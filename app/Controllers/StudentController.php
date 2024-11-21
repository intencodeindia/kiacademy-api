<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use Config\Validation;

class StudentController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $validation;

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules((new Validation())->studentCreateRules, (new Validation())->studentCreateErrors);
    }

    public function index($id = null)
    {
        if ($id !== null) {
            $fetchRecord = $this->model->getStudentWithUser($id);

            if ($fetchRecord) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'Student retrieved successfully.',
                    'data' => $fetchRecord,
                ]);
            }

            return $this->failNotFound('Student with the given ID does not exist.');
        } else {
            $fetchRecord = $this->model->getAllStudentsWithUsers();

            if (!empty($fetchRecord)) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'List of students retrieved successfully.',
                    'data' => $fetchRecord,
                ]);
            }

            return $this->respond([
                'status' => 204,
                'message' => 'No students found in the database.'
            ]);
        }
    }

    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            // Get input data
            $data = [
                'user_id' => $this->request->getPost('user_id'),
                'date_of_birth' => $this->request->getPost('date_of_birth'),
                'bio' => $this->request->getPost('bio'),
                'student_mobile_number' => $this->request->getPost('student_mobile_number'),
                'student_parent_mobile' => $this->request->getPost('student_parent_mobile'),
                'student_parent_email' => $this->request->getPost('student_parent_email'),
                'address' => $this->request->getPost('address'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            // Validate data
            // $this->validation->setRules((new Validation())->studentCreateRules, (new Validation())->studentCreateErrors);
            // if (!$this->validation->run($data)) {
            //     return $this->respond([
            //         'status' => 400,
            //         'message' => 'Validation failed.',
            //         'errors' => $this->validation->getErrors()
            //     ]);
            // }

            // Insert record
            $insertId = $this->model->insertRecord('students', $data);

            if ($insertId) {
                return $this->respond([
                    'status' => 201,
                    'message' => 'Student record created successfully.',
                    'data' => ['student_id' => $insertId]
                ]);
            } else {
                return $this->respond([
                    'status' => 500,
                    'message' => 'An error occurred while creating the student record.'
                ]);
            }
        } else {
            return $this->respond([
                'status' => 405,
                'message' => 'Method Not Allowed. Only POST requests are supported for creating records.'
            ]);
        }
    }

    public function update($id = null)
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Method Not Allowed. Only POST requests are supported for updating records.']);
        }

        if ($id === null) {
            return $this->failNotFound('Student ID is required to update a record.');
        }

        // Get input data
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'bio' => $this->request->getPost('bio'),
            'student_mobile_number' => $this->request->getPost('student_mobile_number'),
            'student_parent_mobile' => $this->request->getPost('student_parent_mobile'),
            'student_parent_email' => $this->request->getPost('student_parent_email'),
            'address' => $this->request->getPost('address'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // return $this->respond(['status' => 200, 'message' => 'Stesting Student record.', 'data' => $data]);
        // Validate data
        // $this->validation->setRules((new Validation())->studentUpdateRules, (new Validation())->studentUpdateErrors);
        // if (!$this->validation->run($data)) {
        //     return $this->respond([
        //         'status' => 400,
        //         'message' => 'Validation failed.',
        //         'errors' => $this->validation->getErrors()
        //     ]);
        // }

        // Update record
        if ($this->model->updateRecord('students', ['student_id' => $id], $data)) {
            return $this->respond(['status' => 200, 'message' => 'Student record updated successfully.', 'data' => $data]);
        }

        return $this->respond(['status' => 500, 'message' => 'An error occurred while updating the student record.']);
    }

    public function delete($id = null)
    {
        if ($this->request->getMethod() !== 'delete') {
            return $this->respond(['status' => 405, 'message' => 'Method Not Allowed. Only DELETE requests are supported for deleting records.']);
        }

        if ($id === null) {
            return $this->failNotFound('Student ID is required to delete a record.');
        }

        if ($this->model->deleteRecord('students', ['user_id' => $id])) {
            return $this->respond(['status' => 200, 'message' => 'Student record deleted successfully.']);
        }

        return $this->respond(['status' => 500, 'message' => 'An error occurred while deleting the student record.']);
    }
}


