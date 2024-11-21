<?php

namespace App\Controllers;
use App\Models\CommonModel;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use DateTime;
use Detection\MobileDetect; // Use the Detection namespace

class Auth extends Controller
{
    use ResponseTrait;

    protected $model;
    protected $request;

    public function __construct()
    {
        $this->model = new CommonModel();
        $this->request = service('request');
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
       
    if (empty($email) || empty($password)) {
        return $this->respond([
            'status' => 400,
            'message' => 'Email and password are required'
        ]);
    }
    
        $user = $this->model->getUserByEmail($email);

        if (!$user) {
            return $this->respond([
                'status' => 404,
                'message' => 'email not found'
            ]);
        }

        // Verify password
        if (!password_verify($password, $user->password)) {
            return $this->respond([
                'status' => 401,
                'message' => 'Invalid password'
            ]);
        }

        // Check user status
        if ($user->user_status === 'pending') {
            if ($user->verification_code && $user->expires_at) {
                $currentDateTime = new DateTime();
                $expiresAt = new DateTime($user->expires_at);

                if ($currentDateTime > $expiresAt) {
                    return $this->respond([
                        'status' => 400,
                        'message' => 'Verification link has expired. Please request a new verification link via email.',
                        'data' => ['expired' => true]
                    ]);
                }

                return $this->respond([
                    'status' => 400,
                    'message' => 'Your account is pending verification. Please check your email for the verification link.',
                    'data' => ['expired' => false]
                ]);
            } else {
                return $this->respond([
                    'status' => 400,
                    'message' => 'Your account is pending verification. Please check your email for the verification link.',
                    'data' => ['expired' => false]
                ]);
            }
        }

        if ($user->user_status !== 'active') {
            return $this->respond([
                'status' => 400,
                'message' => 'Your account is inactive. Please contact support for assistance.'
            ]);
        }

        // Store login details
        $this->storeLoginDetails($user->user_id);

        // Set session data
        $session = session();
        $session->set([
            'user_id' => $user->user_id,
            'email' => $user->email,
            'isLoggedIn' => true
        ]);

        // Return essential information
        return $this->respond([
            'status' => 200,
            'message' => 'Login successful',
            'data' => [
                'user_id' => $user->user_id,
                'email' => $user->email
            ]
        ]);
    }

    private function storeLoginDetails($userId)
    {
        $loginData = [
            'user_id' => $userId,
            'login_time' => (new DateTime())->format('Y-m-d H:i:s'),
            'ip_address' => $this->request->getIPAddress(),
            'device_info' => $this->getDeviceInfo(),
            'browser_info' => $this->getBrowserInfo(),
            'location_info' => $this->getLocationInfo()
        ];

        // Assuming 'user_logins' is the table where login details are stored
        $this->model->insertRecord('user_logins', $loginData);
    }

    private function getDeviceInfo()
    {
        $detect = new MobileDetect(); // Create an instance of MobileDetect
        if ($detect->isMobile()) {
            return 'Mobile Device';
        } elseif ($detect->isTablet()) {
            return 'Tablet Device';
        } else {
            return 'Desktop';
        }
    }

    private function getBrowserInfo()
    {
        // Fetch the user agent from the request
        $userAgent = $this->request->getUserAgent();


        // Check if we have a valid user agent object
        if ($userAgent) {
            // Get the browser name and version
            $browser = $userAgent->getBrowser();
            $version = $userAgent->getVersion();

            return $browser . ' ' . $version;
        }

        return 'Unknown Browser';
    }
    private function getIPAddress()
    {
        $ipAddress = '';

        // Check the HTTP headers for the real IP address
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // The 'X-Forwarded-For' header can have multiple IP addresses
            $ipArray = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            // Take the first IP address from the list
            $ipAddress = trim($ipArray[0]);
        } elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
            $ipAddress = $_SERVER['HTTP_X_REAL_IP'];
        } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            // Fallback to REMOTE_ADDR if no other headers are present
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }

        // Validate and sanitize the IP address
        return filter_var($ipAddress, FILTER_VALIDATE_IP) ? $ipAddress : 'Unknown';
    }

    private function getLocationInfo()
    {
        $ipAddress = $this->getIPAddress();
        if ($ipAddress === 'Unknown') {
            return 'Unknown Location';
        }

        $location = $this->getLocationByIP($ipAddress);
        return $location ? $location['city'] : 'Unknown Location';
    }

    private function getLocationByIP($ip)
    {
        // URL for ipinfo.io (Note: This is a free tier with limited usage)
        $url = "http://ipinfo.io/{$ip}/json";

        $response = @file_get_contents($url);

        if ($response === false) {
            // Handle network or other errors
            return null;
        }

        $locationData = json_decode($response, true);

        // Check if the 'city' key exists in the response
        if (isset($locationData['city'])) {
            return ['city' => $locationData['city']];
        } else {
            // Return a default value if 'city' is not available
            return ['city' => 'Unknown Location'];
        }
    }



    public function logout()
    {
        $session = session();
        $session->destroy();
        return $this->respond([
            'status' => 200,
            'message' => 'Logged out successfully'
        ]);
    }
}

