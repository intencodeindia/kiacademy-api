<?php

namespace App\Controllers;

use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\EmailController;

class InstituteController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $table = 'institutes'; // Define table
    protected $emailController;

    public function __construct()
    {
        $this->model = new CommonModel(); // Load CommonModel for database operations
        $this->emailController = new EmailController();
    }

    // Fetch all institutes or by ID
    public function index($id = null)
    {
        if ($id !== null) {
            $institute = $this->model->rowRecord($this->table, ['institute_id' => $id]);

            if ($institute) {
                return $this->respond(['status' => 200, 'data' => $institute]);
            }

            return $this->failNotFound('Institute not found.');
        } else {
            $institutes = $this->model->selectRecord($this->table);
            if (!empty($institutes)) {
                return $this->respond(['status' => 200, 'data' => $institutes]);
            }

            return $this->respond(['status' => 204, 'message' => 'No institutes available.']);
        }
    }

    public function getInstituteByUser($userId)
    {
        // Load the model
        // $model = new InstituteModel();

        // Fetch the data using the model function
        $instituteData = $this->model->getInstituteByUserId($userId);

        // Check if data exists and pass it to a view or return as JSON
        if (!empty($instituteData)) {
            // Optionally, pass data to a view (if you're using views)
            // return view('institute_view', ['instituteData' => $instituteData]);
            
            // Return the data as JSON
            return $this->response->setJSON($instituteData);
        } else {
            return $this->response->setStatusCode(404, 'Institute not found');
        }
    }
    // Create a new institute
    public function create()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }
        $data = [
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'contact_number' => $this->request->getVar('contact_number'),
            'email' => $this->request->getVar('email'),
            'registration_number' => $this->request->getVar('registration_number'),
            'tin_number' => $this->request->getVar('tin_number'),
            'subdomain_name' => $this->request->getVar('subdomain_name'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Handle file uploads
        $supporting_document = null;
        $file_document = $this->request->getFile('supporting_document');
        if ($file_document && $file_document->isValid() && !$file_document->hasMoved()) {
            $supporting_document = $file_document->getRandomName();
            $file_document->move(FCPATH . 'uploads/institute_documents', $supporting_document);
        } else {
            if ($file_document) {
                return $this->respond(['status' => 400, 'message' => 'Supporting document upload error: ' . $file_document->getErrorString()]);
            }
        }
        $data['supporting_document'] = $supporting_document;

        if (!$this->model->insertRecord($this->table, $data)) {
            return $this->respond(['status' => 500, 'message' => 'Failed to create institute.']);
        }


        $userEmail = $this->request->getVar('email');

        $institute = $this->model->rowRecord($this->table, ['email' => $userEmail]);

        if (!$institute) {
            return $this->respond(['status' => 500, 'message' => 'Failed to create institute.']);
            
        }
        else{
            $institute_id = $institute->institute_id;
        }
        $str = rand();

        // Generate a unique code
        $uniqueCode = hash("sha256", $str);

        // Assuming base_url() returns the base URL of your application
        $baseUrl = base_url('verify-email'); // e.g., https://api.kiacademy.in/verify-email
        $verificationCode = $uniqueCode; // This should be your unique verification code

        // Construct the URL by appending the verification code to the path
        $kycLink = $baseUrl . '/' . $verificationCode;

        // Calculate the expiration time (20 hours from now)
        $expirationDateTime = new \DateTime();
        $expirationDateTime->add(new \DateInterval('PT20H')); // PT20H = 20 hours
        $expiresAt = $expirationDateTime->format('Y-m-d H:i:s');
        // Retrieve the password from the request
        $password = $this->request->getVar('password');

        // Hash the password using password_hash
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Retrieve form data
        $userData = [
            'email' => $userEmail,
            'password' => $hashedPassword,
            'first_name' => $this->request->getVar('name'),
            'last_name' => 'Admin',
            'role_id' => 4,
            'user_status' => 'pending', // Default status
            'verification_code' => $uniqueCode,
            'institute_id' => $institute_id,
            'expires_at' => $expiresAt, // Set the expiration time
            'created_at' => $updated_at = date('Y-m-d H:i:s'),
            'updated_at' => $updated_at,
        ];

        // Insert or update the user record with $userData as needed


        // Handle file uploads
        $profile_picture = null;
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $profile_picture = $file->getRandomName();
            $file->move(FCPATH . 'uploads/institute_logo', $profile_picture);
        } else {
            if ($file) {
                return $this->respond(['status' => 400, 'message' => 'Profile picture upload error: ' . $file->getErrorString()]);
            }
        }
        $userData['profile_picture'] = $profile_picture;

        if (!$this->model->insertRecord('users', $userData)) {
            return $this->respond(['status' => 500, 'message' => 'Failed to create user.']);
        }

        $result = $this->emailController->sendVerificationEmail($userEmail, $kycLink);
        return $this->respond(['status' => 201, 'message' => 'Institute created successfully.']);
    }

    // Update an institute
    // public function update($id)
    // {
    //     if ($this->request->getMethod() !== 'PUT') {
    //         return $this->respond(['status' => 405, 'message' => 'Only PUT requests are allowed.']);
    //     }

    //     $institute = $this->model->rowRecord($this->table, ['institute_id' => $id]);
    //     if (!$institute) {
    //         return $this->failNotFound('Institute not found.');
    //     }

    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'address' => $this->request->getVar('address'),
    //         'contact_number' => $this->request->getVar('contact_number'),
    //         'email' => $this->request->getVar('email'),
    //         'registration_number' => $this->request->getVar('registration_number'),
    //         'tin_number' => $this->request->getVar('tin_number'),
    //         'supporting_document' => $this->request->getVar('supporting_document'),
    //         'profile_image' => $this->request->getVar('profile_image'),
    //         'updated_at' => date('Y-m-d H:i:s'),
    //     ];

    //     if (!$this->model->updateRecord($this->table, $id, $data)) {
    //         return $this->respond(['status' => 500, 'message' => 'Failed to update institute.']);
    //     }

    //     return $this->respond(['status' => 200, 'message' => 'Institute updated successfully.']);
    // }


    public function update($id = null)
{
    // Check if it's a POST request (or PUT request depending on your API design)
    if ($this->request->getMethod() !== 'POST') {
        return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
    }

    // Retrieve institute_id or provide an error if not present
    if (!$id) {
        return $this->respond(['status' => 400, 'message' => 'Institute ID is required.']);
    }

    // Fetch existing record to check if it exists
    $institute = $this->model->rowRecord($this->table, ['institute_id' => $id]);

    if (!$institute) {
        return $this->respond(['status' => 404, 'message' => 'Institute not found.']);
    }

    // Prepare the data to update
    $data = [
        'name' => $this->request->getVar('name') ?: $institute->name,
        'address' => $this->request->getVar('address') ?: $institute->address,
        'contact_number' => $this->request->getVar('contact_number') ?: $institute->contact_number,
        'email' => $this->request->getVar('email') ?: $institute->email,
        'registration_number' => $this->request->getVar('registration_number') ?: $institute->registration_number,
        'tin_number' => $this->request->getVar('tin_number') ?: $institute->tin_number,
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    // Handle file uploads for supporting document
    $supporting_document = null;
    $file_document = $this->request->getFile('supporting_document');
    if ($file_document && $file_document->isValid() && !$file_document->hasMoved()) {
        $supporting_document = $file_document->getRandomName();
        $file_document->move(FCPATH . 'uploads/institute_documents', $supporting_document);

        // Delete the old file (if any) before replacing it
        if ($institute->supporting_document && file_exists(FCPATH . 'uploads/institute_documents/' . $institute->supporting_document)) {
            unlink(FCPATH . 'uploads/institute_documents/' . $institute->supporting_document);
        }
    } else {
        if ($file_document) {
            return $this->respond(['status' => 400, 'message' => 'Supporting document upload error: ' . $file_document->getErrorString()]);
        }
    }
    $data['supporting_document'] = $supporting_document ?: $institute->supporting_document; // Keep the old file if no new file is uploaded

    // Update the record in the database
    if (!$this->model->updateRecord($this->table, $id, $data)) {
        return $this->respond(['status' => 500, 'message' => 'Failed to update institute.']);
    }

    // Update user data if necessary
    $userEmail = $this->request->getVar('email') ?: $institute->email;
    $user = $this->model->rowRecord('users', ['email' => $userEmail]);

    if ($user) {
        // Update user data if needed (e.g., password, name, etc.)
        $userData = [
            'email' => $userEmail,
            'first_name' => $this->request->getVar('first_name') ?: $user->first_name,
            'last_name' => $this->request->getVar('last_name') ?: $user->last_name,
            'role_id' => $user->role_id, // Assuming role_id is not changing
            'user_status' => $user->user_status, // Assuming user status doesn't change
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Handle file uploads for profile image
        $profile_picture = null;
        $file = $this->request->getFile('profile_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $profile_picture = $file->getRandomName();
            $file->move(FCPATH . 'uploads/institute_logo', $profile_picture);

            // Delete the old file (if any) before replacing it
            if ($user->profile_picture && file_exists(FCPATH . 'uploads/institute_logo/' . $user->profile_picture)) {
                unlink(FCPATH . 'uploads/institute_logo/' . $user->profile_picture);
            }
        } else {
            if ($file) {
                return $this->respond(['status' => 400, 'message' => 'Profile picture upload error: ' . $file->getErrorString()]);
            }
        }
        $userData['profile_picture'] = $profile_picture ?: $user->profile_picture; // Keep the old file if no new file is uploaded

        // Update the user record in the database
        if (!$this->model->updateRecord('users', $user->user_id, $userData)) {
            return $this->respond(['status' => 500, 'message' => 'Failed to update user data.']);
        }
    }

    return $this->respond(['status' => 200, 'message' => 'Institute updated successfully.']);
}



    // Delete an institute
    public function delete($id)
    {
        if (!$this->model->deleteRecord($this->table, ['institute_id' => $id])) {
            return $this->respond(['status' => 500, 'message' => 'Failed to delete institute.']);
        }

        return $this->respond(['status' => 200, 'message' => 'Institute deleted successfully.']);
    }
}
