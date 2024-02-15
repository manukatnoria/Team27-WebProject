<?php
$title = "Booking your fav.";
include ("header.php");

if (isset($_POST['submit'])) {
    // Retrieve data from the form and store it in variables
    $name = $_POST['name'];       // Name
    $email = $_POST['email'];     // Email
    $phone = $_POST['phone'];     // Phone
    $service = $_POST['service']; // Service
    $date = $_POST['date'];       // Date
    $message = $_POST['message']; // Message

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
         // Define an SQL query to insert data into the 'bookings' table
         $sql = "INSERT INTO services (name, email, phone, service, date, message)
         VALUES ('$name', '$email', '$phone', '$service', '$date', '$message')";
         

        // Execute the SQL query using the database connection
        if ($conn->query($sql) === TRUE) {
            // If the query was successful, display a success message
            echo "<div class='alert alert-success' role='alert'>Service booked successfully.</div>";
        } else {
            // If there was an error in the query, display an error message
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>". $conn->error."</div>";
        }
    }

    // Close the database connection
    $conn->close();
}
?>


<br>
<br>
<h1 class="fg">Book our services</h1>
<br>
<br>

 <form action="" method="POST" class="booking-form">


    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required><br><br>

    <label for="service">Service:</label>
    <select id="service" name="service" required>
        <option value="cleaning">Cleaning</option>
        <option value="window">Window Washing</option>
        <option value="carpet">Carpet Cleaning</option>
    </select>
    <br>
    <br>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required><br><br>

    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
    <input type="submit" value="Submit!!" name="submit">

       
</form>

<?php
include("footer.php");
?>
