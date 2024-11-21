<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'naman.intelcode@gmail.com'; // Default sender email
    public string $fromName   = 'Kiacademy'; // Default sender name
    public string $recipients = ''; // Default recipients (optional)

    public string $userAgent = 'KiAcademy'; // User agent
    public string $protocol = 'smtp'; // Mail sending protocol
    public string $mailPath = '/usr/sbin/sendmail'; // Path to Sendmail

    public string $SMTPHost = 'smtp.gmail.com'; // Mailtrap SMTP server
    public string $SMTPUser = 'naman.intelcode@gmail.com'; // Mailtrap SMTP username
    public string $SMTPPass = 'peav zved njcd ropg'; // Mailtrap SMTP password
    public int $SMTPPort = 587; // Mailtrap SMTP port
    public int $SMTPTimeout = 60; // SMTP connection timeout

    public bool $SMTPKeepAlive = false; // Persistent SMTP connections
    public string $SMTPCrypto = 'tls'; // SMTP encryption
    public bool $wordWrap = true; // Enable word-wrap
    public int $wrapChars = 76; // Character count to wrap at
    public string $mailType = 'html'; // Type of mail ('text' or 'html')
    public string $charset = 'UTF-8'; // Character set
    public bool $validate = false; // Validate email address
    public int $priority = 3; // Email priority
    public string $CRLF = "\r\n"; // Newline character
    public string $newline = "\r\n"; // Newline character
    public bool $BCCBatchMode = false; // Enable BCC Batch Mode
    public int $BCCBatchSize = 200; // Number of emails in BCC batch
    public bool $DSN = false; // Enable notify message from server
}
// class Email extends BaseConfig
// {
//     public string $fromEmail  = 'wihejan108@amxyy.com'; // Default sender email
//     public string $fromName   = 'wihejan'; // Default sender name
//     public string $recipients = ''; // Default recipients (optional)

//     public string $userAgent = 'CodeIgniter'; // User agent
//     public string $protocol = 'smtp'; // Mail sending protocol
//     public string $mailPath = '/usr/sbin/sendmail'; // Path to Sendmail

//     public string $SMTPHost = 'smtp.mailtrap.io'; // Mailtrap SMTP server
//     public string $SMTPUser = '954c59824bd78a'; // Mailtrap SMTP username
//     public string $SMTPPass = '001c962b124fff'; // Mailtrap SMTP password
//     public int $SMTPPort = 587; // Mailtrap SMTP port
//     public int $SMTPTimeout = 60; // SMTP connection timeout

//     public bool $SMTPKeepAlive = false; // Persistent SMTP connections
//     public string $SMTPCrypto = 'tls'; // SMTP encryption
//     public bool $wordWrap = true; // Enable word-wrap
//     public int $wrapChars = 76; // Character count to wrap at
//     public string $mailType = 'html'; // Type of mail ('text' or 'html')
//     public string $charset = 'UTF-8'; // Character set
//     public bool $validate = false; // Validate email address
//     public int $priority = 3; // Email priority
//     public string $CRLF = "\r\n"; // Newline character
//     public string $newline = "\r\n"; // Newline character
//     public bool $BCCBatchMode = false; // Enable BCC Batch Mode
//     public int $BCCBatchSize = 200; // Number of emails in BCC batch
//     public bool $DSN = false; // Enable notify message from server
// }

