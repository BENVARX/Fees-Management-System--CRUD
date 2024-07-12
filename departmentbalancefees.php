<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mydatabase";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Check if department and batch are set and not empty
    if (isset($_GET["department"]) && !empty($_GET["department"]) &&
        isset($_GET["batch"]) && !empty($_GET["batch"])) {

        $department = $_GET["department"];
        $batch = $_GET["batch"];

        // Prepare SQL query
        $sql = "SELECT entries.first_name, entries.last_name, entries.current_year, feesntries.rollno, feesntries.admission_fee, feesntries.tuition_fee, feesntries.book_fee, feesntries.uniform_fee, feesntries.hostel_fee, feesntries.caution_deposit_hostel, feesntries.transport_fee, feesntries.examination_fee, feesntries.library_fee, feesntries.placement_training_fee, feesntries.others_fee, feesntries.total
                FROM feesntries
                JOIN entries ON feesntries.rollno = entries.rollno
                WHERE entries.department_name = ? AND entries.batch = ?";

        // Prepare and bind parameters
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $department, $batch);

        // Execute the query
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($first_name, $last_name, $current_year, $rollno, $admission_fee, $tuition_fee, $book_fee, $uniform_fee, $hostel_fee, $caution_deposit_hostel, $transport_fee, $examination_fee, $library_fee, $placement_training_fee, $others_fee, $total);

        // Start HTML
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Fee Details</title>";
        echo "<style>
                body { font-family: Arial, sans-serif; }
                table { width: 100%; border-collapse: collapse; }
                th, td { padding: 8px 12px; border: 1px solid #ddd; }
                th { background-color: #333; color: white; }
                .print-button { margin: 20px 0; }
              </style>";
        
        echo "</head>";
        echo "<body>";
        echo "<h2>Fee Details</h2>";
        
        echo "<table>";
        echo "<tr><th>Name</th><th>Current Year</th><th>Rollno</th><th>Admission Fee</th><th>Tuition Fee</th><th>Book Fee</th><th>Uniform Fee</th><th>Hostel Fee</th><th>Caution Deposit Hostel</th><th>Transport Fee</th><th>Examination Fee</th><th>Library Fee</th><th>Placement Fee</th><th>Other Fee</th><th>Total Amount</th></tr>";
        
        $total_amount = 0;

        while ($stmt->fetch()) {
            $total_amount += $total;
            echo "<tr><td>$first_name $last_name</td><td>$current_year</td><td>$rollno</td><td>$admission_fee</td><td>$tuition_fee</td><td>$book_fee</td><td>$uniform_fee</td><td>$hostel_fee</td><td>$caution_deposit_hostel</td><td>$transport_fee</td><td>$examination_fee</td><td>$library_fee</td><td>$placement_training_fee</td><td>$others_fee</td><td>$total</td></tr>";
        }

        echo "</table>";
        echo "<p class='total'>Balance Amount: $total_amount</p>";
        echo "</body>";
        echo "</html>";

        // Close statement and connection
        $stmt->close();
    } else {
        echo "<p class='note'>Please select a department and batch.</p>";
    }
    $connection->close();
}
?>
