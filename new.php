!DOCTYPE html>
<html>
<head>
  <title>Menu and Log Out Button</title>
  <link rel="stylesheet" href="fees.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    /* Internal CSS */
   
  @import url('https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&display=swap');

  @import url('https://fonts.googleapis.com/css2?family=Istok+Web:wght@700&display=swap');


    .screen {
  width: 100%;
  height: 100%;
  background-color: white;
}

#menu {
  width: 300px;
  height: 100%;
  position: fixed;
  left: 0;
  top: 0;
  background-color: #070707;
  box-shadow: 0 0 10px rgb(248, 246, 246);
  border-top-right-radius: 40px;
  border-bottom-right-radius: 40px;
}.img{
  position:relative;
  left:30px;
  top:170px;
}.quote{
  position:relative;
  justify-content:center;
  bottom:60px;
  left:50px;
  font-size:18px;
  
}



#logout {
  position:relative;
  top:600px;
  left:70px;

}
#logout,button {
  border-radius: 10px;
  font-family: istok web;
  text-decoration: unset;
  text-align: center;
  width: 100px;
  padding: 5px;
  position: fixed;
  color: #000000;
  font-weight: bold;
}


.center {
  margin-left: auto;
  margin-right: auto;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}.roll{
  position: absolute;
  top: 125px;
  left: 400px;
  
}.fee1{
  position:absolute;
  top: 25px;
}

  </style>
</head>
<body>
  <div id="menu">
    <div class="img">
   <img src="logo.png" style="height:200px; width:200px;">
   <div class="quote">
   <h5 style="color:white ;font-family:poppins;">Sky is the limit</h5></div>
  </div>
  </div>

<div id="logout">
    
 <h6 style="color:white; font-size:10px;">Set the fees and go to Home page</h6>
</div>

   <div class="feetable">
    <form action="pay.php" method="post">
    <div class="fee1">
    <h1 style="font-family: istok web; ">Fees Entry</h1>
    </div> 
 
  
<div class="roll">
<?php
session_start();

// Check if rollno is set in the URL
if (isset($_GET["rollno"])) {
    $rollno = $_GET["rollno"];
    // Output the rollno value
    echo "<input type='text' value='$rollno' name='rollno' class='rollno' readonly>";
} else {
    // Handle the case when rollno is not set in the URL
    echo "Roll number not found!";
}
?>

</div>
   
    <div class="date">
      <p style="font-family: istok web">Date</p>
      <input type="date" id="date" name="date" style="border:2px solid black;border-radius: 10px; " required readonly>
    </div>
  

     
     </div>
 <div class="tableborder">   
          <table style="height:350px; width:800px;" >
          <thead>

            <tr>
              <th>S.No</th>
              <th>Description</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <tr style="width:500px;">
              <td>1.</td>
              <td style="width:400px;" for="admission_fee">Admission Fee</td>
              <td><input type="text" id="value1" name="admission_fee" style="width:400px;" /></td>
            </tr>
            <tr>
              <td>2.</td>
              <td for="tuition_fee">Tuition Fee</td>
              <td><input type="number" id="value2" name="tuition_fee" style="width:400px;"/></td>
            </tr>
            <tr>
              <td>3.</td>
              <td for="book_fee">Book Fee</td>
              <td><input type="number" id="value3" name="book_fee" style="width:400px;" /></td>
            </tr>
            <tr>
              <td>4.</td>
              <td for="uniform_fee">Uniform Fee</td>
              <td><input type="number" id="value4"  name="uniform_fee" style="width:400px;" /></td>
            </tr>
            <tr>
              <td>5.</td>
              <td for="hostel_fee">Hostel Fee</td>
              <td><input type="number" id="value5"  name="hostel_fee" style="width: 400px;"/></td>
            </tr>
            <tr>
              <td>6.</td>
              <td for="caution_deposit_hostel">Caution Deposit (Hostel)</td>
              <td><input type="number" id="value6" name="caution_deposit_hostel" style="width:400px;" /></td>
            </tr>
            <tr>
              <td>7.</td>
              <td for="transport_fee">Transport Fee</td>
              <td><input type="number" id="value7" name="transport_fee" style="width:400px;" /></td>
            </tr>
            <tr>
              <td>8.</td>
              <td for="examination_fee">Examination Fee</td>
              <td><input type="number" id="value8" name="examination_fee" style="width:400px; "/></td>
            </tr>
            <tr>
              <td>9.</td>
              <td for="library_fee">Library Fee</td>
              <td><input type="number" id="value9"  name="library_fee"style="width:400px;" /></td>
            </tr>
            <tr>
              <td>10.</td>
              <td for="placement_training_fee">Placement & Training Fee</td>
              <td><input type="number"id="value10"  name="placement_training_fee" style="width:400px;" /></td>
            </tr>
            <tr>
              <td>11.</td>
              <td for="others_fee">Others</td>
              <td><input type="number" id="value11" name="others_fee" style="width:400px;"/></td>
            </tr>
           
            
          </tbody>
</table>

</div>
  <div class ="total">
  <input type="number" id="sum" name="total" style="height:25px;width: 400px;border-color: #000000;border-radius: 5px; " required> 
  </div>
  <div class="proceedtonextpage">
    <button type="submit"style="height: 40px; width: 410px; color:white;background-color: #000000;" >Proceed to next page->></button>
</div>
</form>
<div class="totalbutton">
            
        <button  onclick="add()" style="height: 40px; width: 178px; color:white;background-color: #000000;left:600px">Total</button>        
</div>
<div class="reset">
          <button type="reset" onclick="reset()" style="height: 40px; width: 178px; color:white;background-color: #000000;left:400px ">Reset </button>
</div>
<script>
    // Get current date
    var currentDate = new Date();

    // Format date as desired (e.g., "2024-04-04")
    var formattedDate = currentDate.toISOString().slice(0, 10);

    // Set the value of the input box to the formatted date
    document.getElementById('date').value = formattedDate;
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
            }var inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(input => {
            input.addEventListener('input', add);
        });
        
        // Call add initially to calculate the initial sum
        add();
         </script>
         <script>
              var d=new Date()
              var yr=d.getFullYear();
              var month=d.getMonth()+1
              if(month<10){
                month='0'+month
              }
              var date=d.getDate();
              if(date<10){
                date='0'+date
              }
              var c_date=yr+"-"+month+"-"+date;
              document.getElementById('d1').value=c_date;
         </script>
  
  
</body>
</html>
