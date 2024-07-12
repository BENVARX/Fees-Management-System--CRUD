<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if roll number exists
$rollno = $_GET['rollno'];
$sql = "SELECT * FROM entries WHERE rollno = '$rollno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Roll number exists
    $response['exists'] = true;
} else {
    // Roll number doesn't exist
    $response['exists'] = false;
}

$conn->close();

echo json_encode($response);
?>
