<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form data
    $name = htmlspecialchars($_POST['Name']);
    $phone = htmlspecialchars($_POST['Phone_Number']);
    $email = htmlspecialchars($_POST['Email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Set up email variables
    $to = "info@otodrive.co.ke";
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nPhone: $phone\nEmail: $email\nMessage: $message";
    $headers = "From: $email\r\n";
    
    // Try sending the email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Thank you for your message! We will get back to you shortly.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to send message. Please try again.']);
    }
}
?>
