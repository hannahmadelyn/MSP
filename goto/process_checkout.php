<?php
// Database connection details
$servername = "your_server_name"; // typically "localhost"
$username = "your_database_username";
$password = "your_database_password";
$dbname = "s102060145_db"; // Yeojin's database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming 'memberID' is provided in the form or from user's session
$memberID = $_POST['memberID']; // This is just a placeholder; typically, you'd get this from user's session or some other method
$orderDate = date("Y-m-d"); // current date

// Insert into SALES table
$stmt = $conn->prepare("INSERT INTO SALES (memberID, orderDate) VALUES (?, ?)");
$stmt->bind_param("is", $memberID, $orderDate);

if ($stmt->execute()) {
    $transactionID = $stmt->insert_id;

    // Assuming you have an array of itemIDs and their quantities from the cart
    foreach ($_POST['cartItems'] as $item) {
        $itemID = $item['itemID'];
        $quantity = $item['quantity'];

        // Insert into SALEDETAILS table
        $stmt2 = $conn->prepare("INSERT INTO SALEDETAILS (transactionID, itemID, quantity) VALUES (?, ?, ?)");
        $stmt2->bind_param("iii", $transactionID, $itemID, $quantity);
        $stmt2->execute();
        $stmt2->close();
    }

    echo "Order processed successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
