<?php
$title = "Booking Edit";
include("header.php");

include 'db.php';

// Check if the user has submitted their email
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_response'])) {
    $email = $_POST['email']; // Get the email submitted by the user

    // Check if the email exists in the database
    $check_email_query = "SELECT * FROM services WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If the email exists, fetch the booking entry
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
        $service = $row['service'];
        $date = $row['date'];
        $message = $row['message'];

        // Display the form with fetched data for editing
        echo "<form action='' method='post' class='booking-edit-form'>";
        echo "<label for='name'>Name:</label><br>";
        echo "<input type='text' id='name' name='name' value='$name' required><br><br>";  
        echo "<label for='email'>Email:</label><br>";
        echo "<input type='email' id='email' name='email' value='$email' required readonly><br><br>";
        echo "<label for='phone'>Phone:</label><br>";
        echo "<input type='tel' id='phone' name='phone' value='$phone' required><br><br>";
        echo "<label for='service'>Service:</label><br>";
        echo "<select id='service' name='service' required>";
        echo "<option value='cleaning' " . ($service == 'cleaning' ? 'selected' : '') . ">Cleaning</option>";
        echo "<option value='window' " . ($service == 'window' ? 'selected' : '') . ">Window Washing</option>";
        echo "<option value='carpet' " . ($service == 'carpet' ? 'selected' : '') . ">Carpet Cleaning</option>";
        echo "</select><br><br>";
        echo "<label for='date'>Date:</label><br>";
        echo "<input type='date' id='date' name='date' value='$date' required><br><br>";
        echo "<label for='message'>Message:</label><br>";
        echo "<textarea id='message' name='message' rows='4' required>$message</textarea><br><br>";
        echo "<input type='submit' value='Update Booking' name='update_booking'>";
        echo "<input type='submit' value='Delete Booking' name='delete_booking'>";
        echo "</form>";
    } else {
        // If the email does not exist, display an error message
        echo "<div class='alert alert-danger' role='alert'>Email does not exist. Please provide a valid email.</div>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_booking'])) {
    // Retrieve data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    // Update the booking entry in the database
    $update_query = "UPDATE services SET name=?, phone=?, service=?, date=?, message=? WHERE email=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssssss", $name, $phone, $service, $date, $message, $email);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'>Booking information updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error updating booking information: " . $stmt->error . "</div>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_booking'])) {
    // Retrieve the email from the form
    $email = $_POST['email'];

    // Delete the booking entry from the database
    $delete_query = "DELETE FROM services WHERE email=?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'>Booking deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting booking: " . $stmt->error . "</div>";
    }
}
$conn->close();
?>

<html>
<head>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        
.goback-btn {
    display: inline-block;
    padding: 10px 20px;
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


<body>
<form action="" method="post" class="booking-edit-form" onsubmit="return validateForm()">
    <label for="email">Enter Your Email to Edit Your Booking:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <input type="submit" value="Edit Your Booking" name="edit_response">
    <a href="booking-process.php" class="goback-btn">Go Back</a>
</form>
</body>
</html>

<?php
include("footer.php");
?>
