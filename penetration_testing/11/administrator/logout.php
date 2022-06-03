<?php
session_start();

// if the user is logged in, unset the session
if (isset($_SESSION['xyb_injection'])) {
    unset($_SESSION['xyb_injection']);
}

// now that the user is logged out,
// go to login page
header('Location: index.php');
?>
