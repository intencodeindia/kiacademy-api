<?php
namespace App\Services;

class LocationService
{
    public function fetchLocation()
    {
        // Get the client's public IP address
        $ipAddress = $this->getClientIpAddress();

        if ($ipAddress === 'Not available') {
            return ['status' => 'error', 'message' => 'Unable to determine IP address'];
        }

        // Replace with your IP geolocation API endpoint
        $apiUrl = "http://ip-api.com/json/{$ipAddress}?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,isp,org,as,asname,reverse,mobile,proxy,hosting";
        
        // Fetch location data from the API
        $response = file_get_contents($apiUrl);
        $locationData = json_decode($response, true);

        // Check for errors in the response
        if (isset($locationData['status']) && $locationData['status'] === 'fail') {
            return ['status' => 'error', 'message' => $locationData['message']];
        }

        // Return the location data
        return [
            'status' => 'success',
            'ip' => $ipAddress,
            'city' => $locationData['city'] ?? 'Not available',
            'region' => $locationData['regionName'] ?? 'Not available',
            'country' => $locationData['country'] ?? 'Not available',
            'latitude' => $locationData['lat'] ?? 'Not available',
            'longitude' => $locationData['lon'] ?? 'Not available',
            'allData' => $locationData
        ];
    }

    private function getClientIpAddress()
    {
        // Check for IP address in headers
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP']; // Check if the IP is passed from a shared internet service
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // Check if the IP is passed from a proxy or load balancer
        } else {
            $ip = $_SERVER['REMOTE_ADDR']; // Default to remote address
        }
        
        // Validate IP address
        return filter_var($ip, FILTER_VALIDATE_IP) ? $ip : 'Not available';
    }
}

