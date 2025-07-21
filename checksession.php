<?php


// Function to check if user is logged in
function checkSession() {
    if (!isset($_SESSION['u_info'])) {
        // If session variable 'u_info' is not set, redirect to login page
        header("Location: userlogin.php");
        exit();
    }
}

// Function to set user session
function setUserSession($userId) {
    $_SESSION['u_info'] = $userId;
}


?>
