<?php
// Start session if not already started
session_start();

// Check if user is logged in
if (isset($_SESSION["username"])) {
    // Generate JavaScript code to open a custom window
    $newWindow = "<script>window.open('Home Page.html', 'CustomWindow', ' 'width='+screen.availWidth+',height='+screen.availHeight+',fullscreen=yes',toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no');</script>";
    
    // Echo the JavaScript code to execute it
    echo $newWindow;
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
