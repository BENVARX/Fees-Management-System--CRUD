<!DOCTYPE html>
<html>
<head>
    <title>Search Transaction History month</title>
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
        left:5%;
        top:53%;
        border-color:black;       
        height: 15%;
       
        border-collapse: collapse;
       }.submit{
        position: absolute;
        right: 300px;
        top: 80px;

        
       }h1{
        position: absolute;
        left: 425px; 
        top: 0px;
        font-weight: 20px;
        
       }.label2{
        position: absolute;
        font-family: poppins;
        font-size: 20px;
        left: 400px;
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
        top:44%;
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
       }
    </style>
</head>
<body>
    <h1>Search Transaction History Using Month</h1>
    <form method="post">
  
       
         <div class="label2">
        <input type="text" style="border-radius:15px;border:2px solid black;width: 650px;height: 20px;padding:7px;" id="search_month" name="search_month" placeholder="YYYY-MM" required><br><br>
         </div>
        <div class="submit">
        <input  style="padding: 0px 0px 0px 0px;margin-left: 15px; background-color: #000000;border-radius: 15px;border:2px solid black; color:white;width: 80px;height: 38px;"  type="submit" value="Search">
        </div>
    </form>

    <?php
    // Database configuration
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

    // Initialize variables
  
    $search_month = isset($_POST['search_month']) ? $_POST['search_month'] : '';
  

    if (!empty($search_date) || !empty($search_month) || !empty($search_year)) {
        // Query to get transactions based on date, month, and year
        $sql = "SELECT rollno,transactionid,date,admission_fee,tuition_fee,book_fee,uniform_fee,hostel_fee,caution_deposit_hostel,transport_fee,examination_fee,library_fee,placement_training_fee,others_fee, total FROM paidfees WHERE DATE(date) = ? OR DATE_FORMAT(date, '%Y-%m') = ? OR DATE_FORMAT(date, '%Y') = ?";

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $search_date, $search_month, $search_year);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<h2>Transactions Found</h2>";
            echo "<table border='1'>";
            echo "<tr style='background-color:black;'><th>Rollno</th><th>Transactionid</th><th>Date</th><th>Admissionfee</th><th>Tuitionfee</th><th>Bookfee</th><th>Uniformfee</th><th>Hostelfee</th><th>Cautiondeposithostel</th><th>Transportfee</th><th>Examinationfee</th><th>Libraryfee</th><th>Placementfee</th><th>Otherfee</th><th>Total Amount</th></tr>";
            $total_amount = 0;
            while ($row = $result->fetch_assoc()) {
                $rollno = $row["rollno"];
                $transactionid = $row["transactionid"];
                $date = $row["date"];
                $admission_fee=$row["admission_fee"];
                $tuition_fee=$row["tuition_fee"];
                $book_fee=$row["book_fee"];
                $uniform_fee=$row["uniform_fee"];
                $hostel_fee=$row["hostel_fee"];
                $caution_deposit_hostel=$row["caution_deposit_hostel"];
                $transport_fee=$row["transport_fee"];
                $examination_fee=$row["examination_fee"];
                $library_fee=$row["library_fee"];
                $placement_training_fee=$row["placement_training_fee"];
                $others_fee=$row["others_fee"];
                $total=$row["total"];
                $total_amount +=$total;
                echo "<tr><td>$rollno</td><td>$transactionid</td><td>$date</td><td> $admission_fee</td><td>$tuition_fee</td><td>$book_fee</td><td>$uniform_fee</td><td>$hostel_fee</td><td> $caution_deposit_hostel</td><td> $transport_fee</td><td> $examination_fee</td><td>$library_fee</td><td>$placement_training_fee</td><td>$others_fee</td><td>$total</td></tr>";
            }
            echo "</table>";
            echo "<p class='total'>Total Amount: $total_amount</p>";
        } else {
            echo "<p class='results'>No transactions found for the specified  month.</p>";
        }

        $stmt->close();
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>Please enter a valid search  month</p>";
        }
    }

    $conn->close();
    ?>
   


</body>
</html>
