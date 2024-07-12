<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportpage</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins';
            margin: 0;
            padding: 0;
        }

        .button-container {
            display: flex;
            justify-content: center;
            background-color: black;
            height: 80px;
            position: relative;
            top: -34px;
        }

        .tab-button {
            padding: 10px 20px;
            background-color: black;
            color:white;
            border: solid 2px white;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            width: 150px;
            margin: 10px;
            margin-top: auto;
            margin-bottom: auto;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .tab-button.active {
            background-color: white;
            color: black;
            top: 30px;
            font-weight: bold;
            font-size: 15px;
        }

        .page-container {
            display: none;
        }

        .active {
            display: block;
        }

        iframe {
            border: none;
            width: 100%;
            height: 580px;
            background-color: white;
        }

        .Topspace{
            background-color: black;
            position: relative;
            top: -16px;
            height: 210px;
            font-family: 'poppins';
            font-size: 36px;
            display: flex;
            justify-content: center;
        }

        .backtomenu{
            position:absolute;
            top:10px;
            left:10px;
            border: solid 2px orange;
            border-radius: 10px;
        }.label2{
position: absolute;
font-family: poppins;
font-size: 20px;
left: 400px;
top: 100px;

}.submit{
    position:absolute;
    top:84px;
    right:300px;
}
    </style>
</head>
<body>
<form method="post">
    <div class="Topspace">
    <div class="label2">
       <input type="text" style="border-radius:15px;border:2px solid black;width: 650px;height: 20px;padding:7px;" id="roll_number" name="roll_number" placeholder="Enter the rollno" required>
   </div>
   <div class="submit">
       <button style="padding: 0px 0px 0px 0px;margin-left: 15px; background-color: #000000;border-radius: 15px;border:2px solid white; color:white;width: 80px;height: 38px;" type="submit">Search</button>
   </div>
        <p style="color: white; font-family: poppins;">ORIGINAL FEE</p>
    </div>
    <div class="button-container">
        <button class="tab-button" onclick="loadPHP(this, 'individualpaidfees.php')">Individualpaidfee</button>
        <button class="tab-button" onclick="loadPHP(this, 'originalfees.php')">Originalfees</button>
        <button class="tab-button" onclick="loadPHP(this, 'balancefee.php')">Balancefees</button>
        <!-- Add more buttons as needed -->
    </div>
</form>
    <div id="phpContent" class="page-container">
        <?php
            // PHP logic for loading content based on conditions
            // Example: Fetching data from a database, processing data, etc.
            // Replace this with your actual PHP logic
            $page = isset($_GET['page']) ? $_GET['page'] : 'individualpaidfees.php';
            echo '<iframe src="' . $page . '"></iframe>';
        ?>
    </div>

    <script>
        function loadPHP(button, url) {
            var phpContent = document.getElementById("phpContent");
            phpContent.innerHTML = '<iframe src="' + url + '"></iframe>';
            phpContent.classList.add("active");

            // Remove active class from all buttons
            var buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(function(btn) {
                btn.classList.remove('active');
            });

            // Add active class to the clicked button
            button.classList.add('active');
        }
    </script>
    <div class="backtomenu">
        <a href="Home Page.php">
            <button type="button" name="Back" value="Back" style="color: orange; background-color: black; height: 30px; width: 80px; padding: 0px 0px 0px 0px;border-radius:10px;border:2px solid black;"> <<< </button>
        </a>
    </div>
</body>
</html>
