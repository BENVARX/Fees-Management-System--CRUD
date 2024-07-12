<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM feesntries WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $rollno = $row["rollno"];
    $admission_fee = $row["admission_fee"];
    $tuition_fee = $row["tuition_fee"];
    $book_fee = $row["book_fee"];
    $uniform_fee = $row["uniform_fee"];
    $hostel_fee = $row["hostel_fee"];
    $caution_deposit_hostel= $row["caution_deposit_hostel"];
    $transport_fee = $row["transport_fee"];
    $examination_fee= $row["examination_fee"];
    $library_fee= $row["library_fee"];
    $placement_training_fee= $row["placement_training_fee"];
    $others_fee= $row["others_fee"];
    $total=$row["total"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>rollno : </label>
                        <b><?php echo $row["rollno"]; ?></b>  
                    </div>
                    <div class="form-group">
                        <label>admission_fee : </label>
                        <b><?php echo $row["admission_fee"]; ?></b>   
                    </div>
                    <div class="form-group">
                        <label>tuition_fee : </label>
                        <b><?php echo $row["tuition_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>book_fee : </label>
                        <b><?php echo $row["book_fee"]; ?></b>       
                    </div>
                    <div class="form-group">
                        <label>uniform_fee : </label>
                        <b><?php echo $row["uniform_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>hostel_fee : </label>
                        <b><?php echo $row["hostel_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>caution_deposit_hostel : </label>
                        <b><?php echo $row["caution_deposit_hostel"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>transport_fee : </label>
                        <b><?php echo $row["transport_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>examination_fee : </label>
                        <b><?php echo $row["examination_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>library_fee : </label>
                        <b><?php echo $row["library_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>placement_training_fee : </label>
                        <b><?php echo $row["placement_training_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>others_fee : </label>
                        <b><?php echo $row["others_fee"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>total : </label>
                        <b><?php echo $row["total"]; ?></b>    
                    </div>
                    <p><a href="feesalteration.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</center>
</body>
</html>