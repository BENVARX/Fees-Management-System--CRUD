<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$rollno = $admission_fee = $tuition_fee = $book_fee = $uniform_fee = $hostel_fee = $caution_deposit_hostel = $transport_fee = $examination_fee = $library_fee = $placement_training_fee = $others_fee = $total = "";
$rollno_err = $admission_fee_err = $tuition_fee_err = $book_fee_err = $uniform_fee_err = $hostel_fee_err = $caution_deposit_hostel_err = $transport_fee_err = $examination_fee_err = $library_fee_err = $placement_training_fee_err = $others_fee_err = $total_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate each fee field and set values
    // ... (your validation code goes here)
    $input_admission_fee = trim($_POST["admission_fee"]);
    if(empty($input_admission_fee)){
         $admission_fee = $input_admission_fee;   
    } elseif(!ctype_digit($input_admission_fee)){
        $admission_fee_err = "Please enter a positive integer value.";
    } else{
        $admission_fee = $input_admission_fee;
    }
    
    // Validate tuition_fee
    $input_tuition_fee = trim($_POST["tuition_fee"]);
    if(empty($input_tuition_fee)){
        $tuition_fee = $input_tuition_fee;     
    } elseif(!ctype_digit($input_tuition_fee)){
        $tuition_fee_err = "Please enter a positive integer value.";
    } else{
        $tuition_fee = $input_tuition_fee;
    }
    $input_book_fee = trim($_POST["book_fee"]);
    if(empty($input_book_fee)){
        $book_fee = $input_book_fee;     
    } elseif(!ctype_digit($input_book_fee)){
        $book_fee_err = "Please enter a positive integer value.";
    } else{
        $book_fee = $input_book_fee;
    }
    $input_uniform_fee = trim($_POST["uniform_fee"]);
    if(empty($input_uniform_fee)){
        $uniform_fee = $input_uniform_fee;     
    } elseif(!ctype_digit($input_uniform_fee)){
        $uniform_fee_err = "Please enter a positive integer value.";
    } else{
        $uniform_fee = $input_uniform_fee;
    }
    $input_hostel_fee = trim($_POST["hostel_fee"]);
    if(empty($input_hostel_fee)){
         $hostel_fee = $input_hostel_fee;     
    } elseif(!ctype_digit($input_hostel_fee)){
        $hostel_fee_err = "Please enter a positive integer value.";
    } else{
        $hostel_fee = $input_hostel_fee;
    }
    $input_caution_deposit_hostel = trim($_POST["caution_deposit_hostel"]);
    if(empty($input_caution_deposit_hostel)){
        $caution_deposit_hostel = $input_caution_deposit_hostel;     
    } elseif(!ctype_digit($input_caution_deposit_hostel)){
        $caution_deposit_hostel_err = "Please enter a positive integer value.";
    } else{
        $caution_deposit_hostel = $input_caution_deposit_hostel;
    }
    $input_transport_fee = trim($_POST["transport_fee"]);
    if(empty($input_transport_fee)){
       $transport_fee = $input_transport_fee;     
    } elseif(!ctype_digit($input_transport_fee)){
        $transport_fee_err = "Please enter a positive integer value.";
    } else{
        $transport_fee = $input_transport_fee;
    }
    $input_examination_fee = trim($_POST["examination_fee"]);
    if(empty($input_examination_fee)){
        $examination_fee = $input_examination_fee;    
    } elseif(!ctype_digit($input_examination_fee)){
        $examination_fee_err = "Please enter a positive integer value.";
    } else{
        $examination_fee = $input_examination_fee;
    }
    $input_library_fee = trim($_POST["library_fee"]);
    if(empty($input_library_fee)){
        $library_fee = $input_library_fee;     
    } elseif(!ctype_digit($input_library_fee)){
        $library_fee_err = "Please enter a positive integer value.";
    } else{
        $library_fee = $input_library_fee;
    }
    $input_placement_training_fee = trim($_POST["placement_training_fee"]);
    if(empty($input_placement_training_fee)){
        $placement_training_fee = $input_placement_training_fee;    
    } elseif(!ctype_digit($input_placement_training_fee)){
        $placement_training_fee_err = "Please enter a positive integer value.";
    } else{
        $placement_training_fee = $input_placement_training_fee;
    }
    $input_others_fee = trim($_POST["others_fee"]);
    if(empty($input_others_fee)){
        $others_fee = $input_others_fee;     
    } elseif(!ctype_digit($input_others_fee)){
        $others_fee_err = "Please enter a positive integer value.";
    } else{
        $others_fee = $input_others_fee;
    }
    $input_total = trim($_POST["total"]);
    if(empty($input_total)){
        $total = $input_total;     
    } elseif(!ctype_digit($input_total)){
        $total_err = "Please enter a positive integer value.";
    } else{
        $total = $input_total;
    }
    // Check input errors before inserting in database
    if(empty($admission_fee_err) && empty($tuition_fee_err) && empty($book_fee_err) && empty($uniform_fee_err) && empty($hostel_fee_err) && empty($caution_deposit_hostel_err) && empty($transport_fee_err) && empty($examination_fee_err) && empty($library_fee_err) && empty($placement_training_fee_err) && empty($others_fee_err) && empty($total_err) ){
        // Prepare an update statement for feesntries table
        $sql = "UPDATE feesntries SET admission_fee=?, tuition_fee=?, book_fee=?, uniform_fee=?, hostel_fee=?, caution_deposit_hostel=?, transport_fee=?, examination_fee=?, library_fee=?, placement_training_fee=?, others_fee=?, total=? WHERE id=?"; 
        
        // Prepare an update statement for feesreduction table
        $sql_feesreduction = "UPDATE feesreduction SET admission_fee=?, tuition_fee=?, book_fee=?, uniform_fee=?, hostel_fee=?, caution_deposit_hostel=?, transport_fee=?, examination_fee=?, library_fee=?, placement_training_fee=?, others_fee=?, total=? WHERE id=?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssi", $param_admission_fee, $param_tuition_fee, $param_book_fee, $param_uniform_fee, $param_hostel_fee, $param_caution_deposit_hostel, $param_transport_fee, $param_examination_fee, $param_library_fee, $param_placement_training_fee, $param_others_fee, $param_total, $param_id);
            
            // Set parameters
            // ... (set parameters for feesntries table)
            $param_admission_fee = $admission_fee;
            $param_tuition_fee = $tuition_fee;
            $param_book_fee = $book_fee;
            $param_uniform_fee = $uniform_fee;
            $param_hostel_fee = $hostel_fee;
            $param_caution_deposit_hostel = $caution_deposit_hostel;
            $param_transport_fee = $transport_fee;
            $param_examination_fee = $examination_fee;
            $param_library_fee = $library_fee;
            $param_placement_training_fee = $placement_training_fee;
            $param_others_fee = $others_fee;
            $param_total = $total;
            $param_id = $id;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully for feesntries table, now update feesreduction table
                if($stmt_feesreduction = mysqli_prepare($link, $sql_feesreduction)){
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt_feesreduction, "ssssssssssssi", $param_admission_fee, $param_tuition_fee, $param_book_fee, $param_uniform_fee, $param_hostel_fee, $param_caution_deposit_hostel, $param_transport_fee, $param_examination_fee, $param_library_fee, $param_placement_training_fee, $param_others_fee, $param_total, $param_id);
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt_feesreduction)){
                        // Records updated successfully in both tables. Redirect to landing page
                        header("location: feesalteration.php");
                        exit();
                    } else{
                        echo "Oops! Something went wrong with updating feesreduction table. Please try again later.";
                    }
                } else {
                    echo "Oops! Something went wrong with preparing statement for feesreduction table. Please try again later.";
                }
            } else{
                echo "Oops! Something went wrong with updating feesntries table. Please try again later.";
            }
        }
         
        // Close statements
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt_feesreduction);
    }
    
    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement for feesntries table
        $sql = "SELECT * FROM feesntries WHERE id = ?";
        
        // Prepare a select statement for feesreduction table
        $sql_feesreduction = "SELECT * FROM feesreduction WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    // Fetch result row as an associative array
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    // ... (retrieve values for feesntries table)
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
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
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .totalbutton{
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
                    <h2 class="mt-5">FEES ALTERATION</h2>
                    <p>Please alter the fees if any needed </p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <!-- Form fields -->
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">admission_fee</label>
                            <input type="text" name="admission_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value1"class="form-control <?php echo (!empty($tuition_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $admission_fee; ?>">
                            <span class="invalid-feedback"><?php echo $admission_fee_err;?></span>
                        </div>

                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">tuition_fee</label>
                            <input type="text" name="tuition_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value2"class="form-control <?php echo (!empty($tuition_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $tuition_fee; ?>">
                            <span class="invalid-feedback"><?php echo $tuition_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">book_fee</label>
                            <input type="text" name="book_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value3" class="form-control <?php echo (!empty($book_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $book_fee; ?>">
                            <span class="invalid-feedback"><?php echo $book_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">uniform_fee</label>
                            <input type="text" name="uniform_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value4" class="form-control <?php echo (!empty($uniform_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $uniform_fee; ?>">
                            <span class="invalid-feedback"><?php echo $uniform_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">hostel_fee</label>
                            <input type="text" name="hostel_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value5" class="form-control <?php echo (!empty($hostel_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $hostel_fee; ?>">
                            <span class="invalid-feedback"><?php echo $hostel_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">caution_deposit_hostel</label>
                            <input type="text" name="caution_deposit_hostel" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value6" class="form-control <?php echo (!empty($caution_deposit_hostel_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $caution_deposit_hostel; ?>">
                            <span class="invalid-feedback"><?php echo $caution_deposit_hostel_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">transport_fee</label>
                            <input type="text" name="transport_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value7"class="form-control <?php echo (!empty($transport_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $transport_fee; ?>">
                            <span class="invalid-feedback"><?php echo $transport_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">examination_fee</label>
                            <input type="text" name="examination_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value8"class="form-control <?php echo (!empty($examination_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $examination_fee; ?>">
                            <span class="invalid-feedback"><?php echo $examination_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">library_fee</label>
                            <input type="text" name="library_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value9" class="form-control <?php echo (!empty($library_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $library_fee; ?>">
                            <span class="invalid-feedback"><?php echo $library_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">placement_training_fee</label>
                            <input type="text" name="placement_training_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value10" class="form-control <?php echo (!empty($placement_training_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $placement_training_fee; ?>">
                            <span class="invalid-feedback"><?php echo $placement_training_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">others_fee</label>
                            <input type="text" name="others_fee" style="border-color:black;border-radius: 15px;border-width: 2px;" id="value11"class="form-control <?php echo (!empty($others_fee_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $others_fee; ?>">
                            <span class="invalid-feedback"><?php echo $others_fee_err;?></span>
                        </div>
                        <div class="form-group">
                            <label style="font-family: poppins;font-weight: bold;">total</label>
                            <input type="text" name="total" style="border-color:black;border-radius: 15px;border-width: 2px;" id="sum" class="form-control  <?php echo (!empty($total_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $total; ?>"required>
                            <span class="invalid-feedback"><?php echo $total_err;?></span>
                        </div>
                              
                       </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit"  class="btn btn-primary" value="Submit" style="right: 200px;background-color:black ;border-radius: 15px;">
                        <a href="feesalteration.php" class="btn btn-secondary ml-2" style="width:75px;background-color:black ;border-radius: 15px;">Cancel</a>
                    </form>
                    </form>
                    <!-- Total button -->
                    <div class="totalbutton">
                        <button  onclick="add()" style="height: 38px; width: 80px;  color:white;background-color: #000000;border-radius: 15px; "required >Total</button>  
                        <script type="text/javascript">
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
            }var inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(input => {
            input.addEventListener('input', add);
        });
         add();
                        </script>
                    </div>
                </div>        
            </div>
        </div>
    </div>
</body>
</html>
