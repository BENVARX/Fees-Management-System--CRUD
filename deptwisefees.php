<!DOCTYPE html>
<html>
<head>
    <title>Search Student Fees</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>

body{
   font-family:  'Roboto';
}
table{
position: absolute;
left:2%;
top:50%;
border-color:black;       
height: 15%;
width: 95%;
border-collapse: collapse;
}.submit{
position: absolute;
right: 270px;
top: 80px;


}h1{
position: absolute;
left: 525px; 
top: 0px;
font-weight: 20px;

}.label1{
position: absolute;
font-family: poppins;
font-size: 20px;
left: 380px;
top: 80px;

}.label2{
position: absolute;
font-family: poppins;
font-size: 20px;
left: 750px;
top: 80px;

}h2{
position: absolute;
left: 560px; 
top: 190px;
font-family: poppins;
font-size: 30px;
color: grey;
}.total{
position:absolute;
left: 82%;
top:42.5%;
font-family: poppins;
font-size: 20px;
color: green;
}.results{
position:absolute;
left: 39%;
top:37%;
font-family: poppins;
font-size: 15px;
color: red;
}th{
color: white;
}.note{
        position: absolute;
        left: 520px;
        top: 250px;
        font-family: poppins;
        font-size: 15px;
        color: red;
       }
</style>
    
</head>
<body>

<h1>Search Batch Fees</h1>
<form method="post">
<div class="label1">
<select style="border-radius:15px;border:2px solid black;width: 350px;height: 35px;padding:7px;" id="department" name="department" placeholder="Select Department">
    <!-- Your department options here -->
    <option value="">Select Department</option>
            <option value="cse">CSE</option>
            <option value="ece">ECE</option>
            <option value="mech">MECH</option>
            <option value="civil">CIVIL</option>
            <option value="eee">EEE</option>
            <option value="ai&ds">AI&DS</option>
</select><br>
</div>
<div class="label2">

<select style="border-radius:15px;border:2px solid black;width: 350px;height: 35px;padding:7px;" id="batch" name="batch"  placeholder="Select Batch">
<option value="">Select Batch</option>
                <option value="2015-2019">2015-2019</option>
                <option value="2016-2020">2016-2020</option>
                <option value="2017-2021">2017-2021</option>
                <option value="2018-2022">2018-2022</option>
                <option value="2019-2023">2019-2023</option>
                <option value="2020-2024">2020-2024</option>
                <option value="2021-2025">2021-2025</option>
                <option value="2022-2026">2022-2026</option>
                <option value="2023-2027">2023-2027</option>
                <option value="2024-2028">2024-2028</option>
                <option value="2025-2029">2025-2029</option>
                <option value="2026-2030">2026-2030</option>
                <option value="2027-2031">2027-2031</option>
                <option value="2028-2032">2028-2032</option>
                <option value="2029-2033">2029-2033</option>
                <option value="2030-2034">2030-2034</option>
                <option value="2031-2035">2031-2035</option>
                <option value="2032-2036">2032-2036</option>
                <option value="2033-2037">2033-2037</option>
                <option value="2034-2038">2034-2038</option>
                <option value="2035-2039">2035-2039</option>
                <option value="2036-2040">2036-2040</option>
                <option value="2037-2041">2037-2041</option>
                <option value="2038-2042">2038-2042</option>
                <option value="2039-2043">2039-2043</option>
                <option value="2040-2044">2040-2044</option>
                <option value="2041-2045">2041-2045</option>
                <option value="2042-2046">2042-2046</option>
                <option value="2043-2047">2043-2047</option>
                <option value="2044-2048">2044-2048</option>
                <option value="2045-2049">2045-2049</option>
                <option value="2046-2050">2046-2050</option>
                <option value="2047-2051">2047-2051</option>
                <option value="2048-2052">2048-2052</option>
                <option value="2049-2053">2049-2053</option>
                <option value="2050-2054">2050-2054</option>
        
    <!-- Your batch options here -->
</select><br>
</div>
<div class="submit">
<input style="padding: 0px 0px 0px 0px;margin-left: 15px; background-color: #000000;border-radius: 15px;border:2px solid black; color:white;width: 80px;height: 38px;" type="submit" value="Search">
</div>

</form>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if department and batch are set and not empty
    if (isset($_POST["department"]) && !empty($_POST["department"]) &&
        isset($_POST["batch"]) && !empty($_POST["batch"])) {

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

        // Retrieve department and batch values from the form
        $department = $_POST["department"];
        $batch = $_POST["batch"];

        // Prepare SQL query
        $sql = "SELECT feesreduction.rollno, feesreduction.admission_fee, feesreduction.tuition_fee,feesreduction.book_fee,feesreduction.uniform_fee,feesreduction.hostel_fee,feesreduction.caution_deposit_hostel,feesreduction.transport_fee,feesreduction.examination_fee,feesreduction.library_fee,feesreduction.placement_training_fee,feesreduction.others_fee,feesreduction.total
                FROM feesreduction
                JOIN entries ON feesreduction.rollno = entries.rollno
                WHERE entries.department_name = ? AND entries.batch = ?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $department, $batch);

        // Execute the query
        $stmt->execute();

        // Bind result variables
        $stmt->bind_result($rollno, $admission_fee,$tuition_fee,$book_fee,$uniform_fee,$hostel_fee,$caution_deposit_hostel,$transport_fee,$examination_fee,$library_fee,$placement_training_fee,$others_fee, $total);


        // Display results in a table
        echo "<h2>Fee Details</h2>";
        echo "<table border='1'>";
        echo "<tr style='background-color:black;'><th>Rollno</th><th>Admissionfee</th><th>Tuitionfee</th><th>Bookfee</th><th>Uniformfee</th><th>Hostelfee</th><th>Cautiondeposithostel</th><th>Transportfee</th><th>Examinationfee</th><th>Libraryfee</th><th>Placementfee</th><th>Otherfee</th><th>Total Amount</th></tr>";
         $total_amount = 0;

        while ($stmt->fetch()) {
            $total_amount += $total;
            echo "<tr><td>$rollno</td><td>$admission_fee</td><td>$tuition_fee</td><td>$book_fee</td><td>$uniform_fee</td><td>$hostel_fee</td><td>$caution_deposit_hostel</td><td>$transport_fee</td><td>$examination_fee</td><td>$library_fee</td><td>$placement_training_fee</td><td>$others_fee</td><td>$total</td></tr>";
        }

        echo "</table>";
        echo "<p class='total'>Total Amount: $total_amount</p>";
        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "<p class='note'>Please select a department and batch.</p>";
    }
}
?>


</body>
</html>
