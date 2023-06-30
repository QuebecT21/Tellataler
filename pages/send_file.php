<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user inputs
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $mobile = filter_var($_POST["mobile"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $options = filter_var($_POST["options"], FILTER_SANITIZE_STRING);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Set up email content
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Contact Form Submission";
    $message = "Name: " . $name . "\n";
    $message .= "Mobile: " . $mobile . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Options: " . $options . "\n";

    // Send email
    if (mail($to, $subject, $message)) {
        echo "Thank you for contacting us!";
    } else {
        echo "Error sending the email. Please try again.";
    }
} else {
    echo "Invalid request";
}
?>
