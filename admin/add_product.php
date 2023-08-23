<!-- Trijit/admin/add_product.php -->
<?php
// You can include any necessary connection or session management code here
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
</head>
<body>

<h2>Add New Product</h2>
<form method="post" action="process_product.php"> <!-- You can create a separate file for processing form submission -->
    <!-- Add form fields for product details (e.g., name, description, price, etc.) -->
    <label for="product_name">Product Name:</label>
    <input type="text" name="product_name" required><br>
    <!-- Add other fields here -->

    <input type="submit" value="Add Product">
</form>

</body>
</html>
