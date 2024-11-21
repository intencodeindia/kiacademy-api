<?php

namespace App\Controllers;

use Google_Client;
use Google_Service_Oauth2;

class GoogleLoginController extends BaseController
{
    private $googleClient;

    public function __construct()
    {
        $this->googleClient = new Google_Client();
        $this->googleClient->setClientId('337606490908-efdjpi845khkti12ou8hh835n4dlod1k.apps.googleusercontent.com');
        $this->googleClient->setClientSecret('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');
        $this->googleClient->setRedirectUri(base_url('api/auth/callback/google'));
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function login()
    {
        $authUrl = $this->googleClient->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function callback()
    {
        if ($this->request->getVar('code')) {
            $this->googleClient->authenticate($this->request->getVar('code'));
            $accessToken = $this->googleClient->getAccessToken();
            $this->googleClient->setAccessToken($accessToken);

            $googleService = new Google_Service_Oauth2($this->googleClient);
            $userData = $googleService->userinfo->get();

            // Here, you would save the user data in your database.
            // For example:
            // $this->userModel->insertUser($userData);

            // After saving, you can set session data and redirect the user.
            // Example:
            // session()->set('user', $userData);

            return redirect()->to('/test'); // Change to your desired location
        }

        return redirect()->to('/login')->with('error', 'Login failed');
    }
}

