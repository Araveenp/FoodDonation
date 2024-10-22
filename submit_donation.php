<?php
// Database connection
$host = 'localhost';
$db = 'donation';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$donor_name = $_POST['donor_name'];
$food = $_POST['food'];
$location = $_POST['location'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Prepare and bind the SQL query to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO donations (donor_name, food, location, latitude, longitude) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $donor_name, $food, $location, $latitude, $longitude);

// Execute the query
if ($stmt->execute()) {
    echo "Donation submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
