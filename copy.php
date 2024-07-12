<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECEIPT</title>
   
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
         
    

      
       
        body{
           
           font-family: "poppins", sans-serif;
           font-weight: 500;
  

        }
   
        table {
            width: 70%;
            border-collapse: collapse;
            margin-left: auto;
            margin-top: 100px;

            margin-right: auto;
        }
        table, th, td {
            border: 1px solid orange;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .print-button {
            margin-top: 20px;
        }
        .box{
            
            height: 200px;
            width:100%;
            background-color: orange;
            font-size: 14px;

        }
        .box1{
           
           margin-top: auto;
            margin-left:75px;
            margin-right: auto;
            margin-bottom: auto;
            padding: 10px 0px 0px 0px;
        }.img1{
            position: absolute;
            padding-top: 20px;
            top: -45px;
            left: -40px;
        }
            
            
        
        .Heading1{
            position:absolute;
            top: 197px;
            left:10px;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            color: black;
            font-size: 25px;
        }
        .Heading2{
            position: absolute;
            top: 200px;
            left: 50px;
           
           font-size: 25px;
            font-weight: bold;
            font-family: 'Roboto', sans-serif;
            color: orange;
           
            
            
            
           
        }.date{
            position: absolute;
            right:50px;
            
            text-align: right;
            top: 245px;
        }.firstname{
            position: absolute;
            right:50px;
            top:270px;
        }.department{
            position: absolute;
            right:3px;
            top:295px; 
        }.timestamp{
            position: absolute;
            right:3px;
           top: 940px;
        }.print-button{
            position: absolute;
            top:3px;
           top: 935px;
           border: 1px;
           border-radius: 5px;
           color:orange;
           background-color: black;
           height: 30px;
           width: 60px;

        }.thead{
            position: absolute;
            background-color: orange;
        }.line{
            position: absolute;
            top: 955px;
            left:260px;
            font-size: 15px;
        }.id{
            position: absolute;
            top: 280px;
        }.rollno{
            position: absolute;
            top: 250px;
           
        } hr {
      border: 1px solid #000; /* Set the line color */
      margin: 0px 0; /* Set margin for spacing */
    }
    </style>
</head>
<body>

<div class="box" style="font-family:poppins">
<div class="img1">
      <img src="collegelogo.png" style="height:250px;width:250px;"> 
     </div>
   
    <div class="box1">
     
       <center>
    <p style="color: black; ">Pollachi Institute of Engineering and Technology</p>
    <p style="color:black;">(Hayagreeva Institutions)</p>
    <p style="color:black;">Approved by AICTE ,New Delhi & Affliated by Anna University,Chennai</p>
    <p style="color:black;">Poosaripatti,Pollachi</p>
    
        </center>
    </div>
   
    <p class = "Heading1" >PIE</p><center><p class = "Heading2" >VALUT</p></center>
</div>
<hr>
<div class="line">WWW Pietech.com</div>
<?php
// ... (your HTML and CSS code remains unchanged)

// Check if the form is submitted
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'mydatabase';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Create a connection to the database
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch student data from the database based on the provided roll number
    $rollno = $_POST['rollno'];
    $transactionid=$_POST["transactionid"];

    // Query to fetch data from the tables using JOIN
    $sql = "SELECT entries.first_name, entries.last_name,entries.department_name, paidfees.admission_fee, paidfees.tuition_fee, paidfees.book_fee,paidfees.uniform_fee,paidfees.hostel_fee,paidfees.caution_deposit_hostel,paidfees.transport_fee,paidfees.examination_fee,paidfees.library_fee,paidfees.placement_training_fee,paidfees.others_fee,paidfees.total,feesntries.rollno,paidfees.date,paidfees.receipts,paidfees.paymentMethod
            FROM entries
            LEFT JOIN feesntries ON entries.rollno = feesntries.rollno
            LEFT JOIN paidfees ON entries.rollno = paidfees.rollno
            WHERE paidfees.transactionid = '$transactionid'";
    
    // Execute the query
    $result = $conn->query($sql);

    // Check for errors in the query execution
    if (!$result) {
        die("Error in query: " . $conn->error);
    }

    // Fetch the result as an associative array
    $studentData = $result->fetch_assoc();

    if ($studentData) {

        echo "
       <center><h3>Fees Payment $studentData[paymentMethod] Receipt</h3></center>
        <p class='id' style='font-size:15px;font-family:poppins;'>Receipt Number:$studentData[receipts]</p>
        <p class='date'style='font-size:15px;'>Date:$studentData[date]</p>
        <p   class='rollno'style='font-size:15px;'>Roll Number:$studentData[rollno]</p>
        <p class='firstname' style='font-size:15px;'>Name:$studentData[first_name]  $studentData[last_name]</p>
        <p class='department' style='font-size:15px;'>Department name:$studentData[department_name]</p>
      
       
            <table >
                <tr ><th style='background-color:orange;'>SI NO</th><th style='background-color:orange;'>Description</th><th style='background-color:orange;'>Amount</th></tr>
                 <tr>
                  <td>1</td>
                    <td>Admission fee:</td>
                    <td>$studentData[admission_fee]</td>
                </tr>
                <tr>
                   <td>2</td>
                    <td>Tuition fee:</td>
                    <td>$studentData[tuition_fee]</td>
                </tr>
                <tr>
                <td>3</td>
                    <td>Book fee:</td>
                    <td>$studentData[book_fee]</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Uniform fee:</td>
                    <td>$studentData[uniform_fee]</td>
                </tr>
                <tr>
                   <td>5</td>
                    <td>Hostel fee:</td>
                    <td>$studentData[hostel_fee]</td>
                </tr>
                <tr>
                <td>6</td>
                    <td>Caution deposit hostel:</td>
                    <td>$studentData[caution_deposit_hostel]</td>
                </tr>
                <tr>
                <td>7</td>
                    <td>Transport fee:</td>
                    <td>$studentData[transport_fee]</td>
                </tr>
                <tr>
                <td>8</td>
                    <td>Examination fee:</td>
                    <td>$studentData[examination_fee]</td>
                </tr>
                <tr>
                <td>9</td>
                    <td>Library fee:</td>
                    <td>$studentData[library_fee]</td>
                </tr>
                <tr>
                <td>10</td>
                    <td>Placement training fee:</td>
                    <td>$studentData[placement_training_fee]</td>
                </tr>
                <tr>
                <td>11</td>
                    <td>Other fee:</td>
                    <td>$studentData[others_fee]</td>
                </tr>
                <tr>
                <td>12</td>
                    <td>Total:</td>
                    <td>$studentData[total]</td>
                </tr>
              
                
            </table>
            <p class='timestamp'>Timestamp or signature</p>
            <button class='print-button' onclick='printAndRedirect()'>Print</button>
        ";
        // Display the receipt information
        // ... (your existing code remains unchanged)
    } else {
        echo "Student not found.";
    }

    // Close the database connection
    $conn->close();
}
?>

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