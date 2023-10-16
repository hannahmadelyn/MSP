<?php
include "includes/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $memberID = $_POST['memberID'];
    $quantities = $_POST['quantity'];

    $pdo->beginTransaction();

    try {
        // Insert into SALES table
        $sql = "INSERT INTO SALES (memberID, orderDate) VALUES (?, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$memberID]);

        $transactionID = $pdo->lastInsertId();

        // Insert into SALEDETAILS table
        $sql = "INSERT INTO SALEDETAILS (transactionID, itemID, quantity) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        foreach ($quantities as $itemID => $quantity) {
            if ($quantity > 0) {
                $stmt->execute([$transactionID, $itemID, $quantity]);
            }
        }

        $pdo->commit();
        echo "Transaction successful! <a href='index.php'>Go Back</a>";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Transaction failed: " . $e->getMessage();
    }
}
?>
