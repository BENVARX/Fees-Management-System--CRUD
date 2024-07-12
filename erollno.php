<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <style>
        .screen {
            width: 100%;
            height: 100%;
            background-color: white;
            
        }


        #logout {
            top: 600px;
        }

        #logout, button {
            border-radius: 10px;
            font-family: 'Roboto', sans-serif;
            text-decoration: unset;
            text-align: center;
            width: 100px;
            padding: 5px;
            position: fixed;
            color: #000000;
            font-weight: bold;
        }

        #logout:hover {
            background-color: #030303;
        }

        .php-css {
            position: absolute;
            width: 500px;
            left: 400px;
            height: 357px;
            top: 190px;
            font-family: 'Roboto', sans-serif;
        }

        .html-css {
            position: absolute;
            left: 900px;
            top: 190px;
            font-family: 'Roboto', sans-serif;
        }

        .total {
            position: absolute;
            left: 902px;
            top: 517px;
        }

        .reset {
            position: absolute;
            left: 750px;
            top: 555px;
        }

        .totalbutton {
            position: absolute;
            left: 770px;
            top: 555px;
        }

        .proceedtonextpage {
            position: absolute;
            left: 790px;
            top: 670px;
        }

        .date {
            position: absolute;
            left: 990px;
            top: 50px;
            
        }.trans{
            position:absolute;
            left:640px;
            top:100px;
            
        }.pay{
            position:absolute;
            left: 800px;
            top: 560px;
            font-family:Roboto;
            border-color: 3px solid black;

        } .home{
            position: absolute;
            left:720px;
            top:605px;
        }
    </style>
</head>
<body>
    <div id="menu">
        <ul>
            <li><a href="Home Page.html"><h4>HOME</h4></a></li>
            <li><a style="font-family: 'poppins', sans-serif;" href="men.html">New Entry</a></li>
            <li><a href="entryindex.html" style="font-family: 'poppins', sans-serif;">Open Ledger</a></li>
            <li><a href="feesalteration.php" style="font-family: 'poppins', sans-serif;">Fees Alteration</a></li>
            <li><a href="entryindex1.html" style="font-family: 'poppins', sans-serif;">fees info</a></li>
            <li><a href="#" style="font-family: 'poppins', sans-serif;">Report</a></li>
        </ul>
    </div>

    <div id="logout">
        <button><a href="signin.html" style="font-family: 'Roboto', sans-serif; text-decoration:none;color:black;">Log Out</a></button>
    </div>
   

    <form action="feespay.php" method="POST">
        <div class="date">
            <p style="font-family: 'poppins', sans-serif;">Date</p>
            <input type="date" id="date" name="date" style="border:2px solid black;border-radius: 10px;" required readonly >
        </div>
        <div class="trans">
        <label for="transactionId" style="font-family: 'poppins', sans-serif;">Transaction ID:</label>
        <input type="text" id="transactionId" name="transactionid" style="font-family: 'poppins', sans-serif;" readonly>

        <!-- JavaScript to generate the transaction ID -->
        <script>
            // Generate a unique transaction ID using JavaScript
            document.getElementById("transactionId").value = generateTransactionId();

            // JavaScript function to generate a unique ID
            function generateTransactionId() {
                // You can use a more sophisticated method for generating IDs if needed
                return 'TXN' + Math.random().toString(36).substr(2, 9);
            }
        </script></div
        
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $rollno = $_POST["rollno"];
    $query = "SELECT admission_fee, tuition_fee, book_fee, uniform_fee, hostel_fee, caution_deposit_hostel, transport_fee, examination_fee, library_fee, placement_training_fee, others_fee, total FROM feesntries WHERE rollno = '$rollno'";
    $result = $conn->query($query);

    if ($result === false) {
        echo "Error executing the query: " . $conn->error;
    } else {
        $query = "
        SELECT e.current_year, e.first_name, e.last_name, f.rollno,
               (SELECT admission_fee FROM feesntries WHERE rollno = '$rollno') AS admission_fee,
               (SELECT tuition_fee FROM feesntries WHERE rollno = '$rollno') AS tuition_fee,
               (SELECT book_fee FROM feesntries WHERE rollno = '$rollno') AS book_fee,
               (SELECT uniform_fee FROM feesntries WHERE rollno = '$rollno') AS uniform_fee,
               (SELECT hostel_fee FROM feesntries WHERE rollno = '$rollno') AS hostel_fee,
               (SELECT caution_deposit_hostel FROM feesntries WHERE rollno = '$rollno') AS caution_deposit_hostel,
               (SELECT transport_fee FROM feesntries WHERE rollno = '$rollno') AS transport_fee,
               (SELECT examination_fee FROM feesntries WHERE rollno = '$rollno') AS examination_fee,
               (SELECT library_fee FROM feesntries WHERE rollno = '$rollno') AS library_fee,
               (SELECT placement_training_fee FROM feesntries WHERE rollno = '$rollno') AS placement_training_fee,
               (SELECT others_fee FROM feesntries WHERE rollno = '$rollno') AS others_fee,
               (SELECT total FROM feesntries WHERE rollno = '$rollno') AS total
        FROM entries AS e
        INNER JOIN feesentries AS f ON e.rollno = f.rollno
        WHERE f.rollno = '$rollno'";
        

        // Execute the query
        $result = $conn->query($query);

        // Check if the query was successful
        if ($result) {
            // Fetch associative array
            $row_data = array(); // Initialize an array to store fetched data
            while ($row = $result->fetch_assoc()) {
                // Output data from each row
                $displayRollNumber = $row['rollno'];
                echo '<link rel="stylesheet" type="text/css" href="rollno.css">';
                echo "<input type='text' value='$displayRollNumber' name='rollno' class='roll' readonly>";
                echo "Year: " . $row["current_year"] . ", Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
                
                // Store fetched data in the array
                $row_data[] = $row;
            }
        }
        
        echo '<table class="php-css" border=1>';
        echo "<tr><th>si no<th>Description</th><th>Amount</th></tr>";
        
        foreach ($row_data as $row) {
            // Displaying fee details
            echo "<tr>";
            echo "<td>1</td>";
            echo "<td>Admission Fee</td><td>{$row['admission_fee']}</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>2</td>";
            echo "<td>Tuition Fee</td><td>{$row['tuition_fee']}</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>3</td>";
            echo "<td>book_fee</td><td>{$row['book_fee']}</td>";
            echo "</tr>";
            echo "<td>4</td>";
            echo "<td>uniform_fee</td><td>{$row['uniform_fee']}</td>";
            echo "</tr>";
            echo "<td>5</td>";
            echo "<td>hostel_fee</td><td>{$row['hostel_fee']}</td>";
            echo "</tr>";
            echo "<td>6</td>";
            echo "<td>caution_deposit_hostel</td><td>{$row['caution_deposit_hostel']}</td>";
            echo "</tr>";
            echo "<td>7</td>";
            echo "<td>transport_fee</td><td>{$row['transport_fee']}</td>";
            echo "</tr>";
            echo "<td>8</td>";
            echo "<td>examination_fee</td><td>{$row['examination_fee']}</td>";
            echo "</tr>";
            echo "<td>9</td>";
            echo "<td>library_fee</td><td>{$row['library_fee']}</td>";
            echo "</tr>";
            echo "<td>10</td>";
            echo "<td>placement_training_fee</td><td>{$row['placement_training_fee']}</td>";
            echo "</tr>";
            echo "<td>11</td>";
            echo "<td>others_fee</td><td>{$row['others_fee']}</td>";
            echo "</tr>";
            echo "<td></td>";
            echo "<td>total</td><td>{$row['total']}</td>";
            echo "</tr>";
            // Continue with other fee details...
        }
        echo "</table>";
        
        // Close the connection
        $conn->close();
        
}
$rollno = $_POST["rollno"];
$sql = "SELECT admission_fee, tuition_fee, book_fee, uniform_fee, hostel_fee, caution_deposit_hostel, transport_fee, examination_fee, library_fee, placement_training_fee, others_fee FROM feesntries WHERE rollno = '$rollno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Output data of each row
$row = $result->fetch_assoc();
$admission_fee_from_table = $row["admission_fee"];
$tuition_fee_from_table = $row["tuition_fee"];
$book_fee_from_table = $row["book_fee"];
$uniform_fee_from_table = $row["uniform_fee"];
$hostel_fee_from_table = $row["hostel_fee"];
$caution_deposit_hostel_from_table = $row["caution_deposit_hostel"];
$transport_fee_from_table = $row["transport_fee"];
$examination_fee_from_table = $row["examination_fee"];
$library_fee_from_table = $row["library_fee"];
$placement_training_fee_from_table = $row["placement_training_fee"];
$others_fee_from_table = $row["others_fee"];
} else {
echo "0 results";
}
}
$conn->close();
?>

<table class="html-css" border="1">
<thead>
<tr>
    <th>pay</th>
</tr>
</thead>
<tbody>
<!-- Your input fields here -->
<tr>
<td><input type="text" id="value1" name="admission_fee" onchange="checkAdmissionFee()" value="<?php echo $admission_fee_from_table; ?>" style="width:200px;"></td><br>

</tr>
<tr>
<td><input type="number" id="value2" name="tuition_fee" onchange="checkTuitionFee()" value="<?php echo $tuition_fee_from_table; ?>" style="width:200px;"/></td>

</tr>

<td><input type="number" id="value3" name="book_fee" onchange="checkBookFee()" value="<?php echo $book_fee_from_table; ?>" style="width:200px;" /></td>
</tr>
<tr>

<td><input type="number" id="value4"  name="uniform_fee" onchange="checkUniformFee()" value="<?php echo $uniform_fee_from_table; ?>" style="width:200px;" /></td>
</tr>
<tr>

<td><input type="number" id="value5"  name="hostel_fee" onchange="checkHostelFee()" value="<?php echo $hostel_fee_from_table; ?>" style="width: 200px;"/></td>
</tr>
<tr>

<td><input type="number" id="value6" name="caution_deposit_hostel" onchange="checkCautionDepositHostel()" value="<?php echo $caution_deposit_hostel_from_table; ?>" style="width:200px;" /></td>
</tr>
<tr>

<td><input type="number" id="value7" name="transport_fee" onchange="checkTransportFee()" value="<?php echo $transport_fee_from_table; ?>" style="width:200px;" /></td>
</tr>
<tr>

<td><input type="number" id="value8" name="examination_fee" onchange="checkExaminationFee()" value="<?php echo $examination_fee_from_table; ?>" style="width:200px; "/></td>
</tr>
<tr>

<td><input type="number" id="value9"  name="library_fee" onchange="checkLibraryFee()" value="<?php echo $library_fee_from_table; ?>" style="width:200px;" /></td>
</tr>
<tr>

<td><input type="number"id="value10"  name="placement_training_fee" onchange="checkPlacementTrainingFee()" value="<?php echo $placement_training_fee_from_table; ?>" style="width:200px;" /></td>
</tr>
<tr>

<td><input type="number" id="value11" name="others_fee" onchange="checkOthersFee()" value="<?php echo $others_fee_from_table; ?>" style="width:200px;"/></td>
</tr>
</tbody>
</table>

<div class ="total">
<input type="number" id="sum" name="total" style="height:25px;width: 208px;border-color: #000000; " required> 
</div>
<div class="pay">
<label for="paymentMethod">Select Payment Method:</label>
<select id="paymentMethod"  name="paymentMethod"onchange="showInputBox()" style="height:25px;width:140px; border-color: 3px solid black;">
<option value="cash">Cash</option>
<option value="online">Online Payment</option>
</select>

<div id="inputBox"  style="display: none;">
<label for="paymentCode">Enter Payment Code:</label>
<input type="text" id="paymentCode" name="paymentCode">
</div>
</div>
<div class="proceedtonextpage">
<button type="submit"style="height: 40px; width: 330px; color:white;background-color: #000000; top:610px;" >Pay</button>
</div>
</form>
<div class="totalbutton">

<button  onclick="add()" style="height: 40px; width: 185px; color:white;background-color: #000000;left:600px">Total</button>        
</div>
<div class="reset">
<button type="reset" onclick="reset()" style="height: 40px; width: 185px; color:white;background-color: #000000;left:400px ">Reset </button>
</div>
<div class="home">
<a href = "feesdisp.html">
<button type="button" name="Back1" value="Back1" style="color: white; background-color: black; height: 50px; width: 50px; padding: 0px 0px 0px 0px;border-radius:50%;border:2px solid black;">BACK</button>
</a></div>
<script>
// Get current date
var currentDate = new Date();

// Format date as desired (e.g., "2024-04-04")
var formattedDate = currentDate.toISOString().slice(0, 10);

// Set the value of the input box to the formatted date
document.getElementById('date').value = formattedDate;
</script>
<script>
function showInputBox() {
var paymentMethod = document.getElementById("paymentMethod").value;
var inputBox = document.getElementById("inputBox");
if (paymentMethod === "online") {
inputBox.style.display = "block";
} else {
inputBox.style.display = "none";
}
}
</script>
<script type="text/javascript">
function reset()
{
document.getElementById("value1").value="";
document.getElementById("value2").value="";
document.getElementById("value3").value="";
document.getElementById("value4").value="";
document.getElementById("value5").value="";
document.getElementById("value6").value="";
document.getElementById("value7").value="";
document.getElementById("value8").value="";
document.getElementById("value9").value="";
document.getElementById("value10").value="";
document.getElementById("value11").value="";
document.getElementById("sum").value="";

}
function add()
{
var num1=Number(document.getElementById("value1").value);
var num2=Number(document.getElementById("value2").value);
var num3=Number(document.getElementById("value3").value);
var num4=Number(document.getElementById("value4").value);
var num5=Number(document.getElementById("value5").value);
var num6=Number(document.getElementById("value6").value);
var num7=Number(document.getElementById("value7").value);
var num8=Number(document.getElementById("value8").value);
var num9=Number(document.getElementById("value9").value);
var num10=Number(document.getElementById("value10").value);
var num11=Number(document.getElementById("value11").value);
var sum=num1+num2+num3+num4+num5+num6+num7+num8+num9+num10+num11;
document.getElementById("sum").value=String(sum);
}
</script>



<script>
function checkAdmissionFee() {
var admissionFeeInput = document.getElementById('value1');
var enteredValue = admissionFeeInput.value;
var admissionFeeFromTable = <?php echo $admission_fee_from_table; ?>;

if (enteredValue > admissionFeeFromTable) {
alert("Entered admission fee cannot be higher than the fee from the table.");
admissionFeeInput.value = admissionFeeFromTable;
}
}

function checkTuitionFee() {
var tuitionFeeInput = document.getElementById('value2');
var enteredValue = tuitionFeeInput.value;
var tuitionFeeFromTable = <?php echo $tuition_fee_from_table; ?>;

if (enteredValue > tuitionFeeFromTable) {
alert("Entered tuition fee cannot be higher than the fee from the table.");
tuitionFeeInput.value = tuitionFeeFromTable;
}
}

function checkBookFee() {
var bookFeeInput = document.getElementById('value3');
var enteredValue = bookFeeInput.value;
var bookFeeFromTable = <?php echo $book_fee_from_table; ?>;

if (enteredValue > bookFeeFromTable) {
alert("Entered book fee cannot be higher than the fee from the table.");
bookFeeInput.value = bookFeeFromTable;
}
}

function checkUniformFee() {
var uniformFeeInput = document.getElementById('value4');
var enteredValue = uniformFeeInput.value;
var uniformFeeFromTable = <?php echo $uniform_fee_from_table; ?>;

if (enteredValue > uniformFeeFromTable) {
alert("Entered uniform fee cannot be higher than the fee from the table.");
uniformFeeInput.value = uniformFeeFromTable;
}
}

function checkHostelFee() {
var hostelFeeInput = document.getElementById('value5');
var enteredValue = hostelFeeInput.value;
var hostelFeeFromTable = <?php echo $hostel_fee_from_table; ?>;

if (enteredValue > hostelFeeFromTable) {
alert("Entered hostel fee cannot be higher than the fee from the table.");
hostelFeeInput.value = hostelFeeFromTable;
}
}

function checkCautionDepositHostel() {
var cautiondeposithostelInput = document.getElementById('value6');
var enteredValue = cautiondeposithostelInput.value;
var cautiondeposithostelFromTable = <?php echo $caution_deposit_hostel_from_table; ?>;

if (enteredValue > cautiondeposithostelFromTable) {
alert("Entered cautiondeposit fee cannot be higher than the fee from the table.");
cautiondeposithostelInput.value = cautiondeposithostelFromTable;
}
}

function checkTransportFee() {
var transportFeeInput = document.getElementById('value7');
var enteredValue = transportFeeInput.value;
var transportFeeFromTable = <?php echo $transport_fee_from_table; ?>;

if (enteredValue > transportFeeFromTable) {
alert("Entered transport fee cannot be higher than the fee from the table.");
transportFeeInput.value = transportFeeFromTable;
}
}

function checkExaminationFee() {
var examinationFeeInput = document.getElementById('value8');
var enteredValue = examinationFeeInput.value;
var examinationFeeFromTable = <?php echo $examination_fee_from_table; ?>;

if (enteredValue > examinationFeeFromTable) {
alert("Entered examination fee cannot be higher than the fee from the table.");
examinationFeeInput.value = examinationFeeFromTable;
}
}

function checkLibraryFee() {
var libraryFeeInput = document.getElementById('value9');
var enteredValue = libraryFeeInput.value;
var libraryFeeFromTable = <?php echo $library_fee_from_table; ?>;

if (enteredValue > libraryFeeFromTable) {
alert("Entered library fee cannot be higher than the fee from the table.");
libraryFeeInput.value = libraryFeeFromTable;
}
}

function checkPlacementTrainingFee() {
var placementtrainingFeeInput = document.getElementById('value10');
var enteredValue = placementtrainingFeeInput.value;
var placementtrainingFeeFromTable = <?php echo $placement_training_fee_from_table; ?>;

if (enteredValue > placementtrainingFeeFromTable) {
alert("Entered placement training fee cannot be higher than the fee from the table.");
placementtrainingFeeInput.value = placementtrainingFeeFromTable;
}
}

function checkOthersFee() {
var othersFeeInput = document.getElementById('value11');
var enteredValue = othersFeeInput.value;
var othersFeeFromTable = <?php echo $others_fee_from_table; ?>;

if (enteredValue > othersFeeFromTable) {
alert("Entered others fee cannot be higher than the fee from the table.");
othersFeeInput.value = othersFeeFromTable;
}
}


</script>


</div>
</body>
</html>

