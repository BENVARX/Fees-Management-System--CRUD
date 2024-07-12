<?php
$success=0;
$user=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	 include 'connect.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="Select * from 'login'where username ='$username'";
	$result=mysqli_query($con,$sql);
  
    if ($result){
    	$num=mysqli_num_rows($result);
    	if($num>0){
    		$user=1;
    	}
    }
    
    // Insert data into the database
    $sql = "INSERT INTO entries (username,password)
            VALUES ('$username','$password')";
    if ($conn->query($sql) === TRUE) {
        echo "signup successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the connection
    $conn->close();
} else {
    // Redirect or display an error message if the form is not submitted using POST method
    echo "Invalid form submission!";
}
?>