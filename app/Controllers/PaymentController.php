<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class PaymentController extends BaseController
{
    use ResponseTrait;

    private $model;
    protected $db;
    public function __construct()
    {
        $this->model = new CommonModel();
        $this->db = \Config\Database::connect();
    }

    public function processPayment()
{
    if ($this->request->getMethod() !== 'POST') {
        return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
    }

    // Assuming payment data comes from the request
    $paymentData = [
        'user_id' => $this->request->getPost('user_id'),
        'amount' => $this->request->getPost('amount'),
        'currency' => $this->request->getPost('currency'),
        'payment_method' => $this->request->getPost('payment_method'),
        'transaction_id' => $this->request->getPost('transaction_id'),
        'status' => 'pending',
        'created_at' => date('Y-m-d H:i:s')
    ];

    // Process payment logic (this could involve calling a payment gateway)

    // Simulating successful payment processing
    $paymentData['status'] = 'completed'; // Update based on actual payment response
    $db = \Config\Database::connect();
    $db->table('payment')->insert($paymentData);
    $paymentId = $db->insertID();

    return $this->respond(['status' => 200, 'message' => 'Payment processed successfully.', 'payment_id' => $paymentId]);
}


    public function getAllPaymentHistory()
    {
        $payments = $this->model->getAllPaymentHistory('payment');

        if (!empty($payments)) {
            return $this->respond(['status' => 200, 'data' => $payments]);
        }

        return $this->respond(['status' => 204, 'message' => 'No payment history found.']);
    }
    public function getPaymentHistory($userId)
    {
        $payments = $this->model->selectRecord('payment', ['user_id' => $userId]);

        if (!empty($payments)) {
            return $this->respond(['status' => 200, 'data' => $payments]);
        }

        return $this->respond(['status' => 204, 'message' => 'No payment history found.']);
    }
 public function getCourseByPaymentId($paymentId)
    {
        $courses = $this->model->getCourseByPaymentId($paymentId);

        if (!empty($courses)) {
            return $this->respond(['status' => 200, 'data' => $courses]);
        }

        return $this->respond(['status' => 204, 'message' => 'No payment history found.']);
    }


    public function getCurrency()
    {
        // Load the database connection
       

        // Specify your table name
        $table = 'course_pricematrix';

        // Run the DESCRIBE query
        $query = $this->db->query("DESCRIBE $table");

        // Initialize an array to store column names
        $columns = [];

        // Loop through the results and store each column name
        foreach ($query->getResultArray() as $row) {
            $columns[] = $row['Field'];
        }

        // Output the column names
        return $this->respond(['status' => 200, 'currency' => array_slice($columns, 2)]);
    }
    public function priceMatrix($curr)
{
    // Sanitize input to prevent SQL injection
    $curr = preg_replace('/[^a-zA-Z0-9_]/', '', $curr);
   

    // Query to fetch the price matrix with the selected currency
    $query = $this->db->query("
        SELECT ID, CONCAT($curr, ' (', Title, ')') AS tier_price
        FROM course_pricematrix
    ");
    
    // Fetch results
    $result = $query->getResultArray();

    // Respond with the data
    return $this->respond(['status' => 200, 'data' => $result]);
}
}

