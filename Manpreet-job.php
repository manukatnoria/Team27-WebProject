<?php
$title = "Apply to work";
include ("header.php");

include 'db.php';
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

// Check if the email already exists in the database
$check_email_query = "SELECT * FROM careers WHERE email = '$email'";
$result = $conn->query($check_email_query);

if ($result->num_rows > 0) {
    // If the email already exists, display an error message
    echo "<div class='alert alert-danger' role='alert'>Email already exists. 
    Please provide a different email OR Edit your Submission.</div>";
} else {
    // Define an SQL query to insert data into the 'careers' table
    $sql = "INSERT INTO careers (name, email, phone, submission_date) 
    VALUES ('$name', '$email', '$phone', NOW())";

    // Execute the SQL query using the database connection
    if ($conn->query($sql) === TRUE) {
        // If the query was successful, display a success message
        echo "<div class='alert alert-success' role='alert'>Application submitted successfully!</div>";
    } else {
        // If there was an error in the query, display an error message
        echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>". $conn->error."</div>";
    }
}

// Close the database connection
$conn->close();
}
?>


<script src="form_validation.js"></script>

<br>
<br>

<h1 class="fg">Welcome to a Flexible schedule and Wealthy Life</h1>

<br>
<br>


<form class="Apply-for-job" action="form/application.php" method="POST">
    <h1>Job Application </h1>
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" required>
    <input type="submit" value="Submit">
    <a href="form/edit-application.php" class="edit-response-button">Edit Response</a>
</form>



<?php
include("footer.php");
?>