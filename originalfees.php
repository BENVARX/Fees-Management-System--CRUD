<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Student</title>
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
top:40%;
border-color:black;       
height: 15%;
width:90%;
border-collapse: collapse;
}.submit{
position: absolute;
right: 320px;
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
left: 590px; 
top: 190px;
font-family: poppins;
font-size: 30px;
color: grey;
}.total{
position:absolute;
left: 78%;
top:44%;
font-family: poppins;
font-size: 20px;
color: green;
}.back{
   position: absolute;
   top: 150px;
   right: 800px;
}.backtomenu{
   position:absolute;
   top:150px;
   right:700px;
}.results{
position:absolute;
left: 39%;
top:37%;
font-family: poppins;
font-size: 15px;
color: red;
}th{
color: white;
}.name{
        position:absolute;
        left: 5%;
        top:43%;
        font-family: poppins;
        font-size: 20px;}
</style>
</head>
<body>
    <h1>Enter The Rollno To Search Student Fees</h1>
    <form method="post">
   
    <div class="label2">
        <input type="text" style="border-radius:15px;border:2px solid black;width: 650px;height: 20px;padding:7px;" id="roll_number" name="roll_number" placeholder="Enter the rollno" required>
    </div>
    <div class="submit">
        <button style="padding: 0px 0px 0px 0px;margin-left: 15px; background-color: #000000;border-radius: 15px;border:2px solid black; color:white;width: 80px;height: 38px;" type="submit">Search</button>
    </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Get the roll number from the form submission
        $rollno = $_POST['roll_number']; // Corrected

        // Query to fetch student's details based on roll number
        $sql = "SELECT entries.first_name, entries.last_name, feesreduction.rollno, feesreduction.admission_fee, feesreduction.tuition_fee,feesreduction.book_fee,feesreduction.uniform_fee,feesreduction.hostel_fee,feesreduction.caution_deposit_hostel,feesreduction.transport_fee,feesreduction.examination_fee,feesreduction.library_fee,feesreduction.placement_training_fee,feesreduction.others_fee,feesreduction.total FROM entries INNER JOIN feesreduction ON entries.rollno = feesreduction.rollno WHERE feesreduction.rollno = '$rollno'";
        
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display data in a table
            echo "<h2 style='position:absolute;top:20%;'>Search Result</h2>";
          
            echo "<table border='1'>";
            
            echo "<tr style='background-color:#FDA618;'><th>Rollno</th><th>Admissionfee</th><th>Tuitionfee</th><th>Bookfee</th><th>Uniformfee</th><th>Hostelfee</th><th>Cautiondeposithostel</th><th>Transportfee</th><th>Examinationfee</th><th>Libraryfee</th><th>Placementfee</th><th>Otherfee</th><th>Total Amount</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<p class='name' style='position:absolute;top:30%; color:green;'>Student Name: " . $row["first_name"] . " " . $row["last_name"] . "</p>";
                echo "<tr>";
                echo "<td>" . $row["rollno"] . "</td>";
                echo "<td>" . $row["admission_fee"] . "</td>";
                echo "<td>" . $row["tuition_fee"] . "</td>";
                echo "<td>" . $row["book_fee"] . "</td>";
                echo "<td>" . $row["uniform_fee"] . "</td>";
                echo "<td>" . $row["hostel_fee"] . "</td>";
                echo "<td>" . $row["caution_deposit_hostel"] . "</td>";
                echo "<td>" . $row["transport_fee"] . "</td>";
                echo "<td>" . $row["examination_fee"] . "</td>";
                echo "<td>" . $row["library_fee"] . "</td>";
                echo "<td>" . $row["placement_training_fee"] . "</td>";
                echo "<td>" . $row["others_fee"] . "</td>";
                echo "<td>" . $row["total"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='results'>No results found</p>";
        }

        $conn->close();
    }
    ?>
    <script>
        function redirectToNewPage() {
            // Redirect to the new page without adding an entry to the browser history
            window.location.replace("entryindex1.html");

            // Alternatively, you can use window.location.href:
            // window.location.href = "new_page.html";
        }
    </script>
    <script>
function printAndRedirect() {
    window.print(); // Print the page
    setTimeout(function() {
        window.location.href = "Home Page.html"; // Redirect to home page after 1 second
    }, 1000);
}
</script>
   
</div>
</body>
</html>
