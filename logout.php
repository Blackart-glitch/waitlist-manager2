<?php
include('database_connect.php');
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

//close mysql conn
$conn->close();

// Redirect to the homepage
header("Location: index.html");
exit;
?>