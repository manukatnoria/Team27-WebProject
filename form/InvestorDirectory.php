<?php
$title = "Investor Directory";
include("header.php");
include 'db.php'; // Assuming this file contains the database connection

// Retrieve all investor data except for email
$select_query = "SELECT name, phone, amount, message FROM invest";
$result = $conn->query($select_query);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Phone</th><th>Investment Amount</th><th>Message</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>".$row["amount"]."</td>";
        echo "<td>".$row["message"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No investors found.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
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
    <h1>Investor Directory</h1>
    <br>
    <br>
    <a href="edit_investors.php" class="button">Edit/Delete Your Data</a>
</body>
</html>

<?php
include("footer.php");
?>
