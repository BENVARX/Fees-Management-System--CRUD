<?php
// Database connection parameters
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

// Assuming you have already connected to your database
$department = $_GET['department'];
$batch = $_GET['batch'];


if (isset($_GET["department"]) && !empty($_GET["department"]) &&
        isset($_GET["batch"]) && !empty($_GET["batch"]))
{
// Query to get total fees for the selected department and year
$query = "SELECT 
          SUM(admission_fee) AS total_admission_fee,
    SUM(tuition_fee) AS total_tuition_fee,
    SUM(book_fee) AS total_book_fee,
    SUM(uniform_fee) AS total_uniform_fee,
    SUM(hostel_fee) AS total_hostel_fee,
    SUM(caution_deposit_hostel) AS total_caution_deposit_hostel,
    SUM(transport_fee) AS total_transport_fee,
    SUM(examination_fee) AS total_examination_fee,
    SUM(library_fee) AS total_library_fee,
    SUM(placement_training_fee) AS total_placement_training_fee,
    SUM(others_fee) AS total_others_fee
          FROM feesntries
          INNER JOIN entries ON feesntries.rollno = entries.rollno
          WHERE entries.department_name = '$department' AND entries.batch = '$batch'";

$result = $connection->query($query);

if ($result) {
    $row = $result->fetch_assoc();
    $currentYearQuery = "SELECT current_year FROM entries WHERE department_name = '$department' AND batch = '$batch' LIMIT 1";
        $currentYearResult = $connection->query($currentYearQuery);
        $currentYearRow = $currentYearResult->fetch_assoc();
        $current_year = $currentYearRow['current_year'];
    // Display individual fee components
    echo "<h2 style='margin-left:400px;margin-top:150px;color:grey;font-family:poppins;'>Fee Balance for $department Department in batch $batch:</h2>";
    echo "<table style='margin-left:550px;margin-top:30px;font-size:20px;font-family:poppins;'>";
   
    echo "<tr>";
    echo "<td>Tuition Fee: </td>";
    echo "<td>" . $row['total_tuition_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Book Fee: </td>";
    echo"<td>" . $row['total_book_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Uniform Fee: </td>";
    echo "<td>" . $row['total_uniform_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Hostel Fee: </td>";
    echo "<td>" . $row['total_hostel_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Caution Deposit (Hostel): </td> ";
    echo "<td>" . $row['total_caution_deposit_hostel'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Transport Fee: </td>";
    echo "<td>" . $row['total_transport_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Examination Fee: </td> ";
    echo "<td>" . $row['total_examination_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Library Fee:</td> ";
    echo "<td>" . $row['total_library_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Placement Training Fee:</td> ";
    echo "<td>" . $row['total_placement_training_fee'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Others Fee: </td>";
    echo "<td>" . $row['total_others_fee'] . "</td>";
    echo "</tr>";
    
    
    // Display total fees
    if ($current_year == 1) {
        echo "<li>Admission Fee: " . $row['total_admission_fee'] . "</li>";
        $total_fees = $row['total_admission_fee'] + $row['total_tuition_fee'] + $row['total_book_fee'] + $row['total_uniform_fee'] + $row['total_hostel_fee'] + $row['total_caution_deposit_hostel'] + $row['total_transport_fee'] + $row['total_examination_fee'] + $row['total_library_fee'] + $row['total_placement_training_fee'] + $row['total_others_fee'];
    
        
    } else {
        $total_fees = $row['total_tuition_fee'] + $row['total_book_fee'] + $row['total_uniform_fee'] + $row['total_hostel_fee'] + $row['total_caution_deposit_hostel'] + $row['total_transport_fee'] + $row['total_examination_fee'] + $row['total_library_fee'] + $row['total_placement_training_fee'] + $row['total_others_fee'];
    }
    echo "<h3 style='color:green; margin-left:600px; margin-top:20px; font-size:30px; font-family:poppins;'>Total Fees: " . $total_fees . "</h3>";

    echo "</table>";
} else {
    echo "Error fetching data";
}

} 
else {
    echo("<p style='margin-left:535px;margin-top:175px;color:red;'>Enter the Department and Batch for Execution</p> ");
     }
// Close connection
$connection->close();
?>
