<?php
 require('config.php'); 
 require('checksession.php');
 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['app_id'])) {
    $appId = $_POST['app_id'];
    $userId = $_SESSION['u_info'];

    // Perform cancellation logic here (e.g., update appointment status to 'cancelled')
    $cancelQuery= "DELETE FROM appointment WHERE app_id='$appId' AND pat_id='$userId'";
    
    $result = mysqli_query($con, $cancelQuery);

    if ($result) {
        // Redirect back to the user profile page with a success message
        header('Location:appointmentlist.php?msg=Appointment cancelled successfully');
        exit();
    } else {
        // Redirect back to the user profile page with an error message
        header('Location: appointmentlist.php?error=Failed to cancel appointment');
        exit();
    }
} else {
    // Redirect back to the user profile page with an error message for invalid request
    header('Location: appointmentlist.php?error=Invalid request');
    exit();
}
?>
