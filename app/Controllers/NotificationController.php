<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use Config\Validation;

class NotificationController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $validation;

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->validation = \Config\Services::validation();
        // $this->validation->setRules((new Validation())->notificationRules, (new Validation())->notificationErrors);
    }

    // Retrieve notifications
    public function index($id = null)
    {
        if ($id !== null) {
            $fetchRecord = $this->model->rowRecord('notifications', $id);

            if ($fetchRecord) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'Notification retrieved successfully.',
                    'data' => $fetchRecord,
                ]);
            }

            return $this->failNotFound('Notification with the given ID does not exist.');
        } else {
            $fetchRecord = $this->model->getNotificationsWithUserDetails('notifications');

            if (!empty($fetchRecord)) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'List of notifications retrieved successfully.',
                    'data' => $fetchRecord,
                ]);
            }

            return $this->respond([
                'status' => 204,
                'message' => 'No notifications found in the database.'
            ]);
        }
    }


    public function getNotificationBySender($senderId)
    {
        $notifications = $this->model->getNotificationsBySenderId($senderId);
        return $this->respond($notifications);
    }

    // Get notifications by receiver_id
    public function getNotificationByReceiver($receiverId)
    {
        $notifications = $this->model->getNotificationsByReceiverId($receiverId);
        return $this->respond($notifications);
    }
    // Create a new notification
    public function create()
    {
        if ($this->request->getMethod() === 'POST') {
            // Get input data
            $receivers = $this->request->getPost('receiver_id');
            $receivers_arr = explode(',', $receivers);
            $insertIdArr=[];
            foreach ($receivers_arr as $receiver) {
                
            $data = [
                'sender_id' => $this->request->getPost('sender_id'),
                'receiver_id' => $receiver,
                'role_id' => $this->request->getPost('role_id'),
                'message' => $this->request->getPost('message'),
                'is_read' => $this->request->getPost('is_read') ?? 0,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Validate data
            // $this->validation->setRules((new Validation())->notificationRules, (new Validation())->notificationErrors);
            // if (!$this->validation->run($data)) {
            //     return $this->respond([
            //         'status' => 400,
            //         'message' => 'Validation failed.',
            //         'errors' => $this->validation->getErrors()
            //     ]);
            // }

            // Insert record
            $insertId = $this->model->insertRecord('notifications', $data);

            $insertIdArr[]= $insertId;
        }

            if (count($insertIdArr) == count($receivers_arr)) {
                return $this->respond([
                    'status' => 201,
                    'message' => 'Notification created successfully.',
                ]);
            } else {
                return $this->respond([
                    'status' => 500,
                    'message' => 'An error occurred while creating the notification.'
                ]);
            }
        } else {
            return $this->respond([
                'status' => 405,
                'message' => 'Method Not Allowed. Only POST requests are supported for creating notifications.'
            ]);
        }
    }

    // Update an existing notification
    public function update($id = null)
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Method Not Allowed. Only POST requests are supported for updating notifications.']);
        }

        if ($id === null) {
            return $this->failNotFound('Notification ID is required to update a record.');
        }

        // Get input data
        $data = [
            'sender_id' => $this->request->getPost('sender_id'),
            'receiver_id' => $this->request->getPost('receiver_id'),
            'role_id' => $this->request->getPost('role_id'),
            'message' => $this->request->getPost('message'),
            'is_read' => $this->request->getPost('is_read'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Validate data
        $this->validation->setRules((new Validation())->notificationUpdateRules, (new Validation())->notificationUpdateErrors);
        if (!$this->validation->run($data)) {
            return $this->respond([
                'status' => 400,
                'message' => 'Validation failed.',
                'errors' => $this->validation->getErrors()
            ]);
        }

        // Update record
        if ($this->model->updateRecord('notifications', ['id' => $id], $data)) {
            return $this->respond(['status' => 200, 'message' => 'Notification updated successfully.', 'data' => $data]);
        }

        return $this->respond(['status' => 500, 'message' => 'An error occurred while updating the notification.']);
    }

    // Delete a notification
    public function delete($id = null)
    {
        if ($this->request->getMethod() !== 'delete') {
            return $this->respond(['status' => 405, 'message' => 'Method Not Allowed. Only DELETE requests are supported for deleting notifications.']);
        }

        if ($id === null) {
            return $this->failNotFound('Notification ID is required to delete a record.');
        }

        if ($this->model->deleteRecord('notifications', ['id' => $id])) {
            return $this->respond(['status' => 200, 'message' => 'Notification deleted successfully.']);
        }

        return $this->respond(['status' => 500, 'message' => 'An error occurred while deleting the notification.']);
    }
}
