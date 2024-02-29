<?php
$title = "Investing";
include("header.php");

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form and store it in variables
    $name = $_POST['name'];       // Name
    $email = $_POST['email'];     // Email
    $phone = $_POST['phone'];     // Phone
    $amount = $_POST['amount'];   // Investment Amount
    $message = $_POST['message']; // Message

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM invest WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the email already exists, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email already exists. Please provide a different email OR Edit your Submission.</div>";
    } else {
        // Prepare an SQL statement to insert data into the database
        $insert_query = "INSERT INTO invest (name, email, phone, amount, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sssis", $name, $email, $phone, $amount, $message);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // If the query was successful, display a success message
            echo "<div class='alert alert-success' role='alert'>Investment submitted successfully.</div>";
        } else {
            // If there was an error in the query, display an error message
            echo "<div class='alert alert-danger' role='alert'>Error: " . $stmt->error . "</div>";
        }
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<script src="form_validation.js"></script>

<br>
<br>
<h1 class="fg">Invest in Us</h1>
<br>
<br>

<form action="form/InvestorDirectory.php" method="post" class="Farhana">

    <label for="name">Your Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Your Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <label for="phone">Your Phone:</label><br>
    <input type="tel" id="phone" name="phone" required><br><br>
    <label for="amount">Investment Amount:</label><br>
    <input type="number" id="amount" name="amount" required><br><br>
    <label for="message">Message (optional):</label><br>
    <textarea id="message" name="message" rows="4"></textarea><br><br>

    <a href="form/InvestorDirectory.php" class="edit-response-button">Investors</a>

    <input type="submit" value="Invest Now" >

</form>

<?php
include("footer.php");
?>