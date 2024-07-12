<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $rollno=$_POST["rollno"];
    $date=$_POST["date"];
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


    // Create a connection to the database (Assuming your MySQL username is "root" and password is empty)
    $conn = new mysqli("localhost", "root", "", "mydatabase");
    
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Insert data into the database
    $sql = "INSERT INTO feesntries(rollno,date,admission_fee,tuition_fee,book_fee,uniform_fee,hostel_fee,caution_deposit_hostel,transport_fee,examination_fee,library_fee,placement_training_fee,others_fee,total)
            VALUES ('$rollno','$date','$admission_fee','$tuition_fee','$book_fee','$uniform_fee','$hostel_fee','$caution_deposit_hostel','$transport_fee','$examination_fee','$library_fee','$placement_training_fee','$others_fee','$total')";
    if ($conn->query($sql) === TRUE) {
        echo "fees updated";
        header("location:success.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the connection
    $conn->close();
} else {
    // Redirect or display an error message if the form is not submitted using POST method
    echo "Invalid submisjjjjsion!";
}
?>