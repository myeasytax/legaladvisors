<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

class EmailService
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);

        // SMTP configuration
        $this->mailer->isSMTP();
        $this->mailer->Host = 'smtp.example.com';       // Replace with your SMTP host
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = 'your-email@example.com';  // SMTP username
        $this->mailer->Password = 'your-email-password';     // SMTP password
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encryption
        $this->mailer->Port = 587;                         // SMTP port
        $this->mailer->setFrom('your-email@example.com', 'Legal Advisors'); // From address
    }

    /**
     * Send an email.
     *
     * @param string $to Recipient's email address
     * @param string $subject Email subject
     * @param string $body Email body
     * @param string|null $altBody Plain-text alternative body (optional)
     * @return bool
     */
    public function sendEmail($to, $subject, $body, $altBody = null)
    {
        try {
            $this->mailer->addAddress($to); // Add recipient
            $this->mailer->Subject = $subject; // Email subject
            $this->mailer->Body = $body; // HTML body
            $this->mailer->isHTML(true); // Set email format to HTML

            if ($altBody) {
                $this->mailer->AltBody = $altBody; // Optional plain-text version
            }

            // Send the email
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            error_log("Email sending failed: " . $this->mailer->ErrorInfo);
            return false;
        }
    }
}
