<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use Config\Validation;

class CouponController extends BaseController
{
    use ResponseTrait;

    private $model;
    private $validation;

    private $table = 'coupons';

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->validation = \Config\Services::validation();
        $this->validation->setRules((new Validation())->couponRules, (new Validation())->couponErrors);
    }

    public function index($id = null)
    {
        if ($id !== null) {
            $fetchRecord = $this->model->rowRecord($this->table, ['coupon_id' => $id]);

            if ($fetchRecord) {
                return $this->respond(['status' => 200, 'data' => $fetchRecord]);
            }

            return $this->failNotFound('Coupon not found.');
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
        if (!$this->validation->run($data)) {
            return $this->fail($this->validation->getErrors());
        }

        $data['created_at'] = date('Y-m-d H:i:s');
        $insert = $this->model->insertRecord($this->table, $data);

        if ($insert) {
            return $this->respond(['status' => 201, 'message' => 'Coupon created successfully']);
        } else {
            return $this->respond(['status' => 500, 'message' => 'Failed to create coupon']);
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

        $existingRecord = $this->model->rowRecord($this->table, ['coupon_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Coupon not found.');
        }

        $data = $this->request->getPost();
        if (!$this->validation->run($data)) {
            return $this->fail($this->validation->getErrors());
        }

        $data['updated_at'] = date('Y-m-d H:i:s');
        if ($this->model->updateRecord($this->table, ['coupon_id' => $id], $data)) {
            return $this->respond(['status' => 200, 'message' => 'Coupon updated successfully', 'data' => $data]);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to update coupon']);
    }

    public function delete($id = null)
    {
        if ($this->request->getMethod() !== 'delete') {
            return $this->respond(['status' => 405, 'message' => 'Only DELETE requests are allowed.']);
        }

        if ($id === null) {
            return $this->failNotFound('ID is required.');
        }

        $existingRecord = $this->model->rowRecord($this->table, ['coupon_id' => $id]);
        if (empty($existingRecord)) {
            return $this->failNotFound('Coupon not found.');
        }

        if ($this->model->deleteRecord($this->table, ['coupon_id' => $id])) {
            return $this->respond(['status' => 200, 'message' => 'Coupon deleted successfully']);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to delete coupon']);
    }
}


