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

// Retrieve form data securely using prepared statements
$current_year = $_POST["current_year"];
$department_name = $_POST['department_name'];

$stmt = $conn->prepare("SELECT * FROM entries WHERE current_year = ? AND department_name = ?");
$stmt->bind_param("ss", $current_year, $department_name);
$stmt->execute();
$checkResult = $stmt->get_result();

// Check if combination of current_year and department_name exists
if ($checkResult->num_rows > 0) {
    // Fetch the current semester from the entries table
    $row = $checkResult->fetch_assoc();
    $current_semester = $row['current_semester'];

    // Join tables and update fees
    $sql = "SELECT fr.*, fn.rollno FROM feesreduction AS fr 
            INNER JOIN feesntries AS fn ON fr.rollno = fn.rollno 
            INNER JOIN entries AS e ON fn.rollno = e.rollno 
            WHERE e.current_year = ? AND e.current_semester = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $current_year, $current_semester);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if query was executed successfully
    if ($result === false) {
        echo "Error executing SQL query: " . $conn->error;
    } else {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Iterate through the results
            while ($row = $result->fetch_assoc()) {
                // Update values in pastfees if rollno exists
                $updateQuery = "UPDATE pastfees AS pf 
                                INNER JOIN feesntries AS fn ON pf.rollno = fn.rollno
                                SET 
                                   
                                    pf.admission_fee = fn.admission_fee,
                                    pf.tuition_fee = fn.tuition_fee,
                                    pf.book_fee = fn.book_fee,
                                    pf.uniform_fee = fn.uniform_fee,
                                    pf.hostel_fee = fn.hostel_fee,
                                    pf.caution_deposit_hostel = fn.caution_deposit_hostel,
                                    pf.transport_fee = fn.transport_fee,
                                    pf.examination_fee = fn.examination_fee,
                                    pf.library_fee = fn.library_fee,
                                    pf.placement_training_fee = fn.placement_training_fee,
                                    pf.others_fee = fn.others_fee,
                                    pf.total = fn.total
                                WHERE pf.rollno = '{$row['rollno']}'";

                if (!$conn->query($updateQuery)) {
                    echo "Error updating fees: " . $conn->error;
                }

                // Insert into pastfees if rollno exists
                $insertQuery = "INSERT INTO pastfees (rollno, admission_fee, tuition_fee, book_fee, uniform_fee, hostel_fee, caution_deposit_hostel, transport_fee, examination_fee, library_fee, placement_training_fee, others_fee, total) 
                                SELECT fn.rollno, fn.admission_fee, fn.tuition_fee, fn.book_fee, fn.uniform_fee, fn.hostel_fee, fn.caution_deposit_hostel, fn.transport_fee, fn.examination_fee, fn.library_fee, fn.placement_training_fee, fn.others_fee, fn.total
                                FROM feesntries AS fn
                                WHERE fn.rollno = '{$row['rollno']}' AND NOT EXISTS (
                                    SELECT 1 FROM pastfees AS pf WHERE pf.rollno = fn.rollno
                                )";

                if (!$conn->query($insertQuery)) {
                    echo "Error inserting into pastfees: " . $conn->error;
                }
            }
            echo '<center>';
            echo '<p style="color:green;">Fees updated successfully!</p>';
            echo '<p> click hear to update semester </p>';
            header("Location: feesrepeat.php?current_year=$current_year &department_name=$department_name");
            echo '<div class="my-class">';
            echo '<a href="feesrepeat.php"><button type="button" name="Back" value="Back" style="color: orange; background-color: black; height: 30px; width: 80px; padding: 0px 0px 0px 0px; border-radius: 10px; border: 2px solid black;">UPDATE</button></a>';
            echo '</center>';
        } else {
            echo 'error';
            
        }
    }
} else {
    // Combination of current_year and department_name does not exist
    echo '<center>';
    echo '<h4 style="color:red;">Combination of current year and department not found in entries table.</h4>';
    echo '</center>';
}

// Close the connection
$conn->close();
?>

