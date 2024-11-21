<?php
namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\EmailController;
use Config\Validation;

class UserController extends BaseController
{
    use ResponseTrait; // Include ResponseTrait for API responses

    private $model;
    private $table = 'users';
    private $verification_instructor = 'verification_instructor';
    protected $emailController;
    protected $validation;


    public function __construct()
    {
        $this->model = new CommonModel();
        $this->emailController = new EmailController();
        $this->validation = \Config\Services::validation();

        // Load validation rules and error messages from the Validation config
        $this->validation->setRules((new Validation())->userRegistrationRules, (new Validation())->userRegistrationErrors);
    }

    public function index($id = null)
    {
        // echo "Welcome to the party";
        if ($id !== null) {
            $fetchRecord = $this->model->rowRecord($this->table, ['user_id' => $id]);
            $mergedObject = $fetchRecord;
           if($fetchRecord->role_id == 2){
            $fetchRecord1 = $this->model->rowRecord('verification_instructor', ['user_id' => $id]);
            $array1 = (array) $fetchRecord;
$array2 = (array) $fetchRecord1;

// Merge the arrays
$mergedArray = array_merge($array1, $array2);

// Convert the merged array back to an object
$mergedObject = (object) $mergedArray;
           }
           else if($fetchRecord->role_id == 3){
            $fetchRecord1 = $this->model->rowRecord('students', ['user_id' => $id]);
            $array1 = (array) $fetchRecord;
$array2 = (array) $fetchRecord1;

// Merge the arrays
$mergedArray = array_merge($array1, $array2);

// Convert the merged array back to an object
$mergedObject = (object) $mergedArray;
           }

            if ($mergedObject) {
                $result = [
                    'status' => 200,
                    'data' => $mergedObject
                ];
                return $this->respond($result); //ntju1n0e
            }

            return $this->failNotFound($id . ' ' . 'Record not found.');
        } else {
            $fetchRecord = $this->model->selectRecord($this->table);

            if (!empty($fetchRecord)) {
                $result = [
                    'status' => 200,
                    'data' => $fetchRecord,
                ];
                return $this->respond($result);
            }

            $result = [
                'status' => 204,
                'message' => 'No content available.'
            ];
            return $this->respond($result);
        }
    }
    public function create()
    {


        //return $this->request->getMethod();
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        // Validate input data
        if (!$this->validate($this->validation->getRules(), $this->validation->getErrors())) {
            return $this->respond([
                'status' => 400,
                'message' => $this->validator->getErrors()
            ]);
        }
        // Retrieve form data
        $userEmail = $this->request->getVar('email');

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
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'role_id' => $this->request->getVar('role_id'),
            'user_status' => 'pending', // Default status
            'verification_code' => $uniqueCode,
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
            $file->move(FCPATH . 'uploads/profile_pictures', $profile_picture);
        } else {
            if ($file) {
                return $this->respond(['status' => 400, 'message' => 'Profile picture upload error: ' . $file->getErrorString()]);
            }
        }
        $userData['profile_picture'] = $profile_picture;

        // Insert the user record into the database
        if (!$this->model->insertRecord('users', $userData)) {
            return $this->respond(['status' => 500, 'message' => 'Failed to create user']);
        }

        // Fetch the user ID based on email
        $fetchRecord = $this->model->rowRecord('users', ['email' => $this->request->getVar('email')]);
        if (!$fetchRecord) {
            throw new \Exception('User not found after insertion');
        }
        $user_id = $fetchRecord->user_id; // Adjust if `id` is not the correct field name

        // Additional data based on role_id
        if ($this->request->getVar('role_id') == 2) {
            $kycData = [
                'user_id' => $user_id,
                'id_document_type' => $this->request->getVar('id_document_type'),
                'id_document_number' => $this->request->getVar('id_document_number'),
                'document_image' => $this->request->getVar('document_image'),
                'proof_of_address' => $this->request->getVar('proof_of_address'),
                'bio' => $this->request->getVar('bio'),
                'status' => $this->request->getVar('status'),
                'verified_at' => $this->request->getVar('verified_at'),
                'rejected_reason' => $this->request->getVar('rejected_reason'),
                'created_at' => $updated_at,
                'updated_at' => $updated_at,
            ];
            $this->model->insertRecord('verification_instructor', $kycData);
        } elseif ($this->request->getVar('role_id') == 3) {
            $studentData = [
                'user_id' => $user_id,
                // Add other necessary fields for the student table
            ];


            // Call sendVerificationEmail from EmailController
            //$result = $this->emailController->sendVerificationEmail($userEmail, $kycLink);
            $this->model->insertRecord('students', $studentData);
        }
	$result = $this->emailController->sendVerificationEmail($userEmail, $kycLink);
        return $this->respond(['status' => 201, 'message' => 'Account created successfully, '.$result]);
    }




    public function updateProfile($userId)
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        // Fetch the existing user record
        $existingUser = $this->model->rowRecord('users', ['user_id' => $userId]);
        if (!$existingUser) {
            return $this->respond(['status' => 404, 'message' => 'User not found']);
        }

        // Retrieve form data
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
       
        $roleId = $this->request->getVar('role_id');
        $profile_picture = null;
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $profile_picture = $file->getRandomName();
            $file->move(FCPATH . 'uploads/profile_pictures', $profile_picture);
        } 
        // Initialize user data for update
        $userData = [];
        // if ($email) {
        //     $userData['email'] = $email;
        // }
        // if ($password) {
        //     $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
        // }

        // $userData['profile_picture'] = $profile_picture;
        // Update user record if there's any change

        $updated_at = date('Y-m-d H:i:s');
        if($profile_picture){
            
        
        $userData = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'profile_picture' => $profile_picture,
            'updated_at' => $updated_at
        ];
    }else{
        $userData = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'updated_at' => $updated_at
        ];
    }
        if (!empty($userData)) {
            $this->model->updateRecord('users', ['user_id' => $userId], $userData);
        }

        // Update role-specific data
        if ($roleId == 2) {
            // Handle instructor update (only bio is allowed to update)
            $bio = $this->request->getVar('bio');
            if ($bio) {
                $kycData = [
                    'bio' => $bio,
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->model->updateRecord('verification_instructor', ['user_id' => $userId], $kycData);
            }
        } elseif ($roleId == 3) {
            // Handle student update (all details can be updated)
            $studentData = [
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'bio' => $this->request->getVar('bio'),
                'student_mobile_number' => $this->request->getVar('student_mobile_number'),
                'student_parent_mobile' => $this->request->getVar('student_parent_mobile'),
                'student_parent_email' => $this->request->getVar('student_parent_email'),
                'address' => $this->request->getVar('address'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $studentData['profile_picture'] = $profile_picture;
            $this->model->updateRecord('students', $userId, $studentData);
        }

        return $this->respond(['status' => 200, 'message' => 'User updated successfully']);
    }

     public function updateStatus($user_id)
    {
        // Get the input data
        $status = $this->request->getPost('status');
        $data = [
            'user_status' => $status
        ];
        // Validate input
        if (is_null($status) || empty($user_id)) {
            $response = [
                'status' => false,
                'message' => 'Invalid input data.'
            ];
            echo json_encode($response);
            return;
        }

        // Update the user status
        $update = $this->model->updateRecord('users', ['user_id' => $user_id], $data);

        // Prepare response
        if ($update) {
            $response = [
                'status' => true,
                'message' => 'User status updated successfully.'
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Failed to update user status.'
            ];
        }

        echo json_encode($response);
    }
    public function updateKyc($userId = null)
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        if ($userId === null) {
            return $this->failNotFound('User ID is required.');
        }

        $existingRecord = $this->model->selectRecord($this->verification_instructor, ['user_id' => $userId]);
        if (empty($existingRecord)) {
            return $this->failNotFound('KYC record not found.');
        }

        $existingRecord = $existingRecord[0];

        $data = [
            'status' => $this->request->getPost('status'),
            'rejected_reason' => $this->request->getPost('rejected_reason'),
            'verified_at' => $this->request->getPost('status') === 'Approved' ? date('Y-m-d H:i:s') : $existingRecord->verified_at,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->model->updateRecord($this->verification_instructor, ['user_id' => $userId], $data)) {
            return $this->respond(['status' => 200, 'message' => 'KYC Record Updated Successfully', 'data' => $data]);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to update KYC record']);
    }


    public function EmailVerify($verificationCode = null)
    {
        if ($verificationCode === null) {
            return $this->respond([
                'status' => 400,
                'message' => 'Verification code is required.'
            ]);
        }

        // Call the verificationRowRecord method
        $record = $this->model->verificationRowRecord($verificationCode);

        if ($record) {
            // Code is valid and not expired
            $data = [
                'user_status' => 'active', // Or any other status indicating successful verification
                'expires_at' => null,
                'verification_code' => null,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            // Update the record in the database
            if ($this->model->updateRecord($this->table, ['verification_code' => $verificationCode], $data)) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'User verified successfully',
                    'data' => $data
                ]);
            } else {
                return $this->respond([
                    'status' => 500,
                    'message' => 'Failed to update user status'
                ]);
            }
        } else {
            return $this->respond([
                'status' => 400,
                'message' => 'Invalid or expired code'
            ]);
        }
    }

    public function changePassword()
    {
        // Ensure the request method is POST
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        // Retrieve form data
        $userId = $this->request->getPost('user_id');
        $oldPassword = $this->request->getPost('old_password');
        $newPassword = $this->request->getPost('new_password');

        // Validate form data
        if (empty($userId) || empty($oldPassword) || empty($newPassword)) {
            return $this->respond(['status' => 400, 'message' => 'User ID, old password, and new password are required.']);
        }

        // Fetch the user record
        $userRecord = $this->model->rowRecord($this->table, ['user_id' => $userId]);

        if (!$userRecord) {
            return $this->failNotFound('User not found.');
        }

        // Verify old password
        if (!password_verify($oldPassword, $userRecord->password)) {
            return $this->respond(['status' => 400, 'message' => 'Old password is incorrect.']);
        }

        // Hash the new password
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user record with the new password
        $updateData = [
            'password' => $hashedNewPassword,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->model->updateRecord($this->table, ['user_id' => $userId], $updateData)) {
            return $this->respond(['status' => 200, 'message' => 'Password updated successfully.']);
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to update password.']);
    }

    public function requestPasswordReset()
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        $email = $this->request->getPost('email');

        if (empty($email)) {
            return $this->respond(['status' => 400, 'message' => 'Email is required.']);
        }

        // Check if the user exists
        $user = $this->model->rowRecord($this->table, ['email' => $email]);
        if (!$user) {
            return $this->respond(['status' => 404, 'message' => 'User not found.']);
        }

        // Generate a reset token
        $resetToken = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Store the reset token and expiration time in the database
        $this->model->updateRecord($this->table, ['email' => $email], [
            'reset_token' => $resetToken,
            'reset_expires_at' => $expiresAt
        ]);

        // Prepare email content using the template
        $resetUrl = base_url("reset-password?token={$resetToken}");
        $emailContent = view('emails/password_reset', [
            'name' => 'Testing dear', // Adjust if you use a different property
            'reset_url' => $resetUrl
        ]);

        // Send reset email
        $emailSender = new \App\Libraries\EmailSender();
        $result = $emailSender->sendEmail($email, 'Password Reset Request KiAcademy', $emailContent);

        if ($result === true) {
            return $this->respond(['status' => 200, 'message' => 'Password reset email sent successfully.']);
        } else {
            return $this->respond(['status' => 500, 'message' => 'Failed to send password reset email.', 'error' => $result]);
        }
    }


    public function resetPassword($token = null)
    {
        if ($this->request->getMethod() !== 'POST') {
            return $this->respond(['status' => 405, 'message' => 'Only POST requests are allowed.']);
        }

        if ($token === null) {
            return $this->respond(['status' => 400, 'message' => 'Reset token is required.']);
        }

        $newPassword = $this->request->getPost('new_password');

        if (empty($newPassword)) {
            return $this->respond(['status' => 400, 'message' => 'New password is required.']);
        }

        // Validate the reset token
        $user = $this->model->rowRecord($this->table, ['reset_token' => $token]);

        if (!$user || strtotime($user->reset_expires_at) < time()) {
            return $this->respond(['status' => 400, 'message' => 'Invalid or expired reset token.']);
        }

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password and clear the reset token
        $updateData = [
            'password' => $hashedPassword,
            'reset_token' => null,
            'reset_expires_at' => null,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->model->updateRecord($this->table, ['email' => $user->email], $updateData)) {
            // Prepare confirmation email content
            $emailContent = view('emails/password_changed_confirmation', [
                'name' => $user->name // Adjust based on your user object
            ]);

            // Send confirmation email
            $emailSender = new \App\Libraries\EmailSender();
            $result = $emailSender->sendEmail($user->email, 'Your Password Has Been Changed', $emailContent);

            if ($result) {
                // Redirect or respond with a success message
                return $this->respond([
                    'status' => 200,
                    'message' => 'Password reset successfully. A confirmation email has been sent to your email address.'
                ]);
            } else {
                return $this->respond([
                    'status' => 500,
                    'message' => 'Password reset successful, but failed to send the confirmation email.'
                ]);
            }
        }

        return $this->respond(['status' => 500, 'message' => 'Failed to reset password.']);
    }



    public function getAllTutorsWithUsers($id = null)
    {
        if ($id !== null) {
            // Fetch a single tutor with user details
            $fetchRecord = $this->model->getTutorWithUser($id);

            if ($fetchRecord) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'Tutor retrieved successfully.',
                    'data' => $fetchRecord,
                ]);
            }

            return $this->failNotFound('Tutor with the given ID does not exist.');
        } else {
            // Fetch all tutors with user details
            $fetchRecord = $this->model->getAllTutorsWithUsers();

            if (!empty($fetchRecord)) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'List of tutors retrieved successfully.',
                    'data' => $fetchRecord,
                ]);
            }

            return $this->respond([
                'status' => 204,
                'message' => 'No tutors found in the database.'
            ]);
        }
    }
}

