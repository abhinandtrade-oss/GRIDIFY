<?php
// contact.php - Gmail SMTP with PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// If installed with Composer
require_once __DIR__ . '/vendor/autoload.php';

// If manual PHPMailer install, uncomment these instead:
// require_once __DIR__ . '/PHPMailer/src/Exception.php';
// require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
// require_once __DIR__ . '/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo '<div class="failed">Failed: No form submitted.</div>';
    exit;
}

// Basic sanitization
$sanitize_text = function($s) {
    return trim(preg_replace("/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", (string)$s));
};

$name        = $sanitize_text($_POST['name'] ?? '');
$lName       = $sanitize_text($_POST['lname'] ?? '');
$phone       = $sanitize_text($_POST['phone'] ?? '');
$senderEmail = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$messageText = isset($_POST['contact_message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/i", "", $_POST['contact_message']) : '';
$messageText = nl2br(htmlspecialchars($messageText, ENT_QUOTES, 'UTF-8'));

// quick validation
if (empty($name) || empty($senderEmail) || !filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
    echo '<div class="failed">Failed: Please provide a valid name and email.</div>';
    exit;
}

// Gmail credentials
$smtpUser = 'abhinandsofficial@gmail.com';
$smtpPass = 'llhz npta ygop hqdy'; // <- Replace ONLY this text

// Recipient
$recipient = 'sabhinand5@gmail.com';

// Email body (HTML)
$body = "
    <h3>Contact Form Submission</h3>
    <p><strong>First Name:</strong> {$name}</p>
    <p><strong>Last Name:</strong> {$lName}</p>
    <p><strong>Email:</strong> {$senderEmail}</p>
    <p><strong>Phone:</strong> {$phone}</p>
    <p><strong>Message:</strong><br>{$messageText}</p>
";

$mail = new PHPMailer(true);

try {
    // SMTP setup
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // From must be your Gmail address
    $mail->setFrom($smtpUser, 'Website Contact');
    $mail->addReplyTo($senderEmail, $name);

    // Recipient
    $mail->addAddress($recipient);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form: ' . $name;
    $mail->Body    = $body;

    $mail->send();
    echo '<div class="success">Email has been sent successfully.</div>';

} catch (Exception $e) {
    echo '<div class="failed">Error: Email did not send. ' . htmlspecialchars($mail->ErrorInfo) . '</div>';
}
?>
