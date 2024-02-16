<?php
$title = "Investing";
include("header.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form and store it in variables
    $name = $_POST['name'];       // Name
    $email = $_POST['email'];     // Email
    $phone = $_POST['phone'];     // Phone
    $amount = $_POST['amount'];   // Investment Amount
    $message = $_POST['message']; // Message

    // Include the database connection file
    include 'db.php';

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM invest WHERE email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // If the email already exists, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email already exists. 
        Please provide a different email OR Edit your Submission.</div>";
    } else {
        $sql = "INSERT INTO invest (name, email, phone, amount, message)
        VALUES ('$name', '$email', '$phone', '$amount', '$message')";

        // Execute the SQL query using the database connection
        if ($conn->query($sql) === TRUE) {
            // If the query was successful, display a success message
            echo "<div class='alert alert-success' role='alert'>Investment submitted successfully.</div>";
        } else {
            // If there was an error in the query, display an error message
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>". $conn->error."</div>";
        }
    }

    // Close the database connection
    $conn->close();
}
?>


?>

<br>
<br>
<h1 class="fg">Invest in Us</h1>
<br>
<br>

<form action="" method="post" class="Farhana">

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

    <input type="submit" value="Invest Now" >

</form>

<?php
include("footer.php");
?>