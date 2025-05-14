<?php
session_start();

// Destroy all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Optional: redirect to login or homepage
header("Location: login.php"); 
exit;
?>
