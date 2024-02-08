<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // You can process the form data here (e.g., store it in a database)

    // For demonstration purposes, let's just echo the received data
    echo "Thank you for your feedback, $name! We'll get back to you soon.";
}
?>