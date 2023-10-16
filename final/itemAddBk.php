<?php
// Connect to your database
require_once("settings.php"); // connection info

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

function sanitize_input($data, $conn)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form
$name = isset($_POST["name"]) ? sanitize_input($_POST["name"], $conn) : '';
$brand = isset($_POST["brand"]) ? sanitize_input($_POST["brand"], $conn) : '';
$description = isset($_POST["description"]) ? sanitize_input($_POST["description"], $conn) : '';
$category = isset($_POST["category"]) ? sanitize_input($_POST["category"], $conn) : '';
$price = isset($_POST["price"]) ? sanitize_input($_POST["price"], $conn) : '';
$quantity = isset($_POST["quantity"]) ? sanitize_input($_POST["quantity"], $conn) : '';
$weight = isset($_POST["weight"]) ? sanitize_input($_POST["weight"], $conn) : '';
$dateAdded = isset($_POST["dateAdded"]) ? sanitize_input($_POST["dateAdded"], $conn) : '';
$dateExpiry = isset($_POST["dateExpiry"]) ? sanitize_input($_POST["dateExpiry"], $conn) : '';

$sql_table = "ITEM";

if (!$conn) {
    // Display an error message
    echo "<p>Database connection failure</p>";
} else {
    $query = "INSERT INTO $sql_table (name, brand, description, category, price, quantity, weight, dateAdded, dateExpiry) 
              VALUES ('$name', '$brand', '$description', '$category', '$price', '$quantity', '$weight', '$dateAdded', '$dateExpiry')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "<p class=\"wrong\">Something is wrong with", $query, "</p>";
    } else {
        $updatedRows = mysqli_affected_rows($conn);

        if ($updatedRows == 0) {
            echo "<p>Query run successfully, but no such records found</p>";
        } else {
            echo "<p>Query run successfully, $updatedRows rows affected.</p>";
            
            // Redirect to "item.php" after a successful query
            header("Location: item.php");
            exit; // Ensure the script stops executing after the redirect
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
