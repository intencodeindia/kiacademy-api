<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Cors implements FilterInterface
{
    protected $allowedOrigins = [
        'https://kiacademy.in',
        'http://localhost:3000',
        'https://kenz-innovations-web-app.vercel.app',
        'https://ki-academy-eight.vercel.app',
    ];

    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the origin of the request
        $origin = $request->getHeader('Origin') ? $request->getHeader('Origin')->getValue() : '';

        // If the origin is in the allowed list or matches a wildcard subdomain
        if ($origin) {
            // Allow specific origins or handle wildcard subdomains (kiacademy.in and *.kiacademy.in)
            if ($this->isAllowedOrigin($origin)) {
                // Set CORS headers
                header('Access-Control-Allow-Origin: ' . $origin);
                header('Access-Control-Allow-Credentials: true');
            }

            header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
            header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        }

        // Handle preflight requests
        if ($request->getMethod() === 'OPTIONS') {
            // If the origin is allowed, send the necessary headers
            if ($origin && $this->isAllowedOrigin($origin)) {
                header('Access-Control-Allow-Origin: ' . $origin);
                header('Access-Control-Allow-Credentials: true');
            }
            header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
            header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
            exit(0); // End execution for OPTIONS requests
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No implementation needed
    }

    // Helper function to check if the origin is allowed
    private function isAllowedOrigin($origin)
    {
        // Check if the origin matches the exact allowed domains or wildcard subdomains
        foreach ($this->allowedOrigins as $allowedOrigin) {
            if ($origin === $allowedOrigin) {
                return true;
            }

            // Check if the origin matches a wildcard subdomain (e.g., *.kiacademy.in)
            if (preg_match('/^https?:\/\/([a-z0-9-]+\.kiacademy\.in)$/', $origin)) {
                return true;
            }
        }

        return false;
    }
}
