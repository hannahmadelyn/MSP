<?php
// STILL UNDER WORK - MAHITA ***

// Connect to your database
require_once("settings.php"); // connection info

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

$sql_table = "ITEM";

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the itemID is provided in the query parameter
if (isset($_GET["itemID"])) {
    $itemID = intval($_GET["itemID"]); // Ensure it's an integer to prevent SQL injection

    // Fetch the existing item details
    $query = "SELECT * FROM $sql_table WHERE itemID = $itemID";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Item details found, display the edit form
        $row = mysqli_fetch_assoc($result);
        // Create an HTML form to edit the item details
        // Include input fields with the current item details
        // Allow users to make changes and submit the form for an update
        // Include a hidden input field to store the itemID
    } else {
        echo "<p>No such item found.</p>";
    }
} else {
    echo "<p class=\"wrong\">Invalid item ID.</p>";
}

// Close the database connection
mysqli_close($conn);
?>
