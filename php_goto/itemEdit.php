<!-- Still under work - Mahita *** -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <p>Editing itemID: 1</p>
    <form method="post" action="itemEdit.php">
        <!-- Hidden input field to store the itemID for the update -->
        <input type="hidden" name="itemID" value="1">

        <!-- Input fields for editing item details -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="1" required><br><br>
        <!-- Repeat this for other item attributes -->

        <input type="submit" value="Update Item">
    </form>
</body>
</html>
