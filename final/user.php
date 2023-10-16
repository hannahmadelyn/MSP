<?php 
// set the page title
$pageTitle = "User";

// import the head section
include "includes/head.php";
include "includes/connect.php"; 

if(isset($_POST['loadData'])) {
    $memberID = $_POST['memberID'];
}
?>

<body>
    <?php include "includes/header.php"; ?>

    <!-- main content -->

    <div class="container">
        <aside>
            <?php include "includes/nav.php";?>
        </aside>
        <main>
            <h1>User Dashboard</h1>

            <form method="post">
                <label for="member">Select Member:</label>
                <select id="member" name="memberID">
                    <option value="">--Select--</option>
                    <?php
                    $sql = "SELECT memberID, firstName, lastName FROM MEMBER";
                    foreach ($pdo->query($sql) as $row) {
                        echo "<option value='" . $row['memberID'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
                    }
                    ?>
                </select>

                <button class="btn_link" type="submit" name="loadData">SUBMIT</button>
            </form>

            <div id="userData">
                <?php 
                if(isset($memberID)) {
                    // Fetch user data from MEMBER table
                    $stmt = $pdo->prepare("SELECT * FROM MEMBER WHERE memberID = ?");
                    $stmt->execute([$memberID]);
                    $user = $stmt->fetch();

                    if ($user) {
                        echo "
                        <table>
                        <thead>
                        <tr>
                        <td>Name</td>
                        <td>Join Date</td>
                        <td>Phone</td>
                        <td>Address</td>
                        </tr></thead>
                        <tbody>
                        <tr>
                        <td>{$user['firstName']} {$user['lastName']}</td>
                        <td>{$user['joinDate']}</td>
                        <td>{$user['phone']}</td>
                        <td>{$user['address']}</td>
                        </tr></tbody>
                        </table>";
                    }
                }
                ?>
            </div>

            <div id="shoppingData">
                <?php 
                if(isset($memberID)) {
                    // Fetch detailed shopping data from SALEDETAILS, SALES, and ITEM tables
                    $sql = "
                        SELECT s.transactionID, s.orderDate, sd.quantity, i.name, i.price,
                               (sd.quantity * i.price) as itemTotal
                        FROM SALES s
                        INNER JOIN SALEDETAILS sd ON s.transactionID = sd.transactionID
                        INNER JOIN ITEM i ON sd.itemID = i.itemID
                        WHERE s.memberID = ?
                        ORDER BY s.transactionID, sd.itemID";

                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$memberID]);
                    $sales = $stmt->fetchAll();

                    if ($sales) {
                        echo "<h2>Shopping History</h2>
                        <table>
                        <thead>
                        <tr>
                        <td>Transaction ID</td>
                        <td>Order Date</td>
                        <td>Item Name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Item Total</td>
                        </tr></thead><tbody>";

                        $currentTransactionID = null;
                        $transactionTotal = 0;
                        foreach ($sales as $index => $sale) {
                            // If new transaction, print the total of the previous transaction and reset the total
                            if ($currentTransactionID !== null && $currentTransactionID !== $sale['transactionID']) {
                                echo "<tr><td colspan='5'>Transaction Total</td><td>\${$transactionTotal}</td></tr>";
                                $transactionTotal = 0;
                            }

                            // Print the item details
                            echo '<tr>';
                            if ($currentTransactionID !== $sale['transactionID']) {
                                echo "<td>{$sale['transactionID']}</td><td>{$sale['orderDate']}</td>";
                                $currentTransactionID = $sale['transactionID'];
                            } else {
                                echo '<td></td><td></td>';
                            }
                            echo "<td>{$sale['name']}</td><td>\${$sale['price']}</td><td>{$sale['quantity']}</td><td>\${$sale['itemTotal']}</td></tr>";

                            $transactionTotal += $sale['itemTotal'];

                            // If last item, print the total of the last transaction
                            if ($index === count($sales) - 1) {
                                echo "<tr><td colspan='5'>Transaction Total</td><td>\${$transactionTotal}</td></tr>";
                            }
                        }
                        echo "</tbody></table>";
                    }
                }
                ?>
            </div>

        </main>
    </div>
    <?php include "includes/footer.php"; ?>
</body>
</html>
