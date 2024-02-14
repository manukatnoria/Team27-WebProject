<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $message = $_POST["message"];

    // You can process this data as per your requirements, like saving it to a database or sending it via email.
    
    // For example, if you want to email the form details:
    $to = "your@email.com";
    $subject = "New Investor Form Submission";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nAddress: $address\nMessage: $message";
    mail($to, $subject, $body);
    
    // Redirect back to the investor form page or to a thank you page
    header("Location: investor_form.php?status=success");
    exit;
} else {
    // Redirect back to the investor form page if accessed directly without submission
    header("Location: investor_form.php");
    exit;
}
?>