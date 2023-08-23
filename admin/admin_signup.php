<!-- Trijit/admin/admin_signup.php -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("../utils/connection.php");

// Check if the admin table exists, if not, create it
$tableName = "admins";
$createTableQuery = "
    CREATE TABLE IF NOT EXISTS $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        designation VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    )
";

if ($conn->query($createTableQuery) === TRUE) {
    echo "Table '$tableName' created or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $designation = $_POST["designation"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Insert admin data into the table
    $insertQuery = "INSERT INTO $tableName (first_name, last_name, designation, username, password)
                    VALUES ('$firstName', '$lastName', '$designation', '$username', '$password')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Admin account created successfully. Redirecting to login page...";
        header("Location: ../admin_login.php");
        exit();
    } else {
        echo "Error creating admin account: " . $conn->error . "<br>";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Signup</title>
</head>
<body>

<h2>Admin Signup</h2>
<form method="post" action="">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br>
    <label for="designation">Designation:</label>
    <input type="text" name="designation" required><br>
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Sign Up">
</form>

</body>
</html>
