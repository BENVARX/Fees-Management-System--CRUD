<?php
$con=mysqli_connect('localhost','root','','mydatabase');
if(!$con){
    die(mysqli_error("Error"+$con));
}
?>
