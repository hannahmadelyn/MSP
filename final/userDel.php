<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include "includes/connect.php";

// Get memberID from the URL parameter, ensuring it is an integer
$memberID = isset($_GET['memberID']) ? intval($_GET['memberID']) : 0;

// Prepare and execute the DELETE SQL statement
$sql = "DELETE FROM MEMBER WHERE memberID = ?";
$stmt = $pdo->prepare($sql);

if($stmt->execute([$memberID])) {
    // If the delete is successful, redirect to the previous page or a specific page
    header("Location: index.php"); // Replace 'members_list.php' with the actual page you want to redirect to
    exit();
} else {
    echo "Error deleting member.";
}
?>
