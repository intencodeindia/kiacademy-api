<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class CartController extends BaseController
{
    use ResponseTrait;

    private $model;
    private $table = 'cart';

    public function __construct()
    {
        $this->model = new CommonModel();
    }

    public function addToCart()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'course_id' => $this->request->getPost('course_id')
        ];

        // Insert or update cart item
        $existingItem = $this->model->rowRecord($this->table, [
            'user_id' => $data['user_id'],
            'course_id' => $data['course_id']
        ]);

        if ($existingItem) {
            //$data['quantity'] += $existingItem->quantity; // Update quantity
            $this->model->updateRecord($this->table, $existingItem->id, $data);
        } else {
            $this->model->insertRecord($this->table, $data);
        }

        return $this->respond(['status' => 201, 'message' => 'Item added to cart successfully.']);
    }

    public function viewCart($userId)
    {
       
        $locationController = new \App\Controllers\LocationController();

        // Fetch location data to get the currency
        $locationData = $locationController->Location(); // Fetch method returns data
        $currency = $locationData['locationData']['allData']['currency'] ?? 'INR'; // Default to INR if currency is not set
        $cartItems = $this->model->getCartDetails($userId,$currency);
        if (!empty($cartItems)) {
            return $this->respond(['status' => 200, 'data' => $cartItems]);
        }

        return $this->respond(['status' => 204, 'message' => 'Cart is empty.']);
    }

    public function clearCart($userId)
    {
       
        if ($this->model->deleteRecord($this->table, ['user_id' => $userId])) {
            return $this->respond(['status' => 200, 'message' => 'Cart cleared successfully.']);
        }

        return $this->respond(['status' => 404, 'message' => 'Item not found.']);
    }

    public function removeFromCart($userId,$courseId)
    {
        if ($this->model->deleteRecord($this->table, ['user_id' => $userId, 'course_id' => $courseId])) {
            return $this->respond(['status' => 200, 'message' => 'Item removed from cart successfully.']);
        }

        return $this->respond(['status' => 404, 'message' => 'Item not found.']);
    }
}
