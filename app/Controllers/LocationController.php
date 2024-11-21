<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LocationController extends Controller
{
    public function fetchLocation()
    {
        // Load the helper
        helper('location');

        // Use the reusable function
        $data = fetch_location_data();

        // Return the data as JSON
        return $this->response->setJSON($data);
    }

    public function Location()
    {
        // Load the helper
        helper('location');

        // Use the reusable function to get location data
        $data = fetch_location_data();

        // Return the data as an array
        return $data;
    }
}

