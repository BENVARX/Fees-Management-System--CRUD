<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$rollno = $id = $first_name = $last_name = $department_name = $current_year = $batch = $category = $Addreess = $current_semester = $registernumber = $email = $phonenumber = "";
$rollno_err = $id_err = $first_name_err = $last_name_err = $department_name_err = $current_year_err = $batch_err = $category_err = $Addreess_err = $current_semester_err = $registernumber_err = $email_err = $phonenumber_err = "";
 
// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate rollno
    // Validate id
    $input_id = trim($_POST["id"]);
    if (empty($input_id)) {
        $id_err = "Please enter ID.";
    } else {
        $id = $input_id;
    }
    
    // Validate first_name
    $input_first_name = trim($_POST["first_name"]);
    if (empty($input_first_name)) {
        $first_name_err = "Please enter first name.";
    } else {
        $first_name = $input_first_name;
    }
    
    // Validate last_name
    $input_last_name = trim($_POST["last_name"]);
    if (empty($input_last_name)) {
        $last_name_err = "Please enter last name.";
    } else {
        $last_name = $input_last_name;
    }
    
    // Validate department_name
    $input_department_name = trim($_POST["department_name"]);
    if (empty($input_department_name)) {
        $department_name_err = "Please enter department name.";
    } else {
        $department_name = $input_department_name;
    }
    
    // Validate current_year
    $input_current_year = trim($_POST["current_year"]);
    if (empty($input_current_year)) {
        $current_year_err = "Please enter current year.";
    } else {
        $current_year = $input_current_year;
    }
    
    // Validate batch
    $input_batch = trim($_POST["batch"]);
    if (empty($input_batch)) {
        $batch_err = "Please enter batch.";
    } else {
        $batch = $input_batch;
    }
    
    // Validate category
    $input_category = trim($_POST["category"]);
    if (empty($input_category)) {
        $category_err = "Please enter category.";
    } else {
        $category = $input_category;
    }
    
    // Validate Addreess
    $input_Addreess = trim($_POST["Addreess"]);
    if (empty($input_Addreess)) {
        $Addreess_err = "Please enter address.";
    } else {
        $Addreess = $input_Addreess;
    }
    
    // Validate current_semester
    $input_current_semester = trim($_POST["current_semester"]);
    if (empty($input_current_semester)) {
        $current_semester_err = "Please enter current semester.";
    } else {
        $current_semester = $input_current_semester;
    }
    
    // Validate registernumber
    $input_registernumber = trim($_POST["registernumber"]);
    if (empty($input_registernumber)) {
        $registernumber_err = "Please enter register number.";
    } else {
        $registernumber = $input_registernumber;
    }
    
    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter email.";
    } else {
        $email = $input_email;
    }
    
    // Validate phonenumber
    $input_phonenumber = trim($_POST["phonenumber"]);
    if (empty($input_phonenumber)) {
        $phonenumber_err = "Please enter phonenumber.";
    } else {
        $phonenumber = $input_phonenumber;
    }
    
    // Check input errors before inserting in database
    if (empty($id_err) && empty($first_name_err) && empty($last_name_err) && empty($department_name_err) && empty($current_year_err) && empty($batch_err) && empty($category_err) && empty($Addreess_err) && empty($current_semester_err) && empty($registernumber_err) && empty($email_err) && empty($phonenumber_err)) {
        // Prepare an update statement
        $sql = "UPDATE entries SET  id=?, first_name=?, last_name=?, department_name=?, current_year=?, batch=?, category=?, Addreess=?, current_semester=?, registernumber=?, email=?, phonenumber=? WHERE id=?"; 

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_id, $param_first_name, $param_last_name, $param_department_name, $param_current_year, $param_batch, $param_category, $param_Addreess, $param_current_semester, $param_registernumber, $param_email, $param_phonenumber, $param_id);
            
            // Set parameters
            $param_id = $id;
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_department_name = $department_name;
            $param_current_year = $current_year;
            $param_batch = $batch;
            $param_category = $category;
            $param_Addreess = $Addreess;
            $param_current_semester = $current_semester;
            $param_registernumber = $registernumber;
            $param_email = $email;
            $param_phonenumber = $phonenumber;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records updated successfully. Redirect to landing page
                header("location: newentryalteration.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM entries WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
    
                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $rollno = $row["rollno"];
                    $id = $row["id"];
                    $first_name = $row["first_name"];
                    $last_name = $row["last_name"];
                    $department_name = $row["department_name"];
                    $current_year = $row["current_year"];
                    $batch = $row["batch"];
                    $category = $row["category"];
                    $Addreess = $row["Addreess"];
                    $current_semester = $row["current_semester"];
                    $registernumber = $row["registernumber"];
                    $email = $row["email"];
                    $phonenumber = $row["phonenumber"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>Search Data</title>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
        .emailbutton {
            position: absolute;
            top: 1175px;
            left: 600px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5"> ENTRY ALTERATION</h2>
                    <p>Please alter the fees if any needed </p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">id</label>
                            <input type="text" name="id" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value1" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $id; ?>">
                            <span class="invalid-feedback"><?php echo $id_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">first_name</label>
                            <input type="text" name="first_name" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value2" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                            <span class="invalid-feedback"><?php echo $first_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">last_name</label>
                            <input type="text" name="last_name" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value3" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                            <span class="invalid-feedback"><?php echo $last_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">department_name</label>
                            <input type="text" name="department_name" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value5" class="form-control <?php echo (!empty($department_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $department_name; ?>">
                            <span class="invalid-feedback"><?php echo $department_name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">current_year</label>
                            <input type="text" name="current_year" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value6" class="form-control <?php echo (!empty($current_year_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $current_year; ?>">
                            <span class="invalid-feedback"><?php echo $current_year_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">batch</label>
                            <input type="text" name="batch" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value7" class="form-control <?php echo (!empty($batch_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $batch; ?>">
                            <span class="invalid-feedback"><?php echo $batch_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">category</label>
                            <input type="text" name="category" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value8" class="form-control <?php echo (!empty($category_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $category; ?>">
                            <span class="invalid-feedback"><?php echo $category_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">Addreess</label>
                            <input type="text" name="Addreess" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value9" class="form-control <?php echo (!empty($Addreess_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Addreess; ?>">
                            <span class="invalid-feedback"><?php echo $Addreess_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">current_semester</label>
                            <input type="text" name="current_semester" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value10" class="form-control <?php echo (!empty($current_semester_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $current_semester; ?>">
                            <span class="invalid-feedback"><?php echo $current_semester_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">registernumber</label>
                            <input type="text" name="registernumber" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value11" class="form-control <?php echo (!empty($registernumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $registernumber; ?>">
                            <span class="invalid-feedback"><?php echo $registernumber_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">email</label>
                            <input type="text" name="email" style="border-color:black;border-radius: 15px;border-width: 2px;" id="sum" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">phonenumber</label>
                            <input type="text" name="phonenumber" style="border-color:black;border-radius: 15px;border-width: 2px;" id="sum" class="form-control <?php echo (!empty($phonenumber_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phonenumber; ?>">
                            <span class="invalid-feedback"><?php echo $phonenumber_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit"  class="btn btn-primary" value="Submit" style="right: 200px;background-color:black ;border-radius: 15px;">
                        <a href="newentryalteration.php" class="btn btn-secondary ml-2" style="width:75px;background-color:black ;border-radius: 15px;">Cancel</a>
                    </form>
                </div>        
            </div>
        </div>
    </div>
</body>
</html>
