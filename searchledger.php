<?php
include 'searchconnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Search data</title>
	<style>
		/* Basic reset to ensure consistent styles across browsers */
		body, html, input, button {
			margin: 0;
			padding: 0;
			font-family: 'Arial', sans-serif;
		}

		body {
			background-color: #eee; /* Light gray background */
		}

		.container {
			width: 100%;
			max-width: 600px;
			margin: 0 auto; /* Center container on page */
			padding: 20px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Slight shadow for depth */
			background-color: white;
		}

		input[type="text"] {
			width: 80%;
			padding: 10px 15px;
			margin-right: 10px;
			border: 1px solid #ccc;
			border-radius: 50px; /* Rounded corners */
			transition: border-color 0.3s; /* Smooth transition for hover effects */
		}

		input[type="text"]:focus {
			border-color: black; /* Change border color on focus */
			outline: none;
		}

		button {
			padding: 10px 20px;
			background-color: black; 
			color: white; /* White text on black background */
			border: none;
			border-radius: 50px; /* Rounded corners */
			cursor: pointer;
			transition: background-color 0.3s; /* Smooth transition for hover effects */
		}

		button:hover {
			background-color: #555; /* Slightly lighter black for hover */
		}
	</style>
</head>
<body>
	<div class="container my-5">
		<form method="post">
			<input type="text" placeholder="search data" name="search">
			<button class="btn btn-dark">search</button>
		</form>
		<div class ="container my-5">
			<table class="table">
				<?php
if(isset($_POST['submit'])){
	$search=$_POST["search"];
	$sql="SELECT * FROM entries page where id like '%$search%' or rollno like '%$search%' or firstname  like'%$search%' lastname like'%$search%' ";
	$result=mysqli_query($con,$sql);
	if($result){
		if(mysqli_num_rows($result)>0){
			echo "<thead>
			<tr>
			<th>id</th>
			<th>rollno</th>
				<th>firstname</th>
				<th>lastname</th>
				</tr>
				</thead>";
				while($row=mysqli_fetch_assoc($result)){
				echo '<tbody>
				<tr>
				<td><a href="search.php/data='.$row['id'].'">'.$row['id'].'</td>
				<td>'.$row['rollno'].'</td>
				<td>'.$row['firstname'].'</td>
				</tr>
				</tbody>';
			}
		}
		else{
			echo '<h2 class=text-danger>data not found</h2>';
		}
	}
}

				?>

				
</table>
	</div>
</body>
</html>