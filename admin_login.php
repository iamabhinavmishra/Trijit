<!-- Trijit/admin_login.php -->
<?php
include_once("utils/connection.php");

$tableName = "admins"; // Define the table name

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the admin exists in the database
    $checkAdminQuery = "SELECT * FROM $tableName WHERE username='$username'";
    $result = $conn->query($checkAdminQuery);

    if ($result->num_rows > 0) {
        $adminData = $result->fetch_assoc();
        if (password_verify($password, $adminData["password"])) {
            session_start();
            $_SESSION["first_name"] = $adminData["first_name"];
            header("Location: admin/admin_dashboard.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Admin not found.";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>
<form method="post" action="admin_login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

</body>
</html>
