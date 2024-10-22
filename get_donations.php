<?php
$host = 'localhost';
$db = 'donation';
$user = 'root';  // Adjust this according to your MySQL user
$pass = '';      // Adjust this according to your MySQL password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT donor_name, food, location, latitude, longitude FROM donations";
$result = $conn->query($sql);

$donations = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $donations[] = $row;
    }
}

echo json_encode($donations);

$conn->close();
?>
