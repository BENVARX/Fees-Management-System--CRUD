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

// Check if the combination of current_year and department_name exists in the entries table
if ($checkResult->num_rows > 0) {
    // Combination of current_year and department_name exists, proceed with other conditions

    // Limit current_year to 4
    $current_year = min($current_year, 4);

    // Increment current semester
    $current_semester = 0;
    $newSemester = 0;

    // Get the current semester from the entries table
    $getSemesterQuery = "SELECT MAX(current_semester) AS current_semester FROM entries WHERE department_name = ? AND current_year = ?";
    $stmt = $conn->prepare($getSemesterQuery);
    $stmt->bind_param("si", $department_name, $current_year);
    $stmt->execute();
    $semesterResult = $stmt->get_result();

    if ($semesterResult) {
        $semesterRow = $semesterResult->fetch_assoc();
        $current_semester = $semesterRow['current_semester'];
    }

    if ($current_semester < 8) {
        $newSemester = $current_semester + 1;
    } else {
        $newSemester = 1; // Start over for a new academic year
        $current_year++;
    }

    // Update the current semester and year in the entries table
    $updateSemesterQuery = "UPDATE entries SET current_semester = ?, current_year = ? WHERE department_name = ? AND current_year = ?";
    $stmt = $conn->prepare($updateSemesterQuery);
    $stmt->bind_param("iiss", $newSemester, $current_year, $department_name, $current_year);
    $stmt->execute();

    // Join tables and update fees
    $sql = "SELECT fr.admission_fee, fr.tuition_fee, fr.book_fee, fr.uniform_fee, fr.hostel_fee, fr.caution_deposit_hostel, fr.transport_fee, fr.examination_fee, fr.library_fee, fr.placement_training_fee, fr.others_fee, (fr.admission_fee + fr.tuition_fee + fr.book_fee + fr.uniform_fee + fr.hostel_fee + fr.caution_deposit_hostel + fr.transport_fee + fr.examination_fee + fr.library_fee + fr.placement_training_fee + fr.others_fee) AS total, fn.rollno FROM feesreduction AS fr INNER JOIN feesntries AS fn ON fr.rollno = fn.rollno INNER JOIN entries AS e ON fn.rollno = e.rollno WHERE e.current_year = ? AND e.current_semester = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $current_year, $newSemester);
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
                // Your existing code for updating fees
                $updateQuery = "UPDATE feesntries SET 
                    total = total + {$row['total']} - {$row['admission_fee']},
                    admission_fee = admission_fee ,
                    tuition_fee = tuition_fee + {$row['tuition_fee']},
                    book_fee = book_fee + {$row['book_fee']},
                    uniform_fee = uniform_fee + {$row['uniform_fee']},
                    hostel_fee = hostel_fee + {$row['hostel_fee']},
                    caution_deposit_hostel = caution_deposit_hostel + {$row['caution_deposit_hostel']},
                    transport_fee = transport_fee + {$row['transport_fee']},
                    examination_fee = examination_fee + {$row['examination_fee']},
                    library_fee = library_fee + {$row['library_fee']},
                    placement_training_fee = placement_training_fee + {$row['placement_training_fee']},
                    others_fee = others_fee + {$row['others_fee']}
                    WHERE rollno = '{$row['rollno']}'";

                // Condition to insert into pastfees if semester is odd
                if ($newSemester % 2 == 1) {
                    $insertIntoPastFeesQuery = "REPLACE INTO pastfees SELECT * FROM feesntries WHERE rollno = '{$row['rollno']}'";
                    $stmt = $conn->prepare($insertIntoPastFeesQuery);
                    $stmt->execute();
                }

                if (!$stmt) {
                    echo "Error updating fees: " . $conn->error;
                }
            }
            echo '<center>';
            echo '<p style="color:green;">Fees updated successfully!</p>';
            echo '<div class="my-class">';
            echo '<a href="Home Page.html"><button type="button" name="Back" value="Back" style="color: orange; background-color: black; height: 30px; width: 80px; padding: 0px 0px 0px 0px; border-radius: 10px; border: 2px solid black;">Home</button></a>';
            echo '</center>';
        } else {
            echo '<center>';
            echo '<h4 style="color:green;">Refresh the page to update and redirect to home</h4>';
            echo '<input type="button" value="Refresh" onclick="refreshAndGoHome()" style="background-color: black; color: white;">';
            echo '</center>';
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
function refreshAndGoHome() {
    // Reload the current page
    window.location.reload();
    // Navigate to the home.html page
    window.location.href = "Home Page.html";
}
</script>
</body>
</html>