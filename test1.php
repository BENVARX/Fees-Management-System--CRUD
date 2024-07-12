<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Entry Page</title><meta charset="utf-8">
    <link rel="stylesheet" href="menu.css">
 <style>
        /* Internal CSS */
     @import url('https://fonts.googleapis.com/css2?family=Istok+Web:wght@400;700&display=swap');

     @import url('https://fonts.googleapis.com/css2?family=Istok+Web:wght@700&display=swap')
    
     
     #screen {
     width: 100%;
     height:100%;
     background-color:white;
     }
     .error {
            border: 1px solid red;

             /* Add a red border for visual indication */
        }
        .error:hover{
            color:black;
        
        }
   
     #menu {
     width: 225px;
     height: 100%;
     position: fixed;
     left: 0;
     top: 0;
     background-color: #070707;
      box-shadow: 0 0 10px rgb(248, 246, 246);
     border-top-right-radius: 40px;
     border-bottom-right-radius: 40px;
     } 

     #menu ul {
     list-style: none;
     padding: 0;
     margin: 0;
     }

     #menu li {
     padding: 10px;
     cursor:pointer;
     color: rgb(247, 244, 244);
     transition: color 0.2s;
     font-family: istok web;
     font-weight: none;
     font-size: large;
     }

     #menu a {
       text-decoration: none;
       color: rgb(250, 247, 247);
       font-family: istok web;
  
     }
  
        #menu a:hover {
     text-decoration: underline;
      color: #fefefe;
     }


     #logout:hover {
      background-color: #030303;
      }
     #body {
            font-family: istok web;
        }

        #new-entry-form {
            width: 800px;
            margin: 0 auto;
        }

        label {
            display: inherit;
            margin-bottom: 10px;
            
        }

        #input,
        select {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #666;
        }

        #submit,button {
            width: 100%;
            padding: 10px;
            background-color: #f0f3f4;
            color: rgb(10, 10, 10);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
        }#log label{
            
        }
    
            


    </style>
</head>
<body>
    <div id="menu">
        <ul>
          <li><h4>Menu</h4></li>
          <li><a href="#">New Entry</a></li>
          <li><a href="#">Open Ledger</a></li>
          <li><a href="#">Fees Alteration</a></li>
          <li><a href="#">Dept fees</a></li>
          <li><a href="#">Payment</a></li>
          <li><a href="report1.html">Report</a></li>
        </ul>
      </div>
   </div>
 
 
<div id="new-entry-form">
        <form action="test.php" method="post">
            <h1 style="font-family: 'DM Serif Display', serif;">WELCOME TO PIETECH FAMILY👨‍🎓</h1>
           <div class="first_name">
            <label for="first_name"style="font-family: istok web;font-size:20px;" >First Name</label>
            <input type="text" name="first_name" id="first_name"placeholder="Enter firstname" style="border-radius:15px;border:2px solid black;width: 226px;height: 30px;" required>
           </div>
           <div class="last_name">
            <label for="last_name" style="font-family: istok web;font-size:20px;">Last Name</label>
            <input type="text" name="last_name" id="last_name"placeholder="Enter lastname" style="border-radius:15px;border:2px solid black;left: 200px;width: 226px;height: 30px;" required>
           </div>
           <div class="rollno">
            <label for="rollno" style="font-family: istok web;font-size:20px;">Rollno</label>
            <input type="text" name="rollno" id="rollno"placeholder="Enter roll no" style=" border-radius:15px ;width: 226px;height: 30px;" required>
         </div>  
          
           <div class="category">
            <label for="category" name="category"style="font-family: istok web;font-size:20px;">Category</label>
            <select name="category" id="category"style="border-radius:15px;border:2px solid black"  required>
                <option value="">Select category</option>
                <option value="GQ">GQ</option>
                <option value="MQ">MQ</option>
                <option value="PMSS">PMSS</option>
                <option value="GQ(FG)">GQ(FG)</option>
                <option value="7.5">7.5</option>
            </select>
            
           </div>           
            <div class="department_name">
            <label for="department_name" name="department_name"style="font-family: istok web;font-size:20px;">Department Name</label>
            <select name="department_name" id="department_name"style="border-radius:15px;border:2px solid black"  required>
                <option value="">Select Dept</option>
                <option value="CSE">CSE</option>
                <option value="ECE">ECE</option>
                <option value="MECH">MECH</option>
                <option value="AI&DS">AI&DS</option>
                <option value="EEE">EEE</option>
                <option value="CIVIL">CIVIL</option>
            </select>
            </div>
            <div class="current_year">
            <label for="current_year" name="current_year" style="font-family: istok web;font-size:20px;">Current Year</label>
            <select name="current_year" id="current_year"style="border-radius:15px;border:2px solid black" required>
                <option value="">Select Year</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            </div>
            <div class="batch">
            <label for="batch" name="batch" style="font-family: istok web;font-size:20px;">Batch</label>
            <select name="batch"  id="batch"style="border-radius:15px;border:2px solid black" required>
                <option value="">Select Batch</option>
                <option value="2015-2019(CSE)">2015-2019(CSE)</option>
                <option value="2015-2019(ECE)">2015-2019(ECE)</option>
                <option value="2015-2019(MECH)">2015-2019(MECH)</option>
                <option value="2015-2019(CIVIL)">2015-2019(CIVIL)</option>
                <option value="2015-2019(AI&DS)">2015-2019(AI&DS)</option>
                <option value="2015-2019(EEE)">2015-2019(EEE)</option>
                <option value="2016-2020(CSE)">2016-2020(CSE)</option>
                <option value="2016-2020(ECE)">2016-2020(ECE)</option>
                <option value="2016-2020(MECH)">2016-2020(MECH)</option>
                <option value="2016-2020(CIVIL)">2016-2020(CIVIL)</option>
                <option value="2016-2020(AI&DS)">2016-2020(AI&DS)</option>
                <option value="2016-2020(EEE)">2016-2020(EEE)</option>
                <option value="2017-2021(CSE)">2017-2021(CSE)</option>
                <option value="2017-2021(ECE)">2017-2021(ECE)</option>
                <option value="2017-2021(MECH)">2017-2021(MECH)</option>
                <option value="2017-2021(CIVIL)">2017-2021(CIVIL)</option>
                <option value="2017-2021(AI&DS)">2017-2021(AI&DS)</option>
                <option value="2017-2021(EEE)">2017-2021(EEE)</option>
                <option value="2018-2022(CSE)">2018-2022(CSE)</option>
                <option value="2018-2022(ECE)">2018-2022(ECE)</option>
                <option value="2018-2022(MECH)">2018-2022(MECH)</option>
                <option value="2018-2022(CIVIL)">2018-2022(CIVIL)</option>
                <option value="2018-2022(AI&DS)">2018-2022(AI&DS)</option>
                <option value="2018-2022(EEE)">2018-2022(EEE)</option>
                <option value="2019-2023(CSE)">2019-2023(CSE)</option>
                <option value="2019-2023(ECE)">2019-2023(ECE)</option>
                <option value="2019-2023(MECH)">2019-2023(MECH)</option>
                <option value="2019-2023(CIVIL)">2019-2023(CIVIL)</option>
                <option value="2019-2023(AI&DS)">2019-2023(AI&DS)</option>
                <option value="2019-2023(EEE)">2019-2023(EEE)</option>
                <option value="2020-2024(CSE)">2020-2024(CSE)</option>
                <option value="2020-2024(ECE)">2020-2024(ECE)</option>
                <option value="2020-2024(MECH)">2020-2024(MECH)</option>
                <option value="2020-2024(CIVIL)">2020-2024(CIVIL)</option>
                <option value="2020-2024(AI&DS)">2020-2024(AI&DS)</option>
                <option value="2020-2024(EEE)">2020-2024(EEE)</option>
                <option value="2021-2025(CSE)">2021-2025(CSE)</option>
                <option value="2021-2025(ECE)">2021-2025(ECE)</option>
                <option value="2021-2025(MECH)">2021-2025(MECH)</option>
                <option value="2021-2025(CIVIL)">2021-2025(CIVIL)</option>
                <option value="2021-2025(AI&DS)">2021-2025(AI&DS)</option>
                <option value="2021-2025(EEE)">2021-2025(EEE)</option>
                <option value="2022-2026(CSE)">2022-2026(CSE)</option>
                <option value="2022-2026(ECE)">2022-2026(ECE)</option>
                <option value="2022-2026(MECH)">2022-2026(MECH)</option>
                <option value="2022-2026(CIVIL)">2022-2026(CIVIL)</option>
                <option value="2022-2026(AI&DS)">2022-2026(AI&DS)</option>
                <option value="2022-2026(EEE)">2022-2026(EEE)</option>
                <option value="2023-2027(CSE)">2023-2027(CSE)</option>
                <option value="2023-2027(ECE)">2023-2027(ECE)</option>
                <option value="2023-2027(MECH)">2023-2027(MECH)</option>
                <option value="2023-2027(CIVIL)">2023-2027(CIVIL)</option>
                <option value="2023-2027(AI&DS)">2023-2027(AI&DS)</option>
                <option value="2023-2027(EEE)">2023-2027(EEE)</option>
                <option value="2024-2028(CSE)">2024-2028(CSE)</option>
                <option value="2024-2028(ECE)">2024-2028(ECE)</option>
                <option value="2024-2028(MECH)">2024-2028(MECH)</option>
                <option value="2024-2028(CIVIL)">2024-2028(CIVIL)</option>
                <option value="2024-2028(AI&DS)">2024-2028(AI&DS)</option>
                <option value="2024-2028(EEE)">2024-2028(EEE)</option>
                <option value="2025-2029(CSE)">2025-2029(CSE)</option>
                <option value="2025-2029(ECE)">2025-2029(ECE)</option>
                <option value="2025-2029(MECH)">2025-2029(MECH)</option>
                <option value="2025-2029(CIVIL)">2025-2029(CIVIL)</option>
                <option value="2025-2029(AI&DS)">2025-2029(AI&DS)</option>
                <option value="2025-2029(EEE)">2025-2029(EEE)</option>
                <option value="2026-2030(CSE)">2026-2030(CSE)</option>
                <option value="2026-2030(ECE)">2026-2030(ECE)</option>
                <option value="2026-2030(MECH)">2026-2030(MECH)</option>
                <option value="2026-2030(CIVIL)">2026-2030(CIVIL)</option>
                <option value="2026-2030(AI&DS)">2026-2030(AI&DS)</option>
                <option value="2026-2030(EEE)">2026-2030(EEE)</option>
                <option value="2027-2031(CSE)">2027-2031(CSE)</option>
                <option value="2027-2031(ECE)">2027-2031(ECE)</option>
                <option value="2027-2031(MECH)">2027-2031(MECH)</option>
                <option value="2027-2031(CIVIL)">2027-2031(CIVIL)</option>
                <option value="2027-2031(AI&DS)">2027-2031(AI&DS)</option>
                <option value="2027-2031(EEE)">2027-2031(EEE)</option>
                <option value="2028-2032(CSE)">2028-2032(CSE)</option>
                <option value="2028-2032(ECE)">2028-2032(ECE)</option>
                <option value="2028-2032(MECH)">2028-2032(MECH)</option>
                <option value="2028-2032(CIVIL)">2028-2032(CIVIL)</option>
                <option value="2028-2032(AI&DS)">2028-2032(AI&DS)</option>
                <option value="2028-2032(EEE)">2028-2032(EEE)</option>
                <option value="2029-2033(CSE)">2029-2033(CSE)</option>
                <option value="2029-2033(ECE)">2029-2033(ECE)</option>
                <option value="2029-2033(MECH)">2029-2033(MECH)</option>
                <option value="2029-2033(CIVIL)">2029-2033(CIVIL)</option>
                <option value="2029-2033(AI&DS)">2029-2033(AI&DS)</option>
                <option value="2029-2033(EEE)">2029-2033(EEE)</option>
                <option value="2030-2034(CSE)">2030-2034(CSE)</option>
                <option value="2030-2034(ECE)">2030-2034(ECE)</option>
                <option value="2030-2034(MECH)">2030-2034(MECH)</option>
                <option value="2030-2034(CIVIL)">2030-2034(CIVIL)</option>
                <option value="2030-2034(AI&DS)">2030-2034(AI&DS)</option>
                <option value="2030-2034(EEE)">2030-2034(EEE)</option>
                <option value="2031-2035(CSE)">2031-2035(CSE)</option>
                <option value="2031-2035(ECE)">2031-2035(ECE)</option>
                <option value="2031-2035(MECH)">2031-2035(MECH)</option>
                <option value="2031-2035(CIVIL)">2031-2035(CIVIL)</option>
                <option value="2031-2035(AI&DS)">2031-2035(AI&DS)</option>
                <option value="2031-2035(EEE)">2031-2035(EEE)</option>
                <option value="2032-2036(CSE)">2032-2036(CSE)</option>
                <option value="2032-2036(ECE)">2032-2036(ECE)</option>
                <option value="2032-2036(MECH)">2032-2036(MECH)</option>
                <option value="2032-2036(CIVIL)">2032-2036(CIVIL)</option>
                <option value="2032-2036(AI&DS)">2032-2036(AI&DS)</option>
                <option value="2032-2036(EEE)">2032-2036(EEE)</option>
                <option value="2033-2037(CSE)">2033-2037(CSE)</option>
                <option value="2033-2037(ECE)">2033-2037(ECE)</option>
                <option value="2033-2037(MECH)">2033-2037(MECH)</option>
                <option value="2033-2037(CIVIL)">2033-2037(CIVIL)</option>
                <option value="2033-2037(AI&DS)">2033-2037(AI&DS)</option>
                <option value="2033-2037(EEE)">2033-2037(EEE)</option>
                <option value="2034-2038(CSE)">2034-2038(CSE)</option>
                <option value="2034-2038(ECE)">2034-2038(ECE)</option>
                <option value="2034-2038(MECH)">2034-2038(MECH)</option>
                <option value="2034-2038(CIVIL)">2034-2038(CIVIL)</option>
                <option value="2034-2038(AI&DS)">2034-2038(AI&DS)</option>
                <option value="2034-2038(EEE)">2034-2038(EEE)</option>
                <option value="2035-2039(CSE)">2035-2039(CSE)</option>
                <option value="2035-2039(ECE)">2035-2039(ECE)</option>
                <option value="2035-2039(MECH)">2035-2039(MECH)</option>
                <option value="2035-2039(CIVIL)">2035-2039(CIVIL)</option>
                <option value="2035-2039(AI&DS)">2035-2039(AI&DS)</option>
                <option value="2035-2039(EEE)">2035-2039(EEE)</option>
                <option value="2036-2040(CSE)">2036-2040(CSE)</option>
                <option value="2036-2040(ECE)">2036-2040(ECE)</option>
                <option value="2036-2040(MECH)">2036-2040(MECH)</option>
                <option value="2036-2040(CIVIL)">2036-2040(CIVIL)</option>
                <option value="2036-2040(AI&DS)">2036-2040(AI&DS)</option>
                <option value="2036-2040(EEE)">2036-2040(EEE)</option>
                <option value="2037-2041(CSE)">2037-2041(CSE)</option>
                <option value="2037-2041(ECE)">2037-2041(ECE)</option>
                <option value="2037-2041(MECH)">2037-2041(MECH)</option>
                <option value="2037-2041(CIVIL)">2037-2041(CIVIL)</option>
                <option value="2037-2041(AI&DS)">2037-2041(AI&DS)</option>
                <option value="2037-2041(EEE)">2037-2041(EEE)</option>
                <option value="2038-2042(CSE)">2038-2042(CSE)</option>
                <option value="2038-2042(ECE)">2038-2042(ECE)</option>
                <option value="2038-2042(MECH)">2038-2042(MECH)</option>
                <option value="2038-2042(CIVIL)">2038-2042(CIVIL)</option>
                <option value="2038-2042(AI&DS)">2038-2042(AI&DS)</option>
                <option value="2038-2042(EEE)">2038-2042(EEE)</option>
                <option value="2039-2043(CSE)">2039-2043(CSE)</option>              
                <option value="2039-2043(CSE)">2039-2043(ECE)</option>
                <option value="2039-2043(MECH)">2039-2043(MECH)</option>
                <option value="2039-2043(CIVIL)">2039-2043(CIVIL)</option>
                <option value="2039-2043(AI&DS)">2039-2043(AI&DS)</option>
                <option value="2039-2043(EEE)">2039-2043(EEE)</option>
                <option value="2040-2044(CSE)">2040-2044(CSE)</option>
                <option value="2040-2044(ECE)">2040-2044(ECE)</option>
                <option value="2040-2044(MECH)">2040-2044(MECH)</option>
                <option value="2040-2044(CIVIL)">2040-2044(CIVIL)</option>
                <option value="2040-2044(AI&DS)">2040-2044(AI&DS)</option>
                <option value="2040-2044(EEE)">2040-2044(EEE)</option>
                <option value="2041-2045(CSE)">2041-2045(CSE)</option>
                <option value="2041-2045(ECE)">2041-2045(ECE)</option>
                <option value="2041-2045(MECH)">2041-2045(MECH)</option>
                <option value="2041-2045(CIVIL)">2041-2045(CIVIL)</option>
                <option value="2041-2045(AI&DS)">2041-2045(AI&DS)</option>
                <option value="2041-2045(EEE)">2041-2045(EEE)</option>
                <option value="2042-2046(CSE)">2042-2046(CSE)</option>
                <option value="2042-2046(ECE)">2042-2046(ECE)</option>
                <option value="2042-2046(MECH)">2042-2046(MECH)</option>
                <option value="2042-2046(CIVIL)">2042-2046(CIVIL)</option>
                <option value="2042-2046(AI&DS)">2042-2046(AI&DS)</option>
                <option value="2042-2046(EEE)">2042-2046(EEE)</option>
                <option value="2043-2047(CSE)">2043-2047(CSE)</option>
                <option value="2043-2047(ECE)">2043-2047(ECE)</option>
                <option value="2043-2047(MECH)">2043-2047(MECH)</option>
                <option value="2043-2047(CIVIL)">2043-2047(CIVIL)</option>
                <option value="2043-2047(AI&DS)">2043-2047(AI&DS)</option>
                <option value="2043-2047(EEE)">2043-2047(EEE)</option>
                <option value="2044-2048(CSE)">2044-2048(CSE)</option>
                <option value="2044-2048(ECE)">2044-2048(ECE)</option>
                <option value="2044-2048(MECH)">2044-2048(MECH)</option>
                <option value="2044-2048(CIVIL)">2044-2048(CIVIL)</option>
                <option value="2044-2048(AI&DS)">2044-2048(AI&DS)</option>
                <option value="2044-2048(EEE)">2044-2048(EEE)</option>
                <option value="2045-2049(CSE)">2045-2049(CSE)</option>
                <option value="2045-2049(ECE)">2045-2049(ECE)</option>
                <option value="2045-2049(CMECH)">2045-2049(MECH)</option>
                <option value="2045-2049(CIVIL)">2045-2049(CIVIL)</option>
                <option value="2045-2049(AI&DS)">2045-2049(AI&DS)</option>
                <option value="2045-2049(EEE)">2045-2049(EEE)</option>
                <option value="2046-2050(CSE)">2046-2050(CSE)</option>
                <option value="2046-2050(ECE)">2046-2050(ECE)</option>
                <option value="2046-2050(MECH)">2046-2050(MECH)</option>
                <option value="2046-2050(CIVIL)">2046-2050(CIVIL)</option>
                <option value="2046-2050(AI&DS)">2046-2050(AI&DS)</option>
                <option value="2046-2050(EEE)">2046-2050(EEE)</option>
                <option value="2047-2051(CSE)">2047-2051(CSE)</option>
                <option value="2047-2051(ECE)">2047-2051(ECE)</option>
                <option value="2047-2051(MECH)">2047-2051(MECH)</option>
                <option value="2047-2051(CIVIL)">2047-2051(CIVIL)</option>
                <option value="2047-2051(AI&DS)">2047-2051(AI&DS)</option>
                <option value="2047-2051(EEE)">2047-2051(EEE)</option>
                <option value="2048-2052(CSE)">2048-2052(CSE)</option>
                <option value="2048-2052(ECE)">2048-2052(ECE)</option>
                <option value="2048-2052(MECH)">2048-2052(MECH)</option>
                <option value="2048-2052(CIVIL)">2048-2052(CIVIL)</option>
                <option value="2048-2052(AI&DS)">2048-2052(AI&DS)</option>
                <option value="2048-2052(EEE)">2048-2052(EEE)</option>
                <option value="2049-2053(CSE)">2049-2053(CSE)</option>
                <option value="2049-2053(ECE)">2049-2053(ECE)</option>
                <option value="2049-2053(MECH)">2049-2053(MECH)</option>
                <option value="2049-2053(CIVIL)">2049-2053(CIVIL)</option>
                <option value="2049-2053(AI&DS)">2049-2053(AI&DS)</option>
                <option value="2049-2053(EEE)">2049-2053(EEE)</option>
                <option value="2050-2054(CSE)">2050-2054(CSE)</option>
                <option value="2050-2054(ECE)">2050-2054(ECE)</option>
                <option value="2050-2054(MECH)">2050-2054(MECH)</option>
                <option value="2050-2054(CIVIL)">2050-2054(CIVIL)</option>
                <option value="2050-2054(AI&DS)">2050-2054(AI&DS)</option>
                <option value="2050-2054(EEE)">2050-2054(EEE)</option>
            </select>
            </div>
            <div class="current_semester">
            <label for="current_semester" name="current_semester" style="font-family: istok web;font-size:20px;" required>Current Semester</label>
            <select name="current_semester" id="current_semester"style="border-radius:15px;border:2px solid black"required>
                <option value="">Select Sem</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
            </div>
            <div class="checkbox">
            <input type="checkbox" name="agree" id="agree" required> please check the above given data are correct or not ,if it correct tick the checkbox .</input>
            
            <button style="background-color: #000000;border-radius: 20px; color:white;">Submit</button> 
             </div>
             <div class="email">
                <label for="email" style="font-size: 20px; font-family: istok web;">Email</label>
                <input type="email" name="email" class="box2" placeholder="Enter email" name="email" style="height:30px; width: 226px; border-radius: 15px; border:2px solid black;" required>
             </div>
             <div class="Address">
                <label for="rollno" style="font-family: istok web;font-size:20px;">Address</label>
                <input type="text" name="Addreess" id="Addreess"placeholder="Enter Address" style="border-radius:15px;border:2px solid black;width: 226px;height: 30px; " required>
            </div>
               <div class="Regno">
                <label for="registernumber" style="font-family: istok web;font-size:20px;">Register Number</label>
                <input type="text" name="registernumber" id="registernumber"placeholder="Enter register number" style="border-radius:15px;border:2px solid black;width: 226px;height: 30px; " required>
             </div>  
               <div class="Religion">
                <label for="religion" name="religion"style="font-family: istok web;font-size:20px;">Religion</label>
                <select name="religion" id="religion"style="border-radius:15px;border:2px solid black"  required>
                    <option value="">Select Religion</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Christian">Christian</option>
                    <option value="Muslim">Muslim</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Jain">Jain</option>
                </select>
               </div>
        </form>
    </div>

   <div class="logout">
    <button style="background-color: #000000;border-radius: 5px; color:white;"><a href="" style="color: white;text-decoration: none;">Logout</a></button> 
   </div> 

    <script>
        <?php if(isset($_GET['error'])) { ?>
            // Execute JavaScript only if there's an error parameter in the URL
            document.getElementById('rollno').classList.add('error');
            document.getElementById('rollno').setAttribute('placeholder', '<?php echo $_GET['error']; ?>');
        <?php } ?>
    </script>
</body>
</html>
