<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Email details
    $to = "rahulprasadjan"; // Change this to your email address
    $subject = "New message from your website contact form";
    $body = "Name: $name\nEmail: $email\n\n$message";
    $headers = "From: $email";
    
    // Attempt to send email
    if (mail($to, $subject, $body, $headers)) {
        // Email sent successfully
        echo json_encode(array("status" => "success", "message" => "Your message has been sent successfully!"));
    } else {
        // Error sending email
        echo json_encode(array("status" => "error", "message" => "Oops! Something went wrong. Please try again later."));
    }
} else {
    // If the form is not submitted, redirect to the contact page
    header("Location: contact.html");
    exit;
}
?>

