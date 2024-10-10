<?php
$host = 'localhost';
$db = 'smartwatch_db';
$user = 'root';
$pass = 'password'; // Update these settings

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data (for demonstration)
$sql = "SELECT stepCount, temperature, heartRate FROM smartwatch_data ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["stepCount" => 0, "temperature" => 0, "heartRate" => 0]);
}

$conn->close();
?>
