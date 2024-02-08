<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // File upload handling
    $uploadDir = "uploads/"; // Create this directory in your project
    $targetFile = $uploadDir . basename($_FILES["resume"]["name"]);
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file is a valid PDF or DOCX
    if($fileType != "pdf" && $fileType != "docx") {
        echo "Sorry, only PDF and DOCX files are allowed.";
    } else {
        // Move uploaded file to the specified directory
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile)) {
            echo "The file ". basename( $_FILES["resume"]["name"]). " has been uploaded.";
            // Here, you can further process the form data or save it to a database
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
