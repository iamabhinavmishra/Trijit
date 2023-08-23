<!-- Trijit/admin/process_product.php -->
<?php
// Include the database connection code if not already included
include_once("../utils/connection.php");

// Check if the products table exists, if not, create it
$tableName = "products";
$createTableQuery = "
    CREATE TABLE IF NOT EXISTS $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        vps_name VARCHAR(255) NOT NULL,
        num_cores INT NOT NULL,
        ram_gb INT NOT NULL,
        storage_gb INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        description TEXT NOT NULL
    )
";

if ($conn->query($createTableQuery) === TRUE) {
    echo "Table '$tableName' created or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve product details from the form
    $vpsName = $_POST["vps_name"];
    $numCores = $_POST["num_cores"];
    $ramGB = $_POST["ram_gb"];
    $storageGB = $_POST["storage_gb"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    // Insert the product into the database
    $insertProductQuery = "INSERT INTO $tableName (vps_name, num_cores, ram_gb, storage_gb, price, description)
                           VALUES ('$vpsName', $numCores, $ramGB, $storageGB, $price, '$description')";

    if ($conn->query($insertProductQuery) === TRUE) {
        // Set a session message for success
        session_start();
        $_SESSION["product_added"] = true;
    } else {
        // Set a session message for error
        session_start();
        $_SESSION["product_not_added"] = true;
    }

    // Redirect back to add_product.php
    header("Location: add_product.php");
    exit();
}

// Close the connection
$conn->close();
?>
