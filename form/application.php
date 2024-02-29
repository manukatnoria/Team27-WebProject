<?php
include 'header.php';
include 'db.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Sanitize and validate inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM careers WHERE email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // If the email already exists, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email already exists. Please provide a different email or edit your submission.</div>";
    } else {
        // Define an SQL query to insert data into the 'careers' table
        $sql = "INSERT INTO careers (name, email, phone, submission_date) 
        VALUES ('$name', '$email', '$phone', NOW())";

        // Execute the SQL query using the database connection
        if ($conn->query($sql) === TRUE) {
            // If the query was successful, display a success message
            ?>
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 5px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        color: #333;
                    }
                    ul {
                        list-style-type: none;
                        padding: 0;
                    }
                    ul li {
                        margin-bottom: 10px;
                    }
                    input[type="submit"] {
                        background-color: #007bff;
                        color: #fff;
                        border: none;
                        padding: 10px 20px;
                        border-radius: 5px;
                        cursor: pointer;
                    }
                    input[type="submit"]:hover {
                        background-color: #0056b3;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>We will contact You in 24 Hours</h1>
                    <p>Thank you for submitting your job application, <?php echo $name; ?>!</p>
                    <p>We have received your application with the following details:</p>
                    <ul>
                        <li>Name: <?php echo $name; ?></li>
                        <li>Email: <?php echo $email; ?></li>
                        <li>Phone: <?php echo $phone; ?></li>
                    </ul>
                    <p>Did you make a mistake? It's Okay!</p>
                    <form action="edit-application.php" method="GET">
                        <input type="submit" value="Edit Application">
                    </form>
                </div>
            </body>
            </html>
        <?php
        } else {
            // If there was an error in the query, display an error message
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    // Close the database connection
    $conn->close();
}

include "footer.php";
?>
