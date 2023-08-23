<!-- Trijit/index.php -->
<?php
// Include the database connection code if not already included
include_once("utils/connection.php");

// Retrieve products from the database
$productsQuery = "SELECT * FROM products";
$productsResult = $conn->query($productsQuery);

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h2>Products</h2>
<?php
if ($productsResult->num_rows > 0) {
    while ($row = $productsResult->fetch_assoc()) {
        echo "<h3>" . $row["vps_name"] . "</h3>";
        echo "<p>Number of Cores: " . $row["num_cores"] . "</p>";
        echo "<p>RAM in GB: " . $row["ram_gb"] . "</p>";
        echo "<p>Storage in GB: " . $row["storage_gb"] . "</p>";
        echo "<p>Price: $" . $row["price"] . "</p>";
        echo "<p>Description: " . $row["description"] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No products available.";
}
?>

</body>
</html>
