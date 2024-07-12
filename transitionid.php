<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .transition-box{
            position:absolute;
            width: 150px;
            padding: 10px;
            
            margin-left:150px ;
            margin-top:0px;
            
        }.transition{
            position: absolute;
            margin-left: auto;
            margin-top: 0px;
        }
        
        
    
    </style>
    <title>Display Transition Number</title>
</head>
<body>

<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a table if it doesn't exist
$sql = "
    CREATE TABLE IF NOT EXISTS transitions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        transition_number VARCHAR(255) UNIQUE,
        other_columns TEXT
    )
";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

function generateTransitionNumber() {
    // Generate a unique transition number using the uniqid function
    return uniqid();
}

function saveTransitionToDatabase($transitionNumber, $otherData) {
    global $conn;

    // Insert the transition data into the database
    $sql = "
        INSERT INTO transitions (transition_number, other_columns)
        VALUES ('$transitionNumber', '$otherData')
    ";

    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        // Handle the case where the transition_number is not unique
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Example usage:
$newTransitionNumber = generateTransitionNumber();
$otherData = "Your additional data here";

saveTransitionToDatabase($newTransitionNumber, $otherData);

// Close the database connection when done
$conn->close();

?>
<div class="transition"><h4>Transition Number:</h4></div>
<input type="text" class="transition-box" value="    <?php echo $newTransitionNumber; ?>" readonly>
</body>
</html>