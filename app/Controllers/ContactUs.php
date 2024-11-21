<?php
namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;

class ContactUs extends BaseController
{
    private $table = 'contact_us';
    use ResponseTrait;
    private $model;
    public function __construct()
    {
        $this->model = new CommonModel();
    }
    public function index()
    {                 
       
        $contacts= $this->model->selectRecord($this->table); // Get all contact records
        $response = [
            'status' => 200,
            'data' => $contacts
        ];
        return $this->respond($response);
        // return view('contact_us/index', $data); // Show the view with data
    }

    public function create()
    {
        $data = [
            'c_name' => $this->request->getPost('c_name'),
            'email' => $this->request->getPost('email'),
            'contact' => $this->request->getPost('contact'),
            'message' => $this->request->getPost('message'),
            'created_date' => date('Y-m-d H:i:s'),
        ];

        $this->model->insertRecord($this->table,$data); // Save the data to the database

        return $this->respond(['status' => 201, 'message' => 'Contact us created successfully, ']);
    }
}
