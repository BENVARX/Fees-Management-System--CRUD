<?php
// Assuming you have a database connection established already
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

// Get the current_year and department_name from the user input
$current_year = $_POST['current_year'];
$department_name = $_POST['department_name'];

// SQL query to select the relevant data from feesntries table
$select_query = "SELECT f.* FROM feesntries AS f INNER JOIN entries AS e ON f.rollno = e.rollno WHERE e.current_year = '$current_year' AND e.department_name = '$department_name'";

// Execute the select query
$result = mysqli_query($conn, $select_query);

// Check if there are any results
if(mysqli_num_rows($result) > 0) {
    // Loop through each row in the result
    while($row = mysqli_fetch_assoc($result)) {
        // Extract data from the row
        $rollno = $row['rollno'];
        $admission_fee = $row['admission_fee'];
        $tuition_fee = $row['tuition_fee'];
        $book_fee = $row['book_fee'];
        $uniform_fee = $row['uniform_fee'];
        $hostel_fee = $row['hostel_fee'];
        $caution_deposit_hostel = $row['caution_deposit_hostel'];
        $transport_fee = $row['transport_fee'];
        $examination_fee = $row['examination_fee'];
        $library_fee = $row['library_fee'];
        $placement_training_fee = $row['placement_training_fee'];
        $others_fee = $row['others_fee'];

        // SQL query to update data in pastfees table
        $update_query = "UPDATE pastfees SET admission_fee = '$admission_fee', tuition_fee = '$tuition_fee', book_fee = '$book_fee', uniform_fee = '$uniform_fee', hostel_fee = '$hostel_fee', caution_deposit_hostel = '$caution_deposit_hostel', transport_fee = '$transport_fee', examination_fee = '$examination_fee', library_fee = '$library_fee', placement_training_fee = '$placement_training_fee', others_fee = '$others_fee' WHERE rollno = '$rollno'";

        // Execute the update query
        mysqli_query($conn, $update_query);
    }

    // Success message
    echo "Data updated successfully.";
} else {
    // No data found message
    echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
?>
