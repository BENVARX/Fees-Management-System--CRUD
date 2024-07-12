<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$current_year = $_POST["current_year"];
$department_name = $_POST['department_name'];

// Limit current_year to 4
$current_year = min($current_year, 4);

// Increment current semester
$newSemester = $current_year + 1;

if ($newSemester <= 8) {
    // Update the current semester in your table
    $updateSemesterQuery = "UPDATE entries SET current_semester = CASE WHEN current_semester < 8 THEN current_semester + 1 ELSE current_semester END WHERE department_name = '$department_name' AND current_year='$current_year'";

    // Execute the query
    if (mysqli_query($conn, $updateSemesterQuery)) {
        // Update current year based on odd semester condition
        $updateYearQuery = "UPDATE entries SET current_year = current_year + CASE WHEN current_semester % 2 = 1 THEN 1 ELSE 0 END WHERE department_name = '$department_name' AND current_year='$current_year'";
       
        if (mysqli_query($conn, $updateYearQuery)) {
            echo "Form submitted successfully!";
        } else {
            echo "Error updating current year: " . mysqli_error($conn);
        }
    } else {
        echo "Error updating current semester: " . mysqli_error($conn);
    }
} else {
    echo "Semester cannot exceed 8.";
}

// Close the connection
$conn->close();
?>
