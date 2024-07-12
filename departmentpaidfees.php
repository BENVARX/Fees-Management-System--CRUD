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
        $sql = "SELECT entries.first_name, entries.last_name, paidfees.rollno, paidfees.currentYear, paidfees.admission_fee, paidfees.tuition_fee, paidfees.book_fee, paidfees.uniform_fee, paidfees.hostel_fee, paidfees.caution_deposit_hostel, paidfees.transport_fee, paidfees.examination_fee, paidfees.library_fee, paidfees.placement_training_fee, paidfees.others_fee, paidfees.total
                FROM paidfees
                JOIN entries ON paidfees.rollno = entries.rollno
                WHERE entries.department_name = ? AND entries.batch = ?";

        // Prepare and bind parameters
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ss", $department, $batch);

        // Execute the query
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($first_name, $last_name, $rollno, $currentYear, $admission_fee, $tuition_fee, $book_fee, $uniform_fee, $hostel_fee, $caution_deposit_hostel, $transport_fee, $examination_fee, $library_fee, $placement_training_fee, $others_fee, $total);

        // Display results in a table
        echo "<h2>Fee Details</h2>";
        echo "<table border='1'>";
        echo "<tr style='background-color:black;'><th>Name</th><th>Rollno</th><th>Current Year</th><th>Admissionfee</th><th>Tuitionfee</th><th>Bookfee</th><th>Uniformfee</th><th>Hostelfee</th><th>Cautiondeposithostel</th><th>Transportfee</th><th>Examinationfee</th><th>Libraryfee</th><th>Placementfee</th><th>Otherfee</th><th>Total Amount</th></tr>";
        $total_amount = 0;

        while ($stmt->fetch()) {
            $total_amount += $total;
            echo "<tr><td>$first_name $last_name</td><td>$rollno</td><td>$currentYear</td><td>$admission_fee</td><td>$tuition_fee</td><td>$book_fee</td><td>$uniform_fee</td><td>$hostel_fee</td><td>$caution_deposit_hostel</td><td>$transport_fee</td><td>$examination_fee</td><td>$library_fee</td><td>$placement_training_fee</td><td>$others_fee</td><td>$total</td></tr>";
        }

        echo "</table>";
        echo "<p class='total'>Total Amount: $total_amount</p>";

        // Close statement and connection
        $stmt->close();
    } else {
        echo "<p class='note'>Please select a department and batch.</p>";
    }

    $connection->close();
}
?>
