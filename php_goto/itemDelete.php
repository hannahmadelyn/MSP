<?php
// Connect to your database
require_once("settings.php"); // connection info

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

$sql_table = "ITEM";

// Check if the itemID is provided in the query parameter
if (isset($_GET["itemID"])) {
    $itemID = intval($_GET["itemID"]); // Ensure it's an integer to prevent SQL injection

    // Prepare and execute the DELETE query
    $query = "DELETE FROM $sql_table WHERE itemID = $itemID";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // The item was successfully deleted
        header("Location: item.php"); // Redirect back to the item.php page
        exit; // Ensure the script stops executing after the redirect
    } else {
        // Display an error message if the deletion was not successful
        echo "<p class=\"wrong\">Failed to delete the item.</p>";
    }
} else {
    // Display an error message if the itemID is not provided in the query parameter
    echo "<p class=\"wrong\">Invalid item ID.</p>";
}

// Close the database connection
mysqli_close($conn);
?>
