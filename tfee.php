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

// Check if the combination of current_year and department_name exists in the entries table
$checkQuery = "SELECT * FROM entries WHERE current_year = '$current_year' AND department_name = '$department_name'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Combination of current_year and department_name exists, proceed with other conditions

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
            
            // Execute the query
            if (mysqli_query($conn, $updateYearQuery)) {
                // Join tables and update fees
                $sql = "SELECT fr.admission_fee, fr.tuition_fee, fr.book_fee, fr.uniform_fee, fr.hostel_fee, fr.caution_deposit_hostel, fr.transport_fee, fr.examination_fee, fr.library_fee, fr.placement_training_fee, fr.others_fee, (fr.admission_fee + fr.tuition_fee + fr.book_fee + fr.uniform_fee + fr.hostel_fee + fr.caution_deposit_hostel + fr.transport_fee + fr.examination_fee + fr.library_fee + fr.placement_training_fee + fr.others_fee) AS total, fn.rollno 
                FROM feesreduction AS fr
                INNER JOIN feesntries AS fn ON fr.rollno = fn.rollno
                INNER JOIN entries AS e ON fn.rollno = e.rollno
                WHERE (e.current_year = 2 AND e.current_semester = 3) OR (e.current_year = 3 AND e.current_semester = 5) OR (e.current_year = 4 AND e.current_semester = 7)";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                // Check if query was executed successfully
                if ($result === false) {
                    echo "Error executing SQL query: " . mysqli_error($conn);
                } else {
                    // Check if any rows were returned
                    if (mysqli_num_rows($result) > 0) {
                        // Iterate through the results
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Your existing code for updating fees
                            $updateQuery = "UPDATE feesntries SET 
                            total = total + {$row['total']}-{$row['admission_fee']},
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
                        

                            if (!mysqli_query($conn, $updateQuery)) {
                                echo "Error updating fees: " . mysqli_error($conn);
                            }
                        }
                        echo'<center>';
                        echo '<p style=color:green;>Fees updated successfully!</p>';
                        echo '<div class="my-class">';
                        echo'<a href = "Home Page.html">
                        <button type="button" name="Back" value="Back" style="color: orange; background-color: black; height: 30px; width: 80px; padding: 0px 0px 0px 0px;border-radius:10px;border:2px solid black;">Home </button>
                       </a>';
                       echo'</center>';
                    } else {
                        echo'<center>';
                        echo '<h4 style= color:green; >"Refresh the page to update and redirect to home "<h4>';
                       
                        echo'<input type="button" value="Refresh" onclick="refreshAndGoHome()" style=background-color:black;color:white>';
                        echo'</center>';
                    }
                }
            } else {
                echo "Error updating current year: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating current semester: " . mysqli_error($conn);
        }
    } else {
        echo "Semester cannot exceed 8.";
    }
} else {
    // Combination of current_year and department_name does not exist
    echo'<center>';
    echo '<h4 style=color:red;>Combination of current year and department not found in entries table.</h4>';
    echo'</center>';
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
