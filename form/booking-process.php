<?php
$title = "Bookings";
include("header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investor Directory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .button {
            display: block;
            width: 150px;
            margin: 0 auto;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Current Bookings</h1>
</body>
</html>




<?
    include 'db.php';

    // Query to retrieve all data from the 'services' table
    $sql = "SELECT name, phone, service, date, message FROM services";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are any records
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Phone</th>
        <th>Service</th><th>Date</th><th>Message</th></tr>";
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"]. "</td>";
            echo "<td>" . $row["phone"]. "</td>";
            echo "<td>" . $row["service"]. "</td>";
            echo "<td>" . $row["date"]. "</td>";
            echo "<td>" . $row["message"]. "</td>";
        }
        echo "</table>";
    } else {
        echo "No bookings yet.";
    }
    
    // Close the database connection
    $conn->close();
?>

<br>
<br>
<a href="edit-booking.php" class="button">Edit/Delete booking</a>

<?
include("footer.php");
?>
