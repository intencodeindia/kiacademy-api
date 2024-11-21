<?php

namespace App\Controllers;

use App\Libraries\EmailSender;

class EmailController extends BaseController
{
    protected $emailSender;

    public function __construct()
    {
        $this->emailSender = new EmailSender();
    }

    public function sendKYCVerificationEmail()
    {
        $userEmail = $this->request->getPost('userEmail');
        $verificationLink = $this->request->getPost('verificationLink');

        $subject = 'Please Verify Your Email Address';
        $message = "Click on the following link to verify your email: <a href=\"$verificationLink\">Verify Email</a>";

        $result = $this->emailSender->sendEmail($userEmail, $subject, $message);

        if ($result === true) {
            echo 'Verification email sent successfully.';
        } else {
            echo 'Failed to send verification email: ' . $result;
        }
    }

    public function sendVerificationEmail($userEmail,$kycLink)
    {
       
        $subject = 'KYC Verification Required';
        
        // Using inline Tailwind CSS classes for email styling
        $message = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <style>
                body { font-family: 'Arial', sans-serif; }
                .bg-blue-500 { background-color: #3b82f6; }
                .text-white { color: #ffffff; }
                .text-center { text-align: center; }
                .px-4 { padding-left: 1rem; padding-right: 1rem; }
                .py-6 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
                .rounded-lg { border-radius: 0.5rem; }
                .mt-6 { margin-top: 1.5rem; }
                .inline-block { display: inline-block; }
                .text-blue-500 { color: #3b82f6; }
                .font-semibold { font-weight: 600; }
                .text-xl { font-size: 1.25rem; }
            </style>
        </head>
        <body>
            <div class='bg-blue-500 text-white text-center px-4 py-6'>
                <h1 class='text-xl font-semibold'>KYC Verification Required</h1>
                <p class='mt-6'>Hello,</p>
                <p class='mt-2'>We need you to verify your identity to complete your registration.</p>
                <p class='mt-4'>
                    <a href=\"$kycLink\" class='inline-block px-4 py-2 rounded-lg bg-white text-blue-500 font-semibold'>
                        Complete KYC
                    </a>
                </p>
                <p class='mt-4'>Thank you for your attention!</p>
            </div>
        </body>
        </html>";
    
        $result = $this->emailSender->sendEmail($userEmail, $subject, $message, 'text/html');
    
        if ($result === true) {
            return 'KYC verification email sent successfully.';
        } else {
            return 'Failed to send KYC verification email: ' . $result;
        }
    }
    

    public function sendPromotionalEmail()
    {
        $userEmail = $this->request->getPost('userEmail');
        $promotionDetails = $this->request->getPost('promotionDetails');

        $subject = 'Check Out Our Latest Promotion!';
        $message = "Here are the details of our latest promotion: $promotionDetails";

        $result = $this->emailSender->sendEmail($userEmail, $subject, $message);

        if ($result === true) {
            echo 'Promotional email sent successfully.';
        } else {
            echo 'Failed to send promotional email: ' . $result;
        }
    }

    public function sendCourseUpdateEmail()
    {
        $userEmail = $this->request->getPost('userEmail');
        $courseUpdateDetails = $this->request->getPost('courseUpdateDetails');

        $subject = 'Course Update Notification';
        $message = "There is a new update for your course: $courseUpdateDetails";

        $result = $this->emailSender->sendEmail($userEmail, $subject, $message);

        if ($result === true) {
            echo 'Course update email sent successfully.';
        } else {
            echo 'Failed to send course update email: ' . $result;
        }
    }
}

