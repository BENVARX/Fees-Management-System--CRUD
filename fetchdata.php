<?php
$host = 'localhost';
$user = 'root';  // replace with your MySQL username
$pass = '';  // replace with your MySQL password

// Variables to store results
$userData = null;
$feeData = null;

if (isset($_POST['search'])) {
    $searchedUsername = $_POST['username'];

    // Connect to database1
    $db1 = new mysqli($host, $user, $pass, 'mydatabase');
    if ($db1->connect_error) {
        die("Connection failed to database1: " . $db1->connect_error);
    }

    // Fetch data from table1 in database1 based on searched username
    $stmt1 = $db1->prepare("SELECT * FROM entries WHERE username = "");
    $stmt1->bind_param("s", $searchedUsername);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    $userData = $result1->fetch_assoc();

    // Connect to database2
    $db2 = new mysqli($host, $user, $pass, 'fees_entry');
    if ($db2->connect_error) {
        die("Connection failed to database2: " . $db2->connect_error);
    }

    // Fetch data from table2 in database2 based on some logic 
    // (you might need to adjust this based on how you relate the data between the two tables)
    $stmt2 = $db2->prepare("SELECT * FROM feesentry WHERE username = adersh");
    $stmt2->bind_param("s", $someValue);  // Adjust this according to your logic
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $feeData = $result2->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search and Display Data</title>
</head>
<body>

<!-- Search form -->
<form action="" method="post">
    <label for="username">Search by Username:</label>
    <input type="text" name="username" required>
    <input type="submit" name="search" value="Search">
</form>

<?php if ($userData): ?>
<h2>User Details</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
    </tr>
    <tr>
        <td><?php echo $userData['id']; ?></td>
        <td><?php echo $userData['first_name']; ?></td>
        <td><?php echo $userData['last_name']; ?></td>
    </tr>
</table>
<?php endif; ?>

<?php if ($feeData): ?>
<h2>Fees Details</h2>
<table border="1">
    <tr>
        <th>Tuition Fees</th>
        <th>Exam Fees</th>
        <th>Placement Fees</th>
    </tr>
    <tr>
        <td><?php echo $feeData['student_name']; ?></td>
        <td><?php echo $feeData['date']; ?></td>
        <td><?php echo $feeData['admission_fee']; ?></td>
    </tr>
</table>
<?php endif; ?>

</body>
</html>
