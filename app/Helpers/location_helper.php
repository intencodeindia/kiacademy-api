<?php

use App\Services\LocationService;

/**
 * Fetch location data and other related information.
 *
 * @return array
 */
function fetch_location_data()
{
    $request = \Config\Services::request();
    $agent = $request->getUserAgent();
    $locationService = new LocationService();

    // Fetch location data using the service
    $locationData = $locationService->fetchLocation();

    // Initialize default details
    $userAgentString = get_user_agent_string($agent);
    $browserDetails = get_browser_details($agent);
    $device = parse_device($userAgentString);
    $platform = get_platform_info($agent);

    $ipAddress = $request->getIPAddress();
    $screenResolution = $request->getVar('screen_resolution') ?? 'Unknown Resolution';
    $cookiesEnabled = $request->getVar('cookies_enabled') ?? false;
    $referrer = $request->getServer('HTTP_REFERER') ?? 'Direct Access';

    // Prepare the data to return
    return [
        'userAgent' => $userAgentString,
        'browser' => $browserDetails['browser'],
        'version' => $browserDetails['version'],
        'device' => $device,
        'platform' => $platform,
        'referrer' => $referrer,
        'locationData' => $locationData,
        'ipAddress' => $ipAddress,
        'screenResolution' => $screenResolution,
        'cookiesEnabled' => $cookiesEnabled,
    ];
}

