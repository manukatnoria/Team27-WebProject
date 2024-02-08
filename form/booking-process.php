<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $service = $_POST["service"];
    $date = $_POST["date"];
    $message = $_POST["message"];

    // You can perform additional validation here if needed

    // Send email notification (example)
    $to = "your_email@example.com"; // Replace with your email address
    $subject = "New Booking Request from $name";
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\nDate: $date\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Your booking request has been submitted successfully. We will contact you shortly.</p>";
    } else {
        echo "<p>Sorry, there was an error processing your request. Please try again later.</p>";
    }
} else {
    // If the form is not submitted via POST method, redirect to the booking page
    header("Location: booking.php");
    exit();
}
?>
