<?php

namespace App\Libraries;

use CodeIgniter\Email\Email;
use Config\Email as EmailConfig;

class EmailSender
{
    protected $email;

    public function __construct()
    {
        $this->email = \Config\Services::email();
        $this->setupEmailConfig();
    }

    /**
     * Set up the email configuration from the config file.
     */
    protected function setupEmailConfig()
    {
        $config = new EmailConfig();

        $emailConfig = [
            'fromEmail'    => $config->fromEmail,
            'fromName'     => $config->fromName,
            'protocol'     => $config->protocol,
            'SMTPHost'     => $config->SMTPHost,
            'SMTPUser'     => $config->SMTPUser,
            'SMTPPass'     => $config->SMTPPass,
            'SMTPPort'     => $config->SMTPPort,
            'SMTPTimeout'  => $config->SMTPTimeout,
            'SMTPCrypto'   => $config->SMTPCrypto,
            'wordWrap'     => $config->wordWrap,
            'wrapChars'    => $config->wrapChars,
            'mailType'     => $config->mailType,
            'charset'      => $config->charset,
            'validate'     => $config->validate,
            'priority'     => $config->priority,
            'CRLF'         => $config->CRLF,
            'newline'      => $config->newline,
            'BCCBatchMode' => $config->BCCBatchMode,
            'BCCBatchSize' => $config->BCCBatchSize,
            'DSN'          => $config->DSN,
        ];

        $this->email->initialize($emailConfig);
    }

    /**
     * Send an email with the specified parameters.
     *
     * @param string $to Recipient email address
     * @param string $subject Subject of the email
     * @param string $message Body of the email
     * @param string|null $fromEmail Custom from email address (optional)
     * @param string|null $fromName Custom from name (optional)
     * @param bool $isHtml Whether the email is in HTML format (true) or plain text (false)
     * @return bool|string True if email sent successfully, error message otherwise
     */
    public function sendEmail($to, $subject, $message, $fromEmail = null, $fromName = null, $isHtml = true)
    {
        $this->email->setTo($to);
        $this->email->setSubject($subject);

        // Set content type to HTML or plain text based on $isHtml parameter
        if ($isHtml) {
            $this->email->setMessage($message);
            $this->email->setMailType('html');
        } else {
            $this->email->setMessage(strip_tags($message));
            $this->email->setMailType('text');
        }

        // Optionally set custom From address
        if ($fromEmail) {
            $this->email->setFrom($fromEmail, $fromName ?? $this->email->fromName);
        }

        if ($this->email->send()) {
            return true;
        } else {
            // Improved error handling with a detailed debug message
            $error = $this->email->printDebugger(['headers', 'subject', 'message']);
            log_message('error', "Email sending failed: " . $error);
            return $error;
        }
    }
}

