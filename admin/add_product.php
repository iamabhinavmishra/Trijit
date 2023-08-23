<!-- Trijit/admin/add_product.php -->
<?php
// You can include any necessary connection or session management code here

// Check for the session message and display it
session_start();
if (isset($_SESSION["product_added"]) && $_SESSION["product_added"]) {
    echo "Product added successfully.";
    // Reset the session message
    $_SESSION["product_added"] = false;
}

if (isset($_SESSION["product_not_added"]) && $_SESSION["product_not_added"]) {
    echo "Product not added. Please try again.";
    // Reset the session message
    $_SESSION["product_not_added"] = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
</head>
<body>

<h2>Add New Product</h2>
<form method="post" action="process_product.php">
    <label for="vps_name">VPS Name:</label>
    <input type="text" name="vps_name" required><br>

    <label for="num_cores">Number of Cores:</label>
    <input type="number" name="num_cores" required><br>

    <label for="ram_gb">RAM in GB:</label>
    <input type="number" name="ram_gb" required><br>

    <label for="storage_gb">Storage in GB:</label>
    <input type="number" name="storage_gb" required><br>

    <label for="price">Price:</label>
    <input type="number" step="0.01" name="price" required><br>

    <label for="description">Description:</label><br>
    <textarea name="description" rows="4" cols="50" required></textarea><br>

    <input type="submit" value="Add Product">
</form>

</body>
</html>
