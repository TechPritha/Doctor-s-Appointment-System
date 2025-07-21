<?php
require('config.php');

// Function to check if a date is available
function isAvailableDay($date, $days) {
    $day_of_week = date("D", strtotime($date)); // Get day of the week, e.g., "Mon"
    return in_array($day_of_week, $days);
}

// Populate the table for each doctor
$id = 2; // Example doctor ID
$days = ["Mon", "Tue", "Wed"]; // Example available days for the doctor

// Generate dates for the next 30 days
$today = strtotime("today");
for ($i = 0; $i < 30; $i++) {
    $date = date("Y-m-d", strtotime("+$i days", $today));
    
    // Check if the doctor is available on this day
    if (isAvailableDay($date, $days)) {
        // Insert into the database
        $sql = "INSERT INTO doctor_schedule (id, days) VALUES ('$id', '$days')";
        mysqli_query($con, $sql) or die(mysqli_error($con));
    }
}

echo "Doctor availability populated successfully.";
?>
