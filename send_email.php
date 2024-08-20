<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $gcashNumber = htmlspecialchars($_POST['gcashNumber']);
    $referenceNumber = htmlspecialchars($_POST['referenceNumber']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $email = htmlspecialchars($_POST['email']);

    // Recipient email address
    $to = 'jaylongno1@gmail.com'; // Replace with your Gmail address
    $subject = 'New Subscription Form Submission';
    $message = "Gcash Number: $gcashNumber\nReference Number: $referenceNumber\nQuantity: $quantity\nEmail: $email";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Form submitted successfully.');window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Failed to send the form. Please try again.');window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request.');window.location.href='index.html';</script>";
}
?>