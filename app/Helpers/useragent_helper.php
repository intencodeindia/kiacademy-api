<?php

/**
 * Parse the user agent string to get device name.
 * 
 * @param string $userAgent
 * @return string
 */
function parse_device($userAgent)
{
    if (stripos($userAgent, 'Mobile') !== false) {
        return 'Mobile Device';
    } elseif (stripos($userAgent, 'Tablet') !== false) {
        return 'Tablet Device';
    } elseif (stripos($userAgent, 'Windows') !== false) {
        return 'Desktop - Windows';
    } elseif (stripos($userAgent, 'Macintosh') !== false) {
        return 'Desktop - Mac';
    } else {
        return 'Unknown Device';
    }
}

/**
 * Get browser details from the user agent.
 * 
 * @param \CodeIgniter\HTTP\UserAgent $agent
 * @return array
 */
function get_browser_details($agent)
{
    $browser = 'Unknown Browser';
    $version = 'Unknown Version';
    if ($agent->isBrowser()) {
        $browser = $agent->getBrowser();
        $version = $agent->getVersion();
    }

    return [
        'browser' => $browser,
        'version' => $version
    ];
}

/**
 * Get platform information from the user agent.
 * 
 * @param \CodeIgniter\HTTP\UserAgent $agent
 * @return string
 */
function get_platform_info($agent)
{
    return $agent->getPlatform();
}

/**
 * Get user agent string.
 * 
 * @param \CodeIgniter\HTTP\UserAgent $agent
 * @return string
 */
function get_user_agent_string($agent)
{
    return $agent ? $agent->getAgentString() : 'Unidentified User Agent';
}

