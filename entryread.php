<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM entries WHERE id = ?";
    
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
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $department_name = $row["department_name"];
    $current_year = $row["current_year"];
    $batch = $row["batch"];
    $category= $row["category"];
    $Addreess = $row["Addreess"];
    $current_semester= $row["current_semester"];
    $registernumber= $row["registernumber"];
    $email= $row["email"];
    $phonenumber= $row["phonenumber"];
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
                        <label>first_name : </label>
                        <b><?php echo $row["first_name"]; ?></b>   
                    </div>
                    <div class="form-group">
                        <label>last_name : </label>
                        <b><?php echo $row["last_name"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>department_name : </label>
                        <b><?php echo $row["department_name"]; ?></b>       
                    </div>
                    <div class="form-group">
                        <label>current_year : </label>
                        <b><?php echo $row["current_year"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>batch : </label>
                        <b><?php echo $row["batch"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>category : </label>
                        <b><?php echo $row["category"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>Addreess : </label>
                        <b><?php echo $row["Addreess"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>current_semester : </label>
                        <b><?php echo $row["current_semester"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>registernumber : </label>
                        <b><?php echo $row["registernumber"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>email : </label>
                        <b><?php echo $row["email"]; ?></b>    
                    </div>
                    <div class="form-group">
                        <label>phonenumber : </label>
                        <b><?php echo $row["phonenumber"]; ?></b>    
                    </div>
                    <p><a href="newentryalteration.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</center>
</body>
</html>