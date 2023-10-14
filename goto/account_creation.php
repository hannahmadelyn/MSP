<?php
session_start();  // Start the session

$server = "localhost";
$username = "your_username";
$password = "your_password";
$database = "s102060145_db"; 

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if it's a login request
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];  // You should hash and salt this before comparing with database

    $sql = "SELECT memberID, firstName, lastName FROM MEMBER WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);  // Bind parameters
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['memberID'] = $row['memberID'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];
        
        header("Location: checkout.php");  // Redirect to checkout or desired page
    } else {
        echo "Login failed!";
    }
}

// Check if it's a signup request
if(isset($_POST['signup'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // You should hash and salt this before storing in database

    $sql = "INSERT INTO MEMBER (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);  // Bind parameters
    if($stmt->execute()) {
        echo "Account created successfully!";
    } else {
        echo "Error creating account!";
    }
}

$conn->close();
?>
