<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here
    

    // Assuming you have a database connection established
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $rollno=$_POST["rollno"];
    $date=$_POST["date"];
    $transactionid=$_POST["transactionid"];
    $admission_fee = $_POST["admission_fee"];
    $tuition_fee = $_POST["tuition_fee"];
    $book_fee = $_POST["book_fee"];
    $uniform_fee = $_POST["uniform_fee"];
    $hostel_fee = $_POST["hostel_fee"];
    $caution_deposit_hostel= $_POST["caution_deposit_hostel"];
    $transport_fee = $_POST["transport_fee"];
    $examination_fee= $_POST["examination_fee"];
    $library_fee= $_POST["library_fee"];
    $placement_training_fee= $_POST["placement_training_fee"];
    $others_fee= $_POST["others_fee"];
    $total=$_POST["total"];
    $paymentMethod=$_POST["paymentMethod"];
    $paymentCode=$_POST["paymentCode"];
    $currentYear=$_POST["currentYear"];

    // Update the feesentries table by subtracting the values based on rollno
   $sql_update_feesntries= "UPDATE feesntries
                           SET admission_fee = admission_fee - '$admission_fee',
                               tuition_fee = tuition_fee - '$tuition_fee',
                               book_fee = book_fee - '$book_fee',
                               uniform_fee = uniform_fee - '$uniform_fee',
                               hostel_fee = hostel_fee - '$hostel_fee',
                               caution_deposit_hostel = caution_deposit_hostel - '$caution_deposit_hostel',
                               transport_fee = transport_fee - '$transport_fee',
                               examination_fee = examination_fee - '$examination_fee',
                               library_fee = library_fee - '$library_fee',
                               placement_training_fee = placement_training_fee - '$placement_training_fee',
                               others_fee = others_fee - '$others_fee',
                               total = total - '$total'
                           WHERE rollno = '$rollno'";

    if ($conn->query($sql_update_feesntries) === TRUE) {
        // Values subtracted successfully, now insert into paidfees table based on rollno
        $sql_insert_paidfees = "INSERT INTO paidfees (rollno, date,transactionid, admission_fee, tuition_fee, book_fee, uniform_fee, hostel_fee, caution_deposit_hostel, transport_fee, examination_fee, library_fee, placement_training_fee, others_fee, total,paymentMethod,paymentCode,currentYear)
                                VALUES ('$rollno', '$date','$transactionid', '$admission_fee', '$tuition_fee', '$book_fee', '$uniform_fee', '$hostel_fee', '$caution_deposit_hostel', '$transport_fee', '$examination_fee', '$library_fee', '$placement_training_fee', '$others_fee', '$total','$paymentMethod','$paymentCode','$currentYear')";

        if ($conn->query($sql_insert_paidfees) === TRUE) {
            
            
        } else {
            echo "Error inserting into paidfees table: " . $conn->error;
        }
    } else {
        echo "Error updating feesntriestable: " . $conn->error;
    }

    $conn->close();
}
?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Transaction</title>
</head>
<body>
    <center>

    <h1>Process Transaction</h1>

    
    <form method='post' action='copy.php'>
        <label for="rollno">Roll Number:</label>
        <input type="text" name="rollno"  value="<?php echo $rollno; ?>" required>
        <!-- Input field to display the transaction ID -->
        <label for="transactionId">Transaction ID:</label>
        <input type="text" id="transactionId" name="transactionid" value="<?php echo $transactionid; ?>" >


        <!-- Submit button to continue to another PHP page -->
        <button type="submit">Continue</button>
    </form>
    </center>
</body>
</html>

