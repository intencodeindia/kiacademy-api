<?php

namespace App\Controllers;

use Facebook\Facebook;

class FacebookLoginController extends BaseController
{
    private $facebook;

    public function __construct()
    {
        $this->facebook = new Facebook([
            'app_id' => '3820769954827019',
            'app_secret' => '070c379dd0b09dfdda69bcabc7536287',
            'default_graph_version' => 'v12.0',
        ]);
    }

    public function login()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(base_url('callback/facebook'), $permissions);

        return redirect()->to($loginUrl);
    }

    public function callback()
    {
        $helper = $this->facebook->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            return redirect()->to('/login')->with('error', 'Facebook login failed: ' . $e->getMessage());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            return redirect()->to('/login')->with('error', 'Facebook SDK error: ' . $e->getMessage());
        }

        if (!isset($accessToken)) {
            return redirect()->to('/login')->with('error', 'Facebook login failed.');
        }

        // Logged in
        $oAuth2Client = $this->facebook->getOAuth2Client();
        $tokenMetadata = $oAuth2Client->debugToken($accessToken);
        $tokenMetadata->validateAppId('3820769954827019');
        $tokenMetadata->validateExpiration();

        if (!$accessToken->isLongLived()) {
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        }

        session()->set('fb_access_token', (string) $accessToken);

        // Getting User Information
        try {
            $response = $this->facebook->get('/me?fields=id,name,email', $accessToken);
            $user = $response->getGraphUser();

            // Here, you would save the user data in your database.
            // Example:
            // $this->userModel->insertUser($user);

            return redirect()->to('/dashboard'); // Change to your desired location
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            return redirect()->to('/login')->with('error', 'Facebook Graph error: ' . $e->getMessage());
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            return redirect()->to('/login')->with('error', 'Facebook SDK error: ' . $e->getMessage());
        }
    }
}

