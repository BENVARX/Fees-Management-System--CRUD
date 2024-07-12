<?php
// Replace these with your actual database credentials
$host = 'localhost';
$dbname = 'mydatabase';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get input values from the form
    $department_name = $_POST['department_name'];
    $category = $_POST['category'];

    // Prepare and execute the SQL query with JOIN and GROUP BY
    $query = "SELECT SUM(fe.total) as total_fee_sum
              FROM entries en
              JOIN feesntries fe ON en.rollno = fe.rollno
              WHERE en.department_name = :department_name AND en.category = :category";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':department_name', $department_name);
    $stmt->bindParam(':category', $category);
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display the results
    echo "<h2>Total Fee Information</h2>";
    echo "<p>Department: " . $department_name . "</p>";
    echo "<p>Category: " . $category . "</p>";
    echo "<p>Total Fee Sum: $" . $results['total_fee_sum'] . "</p>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;
?>
