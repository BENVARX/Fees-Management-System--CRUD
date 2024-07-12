<?php
session_start();
?>
<?php
// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $rollno = $_POST["rollno"];
    $department_name = $_POST["department_name"];
    $current_year = $_POST["current_year"];
    $batch = $_POST["batch"];
    $category = $_POST["category"];
    $Addreess = $_POST["Addreess"];
    $current_semester = $_POST["current_semester"];
    $registernumber = $_POST["registernumber"];
    $email = $_POST["email"];
    @$religion = $_POST["religion"];

    // Create a connection to the database (Assuming your MySQL username is "root" and password is empty)
    $conn = new mysqli("localhost", "root", "", "mydatabase");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Search if rollno already exists
$sql = "SELECT * FROM entries WHERE rollno = '$rollno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Roll no already exists
    header("Location: test1.php?error=Roll No already exists");
    exit();
} else {
    // Roll no doesn't exist, insert into the database
    $sql = "INSERT INTO entries (first_name, last_name, rollno, department_name, current_year, batch, category, Addreess, current_semester, registernumber, email, religion)
            VALUES ('$first_name', '$last_name', '$rollno', '$department_name', '$current_year', '$batch', '$category', '$Addreess', '$current_semester', '$registernumber', '$email', '$religion')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
$conn->close();
?>
