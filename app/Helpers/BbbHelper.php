<?php

namespace App\Helpers;

class BbbHelper
{
    private $serverUrl;
    private $secretKey;

    public function __construct()
    {
        $this->serverUrl = getenv('BBB_SERVER_URL');
        $this->secretKey = getenv('BBB_SECRET_KEY');
    }

    public function createMeeting($meetingID, $meetingName, $record = false)
    {
        $params = [
            'name' => $meetingName,
            'meetingID' => $meetingID,
            'attendeePW' => 'ap',
            'moderatorPW' => 'mp',
            'endCallbackUrl' => 'https://kiacademy.in/endMeeting',
            'meetingExpireIfNoUserJoinedInMinutes' => 1440,
            'record' => $record ? 'true' : 'false'
        ];

        $url = $this->serverUrl . "api/create?" . http_build_query($params);
        $checksum = sha1("create" . http_build_query($params) . $this->secretKey);
        $finalUrl = $url . "&checksum=" . $checksum;

        $response = file_get_contents($finalUrl);
        return simplexml_load_string($response);
    }

    public function joinMeeting($meetingID, $userName, $password)
    {
        $params = [
            'meetingID' => $meetingID,
            'fullName' => $userName,
            'password' => $password
        ];

        $url = $this->serverUrl . "api/join?" . http_build_query($params);
        $checksum = sha1("join" . http_build_query($params) . $this->secretKey);
        $finalUrl = $url . "&checksum=" . $checksum;
        return $finalUrl;
    }

    public function generateJoinUrl($meetingID, $userName, $role)
{
    // Define role-based passwords
    $password = ($role === 'instructor') ? 'mp' : 'ap';

    // Prepare parameters for the join URL
    $params = [
        'meetingID' => $meetingID,
        'fullName' => $userName,
        'password' => $password
    ];

    // Construct the join URL with checksum
    $url = $this->serverUrl . "api/join?" . http_build_query($params);
    $checksum = sha1("join" . http_build_query($params) . $this->secretKey);
    $finalUrl = $url . "&checksum=" . $checksum;

    return $finalUrl;
}


    public function getRecordings($meetingID)
    {
        $params = [
            'meetingID' => $meetingID,
        ];

        $url = $this->serverUrl . "api/getRecordings?" . http_build_query($params);
        $checksum = sha1("getRecordings" . http_build_query($params) . $this->secretKey);
        $finalUrl = $url . "&checksum=" . $checksum;

        $response = file_get_contents($finalUrl);
        return simplexml_load_string($response);
    }
}
