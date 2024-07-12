<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <style>
        body {
            background-color:white;
            font-family: 'Roboto', sans-serif;
        }

        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: black;
            color: white;
            width: 100px;
        }

        input {
            width: 40%;
            height: 5%;
            border: 1px;
            border-radius: 5px;
            padding: 8px 15px 8px 0px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }.back{
            position: absolute;
            top: 300px;
            right: 775px;
        }.backtomenu{
            position:absolute;
            top:300px;
            right:675px;
        }
        
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Search Data</title>
</head>

<body>
    <center>
        <h1 style = "font-weight: bold; font-family: 'poppins', sans-serif;">Enter the roll number to search fees</h1>
        <div class ="search">
        <form action="" method="post">
            
             <input type="text" name="rollno" style="border-radius:15px;border:1px solid black;width: 500px;height: 40px; padding-left: 10px;" placeholder="  Enter your roll number"/>
            <input type="submit" name="search"  style="padding: 0px 0px 0px 0px;margin-left: 25px; background-color: #000000;border-radius: 15px; color:white;width: 80px;height: 40px;" value="Search">
        </form>
        </div>
        <?php
        $connection = mysqli_connect("localhost", "root", "", "mydatabase");

        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['search'])) {
            $rollno = mysqli_real_escape_string($connection, $_POST['rollno']);
            $query = "SELECT * FROM feesreduction WHERE rollno='$rollno'";
            $query_run = mysqli_query($connection, $query);

            if (!$query_run) {
                die("Error in query: " . mysqli_error($connection));
            }

            if (mysqli_num_rows($query_run) > 0) {
                echo '<table>';
                echo "<thead>";
                echo "<tr>";
                echo "<th>#</th>";
                echo "<th>Roll Number</th>";
                echo "<th>Admission Fee</th>";
                echo "<th>Tuition Fee</th>";
                echo "<th>Book Fee</th>";
                echo "<th>Uniform Fee</th>";
                echo "<th>Hostel Fee</th>";
                echo "<th>Caution Deposit Hostel</th>";
                echo "<th>Transport Fee</th>";
                echo "<th>Examination Fee</th>";
                echo "<th>Library Fee</th>";
                echo "<th>Placement Training Fee</th>";
                echo "<th>Others Fee</th>";
                echo "<th>Total</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_array($query_run)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['rollno'] . "</td>";
                    echo "<td>" . $row['admission_fee'] . "</td>";
                    echo "<td>" . $row['tuition_fee'] . "</td>";
                    echo "<td>" . $row['book_fee'] . "</td>";
                    echo "<td>" . $row['uniform_fee'] . "</td>";
                    echo "<td>" . $row['hostel_fee'] . "</td>";
                    echo "<td>" . $row['caution_deposit_hostel'] . "</td>";
                    echo "<td>" . $row['transport_fee'] . "</td>";
                    echo "<td>" . $row['examination_fee'] . "</td>";
                    echo "<td>" . $row['library_fee'] . "</td>";
                    echo "<td>" . $row['placement_training_fee'] . "</td>";
                    echo "<td>" . $row['others_fee'] . "</td>";
                    echo "<td>" . $row['total'] . "</td>";
                                                        echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo '<div style="margin-top: 20px;">No records were found for the given roll number.</div>';
            }
        }

        mysqli_close($connection);
        ?>
    </center>
    <center>
    <div class="back" >
   <a href = "entryindex.html">
    <button type="button" name="Back" value="Back" style="color: white; background-color: black; height: 30px; width: 80px; padding: 0px 0px 0px 0px;border-radius:10px;border:2px solid black;">Back</button>
   </a>
    </div>
   <div class="backtomenu">
<a href = "Home Page.html">
    <button type="button" name="Back" value="Back" style="color: white; background-color: black; height: 30px; width: 80px; padding: 0px 0px 0px 0px;border-radius:10px;border:2px solid black;">HOME</button>
   </a>

</div>
    </center>
</body>

</html>
