<?php
$title = "Apply to work";
include ("header.php");

if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    $name = $_POST['name']; 
    $email = $_POST['email'];      
    $phone = $_POST['phone'];       

    include 'db.php';

    // Checking if the email already exists in the database
    $check_email_query = "SELECT * FROM Careers WHERE email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // If the email already exists, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email already exists. 
        Please provide a different email OR Edit your Submission.</div>";
    } else {
        // Define an SQL query to insert data into the table in database
        $sql = "INSERT INTO Careers (name, email, phone)
                VALUES ('$name', '$email', '$phone')";

        // Execute the SQL query using the database connection
        if ($conn->query($sql) === TRUE) {
            // If the query was successful, display a success message
            echo "<div class='alert alert-success' role='alert'>Feedback submitted successfully.</div>";
        } else {
            // If there was an error in the query, display an error message
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>". $conn->error."</div>";
        }
    }

    $conn->close();
}
?>


<br>
<br>

<h1 class="fg">Welcome to a Flexible schedule and Wealthy Life</h1>

<br>
<br>


<form class="Apply-for-job" action="" method="POST">
    <h1>Job Application </h1>
    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" required>
    <input type="submit" value="Submit">
</form>



<?php
include("footer.php");
?>
