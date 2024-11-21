<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class AuthFilters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the token from the header
        $authorizationHeader = $request->getHeaderLine('Authorization');
        $token = $this->extractToken($authorizationHeader);

        if (!$this->isValidToken($token)) {
            return Services::response()->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED, 'Unauthorized');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the request if needed
    }

    private function extractToken($authorizationHeader)
    {
        // Extract the token from the Bearer token format
        if (preg_match('/Bearer\s(\S+)/', $authorizationHeader, $matches)) {
            return $matches[1];
        }
        return null;
    }

    private function isValidToken($token)
    {
        $validToken = getenv('SECURE_TOKEN'); // Ensure this is set in your environment

        if ($token !== $validToken) {
            log_message('error', 'Invalid token: ' . $token);
            return false;
        }

        return true;
    }
}

