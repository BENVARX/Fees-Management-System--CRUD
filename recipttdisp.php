<?php
// Start the session
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
    }     
$transactionid = $_POST["transactionid"];
// Retrieve the transaction ID from the session
$transactionId = isset($_SESSION['transactionid']) ? $_SESSION['transactionid'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Process Transaction</title>
</head>
<body>

    <h1>Process Transaction</h1>

    
    <form method='post' action='copy.php'>
        <label for="rollno">Roll Number:</label>
        <input type="text" name="rollno" required>
        <!-- Input field to display the transaction ID -->
        <label for="transactionId">Transaction ID:</label>
        <input type="text" id="transactionId" name="transactionid" value="<?php echo $transactionId; ?>" readonly>

        <!-- Submit button to continue to another PHP page -->
        <button type="submit">Continue</button>
    </form>

</body>
</html>
