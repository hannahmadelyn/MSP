<?php 
// set the page title
$pageTitle = "User";

// import the head section
include "includes/head.php";
include "includes/connect.php";
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
            <section>
    <form method="post" action="processSale.php">
        <!-- Members Dropdown -->
        <label for="member">Select Member:</label>
        <select name="memberID" id="member" required>
            <option value="">--Select--</option>
            <?php
            $sql = "SELECT memberID, firstName, lastName FROM MEMBER";
            foreach ($pdo->query($sql) as $row) {
                echo "<option value='" . $row['memberID'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
            }
            ?>
        </select>

        <!-- Items Table -->
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM ITEM";
                foreach ($pdo->query($sql) as $item) {
                    echo "<tr>
                            <td>" . $item['name'] . "</td>
                            <td>" . $item['price'] . "</td>
                            <td><input type='number' name='quantity[" . $item['itemID'] . "]' value='0' min='0'></td>
                            <td id='total_" . $item['itemID'] . "'>0</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
        <input type="submit" value="Purchase">
    </form>

    <!-- JavaScript to Update Total Price -->
    <script type="text/javascript">
        document.addEventListener('input', function(e) {
            if (e.target.tagName.toLowerCase() === 'input' && e.target.type.toLowerCase() === 'number') {
                const itemId = e.target.name.match(/\d+/)[0];
                const price = parseFloat(e.target.closest('tr').children[1].innerText);
                document.getElementById('total_' + itemId).innerText = (price * e.target.value).toFixed(2);
            }
        });
    </script>
</section>
        </main>
    </div>
    <?php include "includes/footer.php"; ?>
</body>
</html>