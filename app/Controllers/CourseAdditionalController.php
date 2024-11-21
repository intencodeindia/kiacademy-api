<?php
namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use Config\Validation;

class CourseAdditionalController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $table = 'courses_additional';
    private $validation;

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules((new Validation())->courseAdditionalRules, (new Validation())->courseAdditionalErrors);
    }

    public function index($courseId = null)
    {
        if ($courseId !== null) {
            // Fetch additional info for a specific course
            $fetchRecord = $this->model->selectRecord($this->table, ['course_id' => $courseId]);

            if ($fetchRecord) {
                $result = [
                    'status' => 200,
                    'data' => $fetchRecord,
                ];
                return $this->respond($result);
            }

            return $this->failNotFound('Additional information for course ID ' . $courseId . ' not found.');
        } else {
            return $this->fail('Course ID is required.');
        }
    }

    public function create($courseId = null)
    {
        if ($courseId === null) {
            return $this->fail('Course ID is required.');
        }

        // Check if the request method is POST
        if ($this->request->getMethod() == 'POST') {
            // Validate input data
            // if (!$this->validate($this->validation->getRules(), $this->validation->getErrors())) {
            //     return $this->respond([
            //         'status' => 400,
            //         'message' => $this->validator->getErrors()
            //     ]);
            // }

            // Retrieve data from the request
            $data = [
                'course_id' => $courseId,
                'who_is_for' => $this->request->getVar('who_is_for'),
                'what_you_will_learn' => $this->request->getVar('what_you_will_learn'),
                'requirements' => $this->request->getVar('requirements'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Insert the new record into the database
            $insert = $this->model->insertRecord($this->table, $data);

            if ($insert) {
                $result = [
                    'status' => 201,
                    'message' => 'Additional information created successfully',
                ];
                return $this->respond($result);
            } else {
                $result = [
                    'status' => 500,
                    'message' => 'Failed to create additional information',
                ];
                return $this->respond($result);
            }
        } else {
            // Handle non-POST requests
            $result = [
                'status' => 405,
                'message' => 'Only POST requests are allowed.'
            ];
            return $this->respond($result);
        }
    }

    public function update($courseId = null, $additionalId = null)
    {
        if ($courseId === null || $additionalId === null) {
            return $this->fail('Course ID and Additional Info ID are required.');
        }

        // Check if the request method is PUT or PATCH
        if ($this->request->getMethod() == 'PUT' || $this->request->getMethod() == 'POST') {
            // Validate input data
            // if (!$this->validate($this->validation->getRules(), $this->validation->getErrors())) {
            //     return $this->respond([
            //         'status' => 400,
            //         'message' => $this->validator->getErrors()
            //     ]);
            // }

            // Retrieve data from the request
            $data = [
                'who_is_for' => $this->request->getVar('who_is_for'),
                'what_you_will_learn' => $this->request->getVar('what_you_will_learn'),
                'requirements' => $this->request->getVar('requirements'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            // return $this->respond($data);
            // exit;
            // Prepare where condition
            $where = ['course_additional_id' => $additionalId];

            // Update the record in the database
            $update = $this->model->updateRecord($this->table, $where, $data);

            if ($update) {
                $result = [
                    'status' => 200,
                    'message' => 'Additional information updated successfully',
                    'data' => $data
                ];
                return $this->respond($result);
            } else {
                $result = [
                    'status' => 500,
                    'message' => 'Failed to update additional information'
                ];
                return $this->respond($result);
            }
        } else {
            // Handle non-PUT/PATCH requests
            $result = [
                'status' => 405,
                'message' => 'Only PUT/PATCH requests are allowed.'
            ];
            return $this->respond($result);
        }
    }

    public function delete($courseId = null, $additionalId = null)
    {
        if ($courseId === null || $additionalId === null) {
            return $this->fail('Course ID and Additional Info ID are required.');
        }

        // Check if the record exists
        $recordExists = $this->model->rowRecord($this->table, ['course_additional_id' => $additionalId]);

        if ($recordExists) {
            // Delete the record
            $delete = $this->model->deleteRecord($this->table, ['course_additional_id' => $additionalId]);

            if ($delete) {
                $result = [
                    'status' => 200,
                    'message' => 'Additional information successfully deleted.',
                    'data' => ['course_id' => $courseId, 'course_additional_id' => $additionalId]
                ];
                return $this->respondDeleted($result);
            } else {
                return $this->fail('Deletion failed.', 500);
            }
        }

        return $this->failNotFound('Additional information not found.');
    }
}


