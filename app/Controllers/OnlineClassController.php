<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use App\Helpers\BbbHelper;
class OnlineClassController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $table = 'onlineclasses';

    public function __construct()
    {
        $this->model = new CommonModel();
    }

    public function index($id = null)
    {
        if ($id !== null) {
            // Fetch details for a single online class
            $fetchRecord = $this->model->selectRecord($this->table, ['course_id' => $id]);

            if ($fetchRecord) {
                return $this->respond([
                    'status' => 200,
                    'data' => $fetchRecord,
                ]);
            }

            return $this->failNotFound($id . ' Record not found.');
        } else {
            // Fetch all online classes
            $fetchRecord = $this->model->selectRecord($this->table);

            if (!empty($fetchRecord)) {
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

    public function create()
    {
        // Only allow POST requests
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }
    
        // Initialize BigBlueButton helper
        $bbb = new BbbHelper();
    
        // Retrieve posted data
        $postData = $this->request->getPost();
        $meetingID = uniqid('onlineclass_');
        $record = $postData['is_recorded']==='true' ?? false;
    
        // Call BigBlueButton API to create a meeting
        $response = $bbb->createMeeting($meetingID, $postData['title'], $record);
    //     var_dump($response->returncode);
    //     exit;
    //    return $this->respond(['bbb_response'=>$response]);
        // Check if the meeting was successfully created
        if ($response->returncode == 'SUCCESS') {
            // Prepare data for the online class record
            $data = [
                'title' => $postData['title'],
                'description' => $postData['description'] ?? null,
                'instructor_id' => $postData['instructor_id'],
                'course_id' => $postData['course_id'],
                'start_date' => $postData['start_date'],
                'end_date' => $postData['end_date'],
                'class_time' => $postData['class_time'],
                'class_duration' => $postData['class_duration'],
                'meeting_id' => $meetingID,
                'is_recorded' => $record,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            // return $this->respond(['bbb_response'=>$data]);
            // Insert the online class record into the database
            if ($this->model->insertRecord($this->table, $data)) {
                return $this->respond([
                    'status' => 201,
                    'message' => 'Online class created successfully',
                    'meetingID' => $meetingID
                ]);
            } else {
                return $this->respond(['status' => 500, 'message' => 'Failed to create online class record in the database']);
            }
        } else {
            // Handle failure to create meeting on BigBlueButton
            return $this->respond([
                'status' => 500,
                'message' => 'Failed to create online class on BigBlueButton',
                'data' => [
                    'error' => $response->message
                ]
            ]);
        }
    }
    public function joinOnlineClass()
{
    if ($this->request->getMethod() !== 'POST') {
        return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
    }

    $postData = $this->request->getPost();
    $meetingID = $postData['meeting_id'];
    $name = $postData['full_name'];
    $role = strtolower($postData['role']); // 'student' or 'instructor'

    $bbb = new BbbHelper();

    // Define passwords based on role
    $password = ($role === 'instructor') ? 'mp' : 'ap';

    // Generate the join URL
    $joinUrl = $bbb->joinMeeting($meetingID, $name, $password);

    return $this->respond([
        'status' => 200,
        'message' => 'Join URL generated successfully.',
        'data' => ['joinUrl' => $joinUrl]
    ]);
}
    /**
     * Get recordings for a given online class meeting ID.
     *
     * @param string $meetingID The meeting ID of the online class.
     *
     * @return \CodeIgniter\HTTP\ResponseInterface
     */

public function getOnlineClassRecordings($meetingID){
    $bbb = new BbbHelper();
    $recordings = $bbb->getRecordings($meetingID);
    return $this->respond([
        'status' => 200,
        'message' => 'Recordings fetched successfully.',
        'data' => $recordings??null
    ]);
}

    public function update($id = null)
    {
        if (!in_array($this->request->getMethod(), ['PUT', 'PATCH', 'POST'])) {
            return $this->respond(['status' => 405, 'message' => 'Only PUT/PATCH/POST requests are allowed.']);
        }

        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        $existingRecord = $this->model->selectRecord($this->table, ['id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Online class not found.');
        }

        $data = [
            'title' => $this->request->getVar('title') ?? $existingRecord[0]->title,
            'description' => $this->request->getVar('description') ?? $existingRecord[0]->description,
            'start_date' => $this->request->getVar('start_date') ?? $existingRecord[0]->start_date,
            'end_date' => $this->request->getVar('end_date') ?? $existingRecord[0]->end_date,
            'class_time' => $this->request->getVar('class_time') ?? $existingRecord[0]->class_time,
            'class_duration' => $this->request->getVar('class_duration') ?? $existingRecord[0]->class_duration,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return $this->model->updateRecord($this->table, ['id' => $id], $data)
            ? $this->respond(['status' => 200, 'message' => 'Online class updated successfully', 'data' => $data])
            : $this->respond(['status' => 500, 'message' => 'Failed to update online class']);
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return $this->failNotFound('Online class ID is required.');
        }

        $where = ['id' => $id];
        $recordExists = $this->model->rowRecord($this->table, $where);

        if ($recordExists) {
            if ($this->model->deleteRecord($this->table, $where)) {
                return $this->respondDeleted(['status' => 200, 'message' => 'Online class successfully deleted.']);
            } else {
                return $this->fail('Deletion failed.', 500);
            }
        }

        return $this->failNotFound('Online class not found.');
    }
}
