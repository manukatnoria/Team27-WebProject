<?php
$title = "Edit Application";
include("header.php");

include 'db.php';

?>
<script src="form_validation.js"></script>

<br>
<br>
<h1 class="fg">Edit Your Application</h1>
<br>
<br>
<style>
.goback-btn {
    display: inline-block;
    padding: 3px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.goback-btn:hover {
    background-color: #0056b3;
}
</style>
<form action="" method="post" class="edit-application-form" onsubmit="return validateForm()">
    <label for="email">Enter Your Email to Edit Your Application:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" value="Edit Your Application" name="edit_application">
    <a href="../Manpreet-job.php" class="goback-btn">Go Back</a>
</form>

<?php

if (isset($_POST['edit_application'])) {
    $email = $_POST['email']; // Get the email submitted by the user

    // Check if the email exists in the database
    $check_email_query = "SELECT * FROM careers WHERE email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // If the email exists, fetch the application entry
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];

        // Display the form with fetched data for editing
        echo "<form action='' method='post' class='edit-application-form'>";
        echo "<label for='name'>Your Name:</label><br>";
        echo "<input type='text' id='name' name='name' value='$name' required><br><br>";  
        echo "<label for='email'>Your Email:</label><br>";
        echo "<input type='email' id='email' name='email' value='$email' required readonly><br><br>";
        echo "<label for='phone'>Your Phone:</label><br>";
        echo "<input type='text' id='phone' name='phone' value='$phone' required><br><br>";
        echo "<input type='submit' value='Update Application' name='update_application'>";
        echo "<input type='submit' value='Delete Application' name='delete_application'>";
        echo "</form>";
    } else {
        // If the email does not exist, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email does not exist. Please provide a valid email.</div>";
    }
} elseif (isset($_POST['update_application'])) {
    // Retrieve data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update the application entry in the database
    $update_query = "UPDATE careers SET name = '$name', phone = '$phone' WHERE email = '$email'";
    if ($conn->query($update_query) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Application updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error updating application: " . $conn->error . "</div>";
    }
} elseif (isset($_POST['delete_application'])) {
    // Retrieve the email from the form
    $email = $_POST['email'];

    // Delete the application entry from the database
    $delete_query = "DELETE FROM careers WHERE email = '$email'";
    if ($conn->query($delete_query) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Application deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting application: " . $conn->error . "</div>";
    }
}

// Close the database connection
$conn->close();


include("footer.php");
?>

