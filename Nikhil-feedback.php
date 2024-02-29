<?php
$title = "Feedback/Suggestions ";
include("header.php");

if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    $name = $_POST['name'];       // Name
    $email = $_POST['email'];     // Email
    $message = $_POST['message']; // Feedback/Suggestion

    // Include the database connection file
    include 'db.php';

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM feedback WHERE email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // If the email already exists, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email already exists. 
        Please provide a different email OR Edit your Submission.</div>";
    } else {
        // Define an SQL query to insert data into the 'feedback' table
        $sql = "INSERT INTO feedback (full_name, email, feedback)
                VALUES ('$name', '$email', '$message')";

        // Execute the SQL query using the database connection
        if ($conn->query($sql) === TRUE) {
            // If the query was successful, display a success message
            echo "<div class='alert alert-success' role='alert'>Feedback submitted successfully.</div>";
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
<h1 class="fg">Your Feedback is Gold for Us</h1>
<br>
<br>

<form action="" method="post" class="nikhil-feedback-form" onsubmit="return validateForm()">

  <label for="name">Your Name*:</label><br>
  <input type="text" id="name" name="name" required><br><br>  
  <label for="email">Your Email*:</label><br>
  <input type="email" id="email" name="email" required><br><br>

  <label for="message">Your Feedback/Suggestion*:</label><br>
  <textarea id="message" name="message" rows="4" required></textarea><br><br>

  <input type="submit" value="Let's Gooo!!" name="submit">

  <!-- Edit Your Response button -->
  <a href="form/submit_feedback.php" class="edit-response-button">Edit Your Response</a>
</form>

<?php
include("footer.php");
?>
