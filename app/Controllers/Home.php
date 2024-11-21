<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $locationController;


    public function __construct()
    {
        $this->locationController = new LocationController();
    }

    public function index(): string
    {
        $locationData = $this->locationController->Location();

        // Return the view with location data
        return view('welcome_message', ['locationData' => $locationData]);
        // return view('welcome_message');
    }
    public function documentation(): string
    {
        $locationData = $this->locationController->Location();

        // Return the view with location data
        return view('documentation', ['locationData' => $locationData]);
        // return view('documentation');
    }
    public function test(): string
    {
        // Fetch location data from LocationController
        $locationData = $this->locationController->Location();

        // Return the view with location data
        return view('test', ['locationData' => $locationData]);
    }
    public function termsAndConditions()
    {
        return view('terms_and_conditions');
    }

    public function privacyPolicy()
    {
        return view('privacy_policy');
    }
    public function testa()
    {
        return view('testa');
    }
    public function texa()
    {
        return view('text');
    }
    public function check()
    {
        return view('checkout');
    }
}

