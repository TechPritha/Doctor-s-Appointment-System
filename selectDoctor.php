<?php
require("config.php");
require("checkSession.php");

// Fetching doctor data from the database
$query = "SELECT doc_id FROM doctors_list";
$result = mysqli_query($con, $query);

// Fetch the first row from the result set
$row = mysqli_fetch_assoc($result);
$i=1;
while ($row = mysqli_fetch_assoc($result)) {
// Check if a row is fetched and if doc_id exists
if ($row && isset($row['doc_id'])) {
    // Set the doc_id to be passed in the URL
    $doc_id = $row['doc_id'];

    // Redirect to the same page with doc_id in the URL
    //header("Location: newappoin.php?doc_id=$doc_id");
   // exit(); // Stop further execution
       

} else {
    echo "No doctor ID found.";
}
}
$i++;
?>
