<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body{
        background-color:white;

    }input{
        width:40%;
        height: 5%;
        border:1px;
        border-color: black;
        border-radius:05px;
        padding:8px 15px 8px 0px;
        margin:10px 0px 15px 0px;
        box-shadow 1px 1px 2px 1px grey;
        

    }.first_name{
        position: absolute;
       left: 200px;
       top: 150px;

    }

.last_name{
    position: absolute;
    left: 750px;
    top: 150px;
   
}.department_name{
    position: absolute;
    left: 750px;
    width:800px;
    top: 240px;
}.rollno{
   position: absolute;
   left: 200px;
   top: 240px;
}.current_year{
    position: absolute;
    top: 330px;  
    width:800px;
    left: 200px;
}.batch{
    position: absolute;
    top: 330px;  
    width:800px;
    left: 750px;
}.category{
    position: absolute;
    top: 420px;  
    width:800px;
    left: 200px;
}.Address{
    position: absolute;
   top: 420px;
   left: 750px;
}.current_semester{
    position: absolute;
    top: 510px;  
    width:800px; 
    left: 200px;
}.Regno{
    position: absolute;
    top: 510px; 
    left: 750px;
}.email{
    position:absolute;
    top: 600px;
    left: 200px;
}.phonenumber{
    position: absolute;
    top: 600px;
    left:750px;
    width:800px; 
}

label {
            display: inherit;
            
            
            
        }

        #input {
            width: 30%;
            text-align: center;   
            border: 1px solid #ccc;
        }.back{
            position: absolute;
            top: 700px;
            right: 575px;
        }.backtomenu{
            position:absolute;
            top: 700px;
            right: 450px;
        }

  </style>

    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>search data</title>
    
</head>
<body>
    <center>
        <h1 style = "font-family: 'Roboto', sans-serif"> Enter the Roll Number to search</h1>
        <form action="" method="post">
            <input type="text" name="rollno" style="border-radius:15px;border:2px solid black;width: 536px;height: 20px;" placeholder="  Enter your roll number"/>
           
            <input type="submit" name="search"  style="padding: 0px 0px 0px 0px;margin-left: 25px; background-color: #000000;border-radius: 15px;border:2px solid black; color:white;width: 80px;height: 38px;" value="Search">
        </form>
  
<?php
$connection =mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,'mydatabase');

if(isset($_POST['rollno']))
{
    $rollno =$_POST['rollno'];
    $query="SELECT * FROM entries where rollno='$rollno'";
    $query_run=mysqli_query($connection,$query);
    while($row=mysqli_fetch_array($query_run))
    {
        ?>
           <form action="" method="POST" name = "Data_space" style = "color: #303130;">
           <div class="first_name" style="text-align: left;">
            <label for="first_name"style="font-family: 'Poppins', sans-serif;font-size:20px;" >First Name</label>
               <input type="text" name="first_name" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;font-family: 'Roboto', sans-serif;width: 400px;height: 25px;text-align:center;" value="<?php echo $row['first_name'] ?>"/>
           </div>
           <div class="last_name" style="text-align: left;">
            <label for="last_name" style="font-family: 'Poppins', sans-serif;font-size:20px;">Last Name</label>
               <input type="text" name="last_name" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px; text-align:center; " value="<?php echo $row['last_name'] ?>"/>
           </div>
           <div class="rollno"style="text-align: left;">
            <label for="rollno" style="font-family: 'Poppins', sans-serif;font-size:20px;">Rollno</label>
               <input type="text" name="rollno" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px;text-align:center;  "  value="<?php echo $row['rollno'] ?>"/>
           </div>
           <div class="department_name"style="text-align: left;">
            <label for="department_name" name="department_name"style="font-family: 'Poppins', sans-serif;font-size:20px;">Department Name</label>
               <input type="text" name="department_name" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px; text-align:center; " value="<?php echo $row['department_name'] ?>"/>
           </div>
           <div class="current_year"style="text-align: left;">
            <label for="current_year" name="current_year" style="font-family: 'Poppins', sans-serif;font-size:20px;">Current Year</label>
               <input type="text" name="current_year" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px; text-align:center; " value="<?php echo $row['current_year'] ?>"/>
           </div>
           <div class="batch"style="text-align: left;">
            <label for="batch" name="batch" style="font-family: 'Poppins', sans-serif;font-size:20px;">Batch</label>
               <input type="text" name="batch" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px;text-align:center;  "value="<?php echo $row['batch'] ?>"/>
           </div>
           <div class="current_semester"style="text-align: left;">
            <label for="current_semester" name="current_semester" style="font-family: 'Poppins', sans-serif;font-size:20px;" required>Current Semester</label>
               <input type="text" name="current_semester" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px;text-align:center; " value="<?php echo $row['current_semester'] ?>"/>
           </div>
           <div class="Address"style="text-align: left;">
                <label for="rollno" style="font-family: 'Poppins', sans-serif;font-size:20px;">Address</label>
               <input type="text" name="address"style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px;text-align:center; " value="<?php echo $row['Addreess'] ?>"/>
           </div>
           <div class="Regno"style="text-align: left;">
                <label for="registernumber" style="font-family: 'Poppins', sans-serif;font-size:20px;">Register Number</label>
               <input type="text" name="registernumber" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px;text-align:center; " value="<?php echo $row['registernumber'] ?>"/>
           </div>
           <div class="category"style="text-align: left;">
            <label for="category" name="category"style="font-family: 'Poppins', sans-serif;font-size:20px;">Category</label>
               <input type="text" name="category" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px;text-align:center; " value="<?php echo $row['category'] ?>"/>
           </div>
           <div class="email"style="text-align: left;">
                <label for="email" style="font-size: 20px;font-family: 'Poppins', sans-serif;">Email</label>
               <input type="text" name="email" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px; text-align:center; "value="<?php echo $row['email'] ?>"/>
           </div>
           <div class="phonenumber"style="text-align: left;">
                <label for="phonenumber" name="phonenumber"style="font-family: 'Poppins', sans-serif;font-size:20px;">phonenumber</label>
             <input type="tel" name="phonenumber" style="font-family: 'Roboto', sans-serif;border-radius:20px;border:2px solid black;width: 400px;height: 25px;text-align:center; "value="<?php echo $row['phonenumber'] ?>"/>
           </div>
            
            </form>
            
        <?php
    }
}
?>
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