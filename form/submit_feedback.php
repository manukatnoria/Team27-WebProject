<?php
$title = "Feedback/Suggestions ";
include("header.php");

// Include the database connection file
include 'db.php';

?>

<br>
<br>
<h1 class="fg">Its Okay Mistakes Happen</h1>
<br>
<br>

<form action="" method="post" class="nikhil-feedback-form">
    <label for="email">Enter Your Email to Edit Your Response:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" value="Edit Your Response" name="edit_response">
</form>

<?php

if (isset($_POST['edit_response'])) {
    $email = $_POST['email']; // Get the email submitted by the user

    // Check if the email exists in the database
    $check_email_query = "SELECT * FROM feedback WHERE email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // If the email exists, fetch the feedback entry
        $row = $result->fetch_assoc();
        $name = $row['full_name'];
        $message = $row['feedback'];

        // Display the form with fetched data for editing
        echo "<form action='' method='post' class='nikhil-feedback-form'>";
        echo "<label for='name'>Your Name:</label><br>";
        echo "<input type='text' id='name' name='name' value='$name' required><br><br>";  
        echo "<label for='email'>Your Email:</label><br>";
        echo "<input type='email' id='email' name='email' value='$email' required readonly><br><br>";
        echo "<label for='message'>Your Feedback/Suggestion:</label><br>";
        echo "<textarea id='message' name='message' rows='4' required>$message</textarea><br><br>";
        echo "<input type='submit' value='Update Feedback' name='update_feedback'>";
        echo "<input type='submit' value='Delete Feedback' name='delete_feedback'>";
        echo "</form>";
    } else {
        // If the email does not exist, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email does not exist. Please provide a valid email.</div>";
    }
} elseif (isset($_POST['update_feedback'])) {
    // Retrieve data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Update the feedback entry in the database
    $update_query = "UPDATE feedback SET full_name = '$name', feedback = '$message' WHERE email = '$email'";
    if ($conn->query($update_query) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Feedback updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error updating feedback: " . $conn->error . "</div>";
    }
} elseif (isset($_POST['delete_feedback'])) {
    // Retrieve the email from the form
    $email = $_POST['email'];

    // Delete the feedback entry from the database
    $delete_query = "DELETE FROM feedback WHERE email = '$email'";
    if ($conn->query($delete_query) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Feedback deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting feedback: " . $conn->error . "</div>";
    }
}

// Close the database connection
$conn->close();


include("footer.php");
?>
