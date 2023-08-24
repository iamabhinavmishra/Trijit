<!-- Trijit/admin/admin_dashboard.php -->
<?php
session_start();
if (!isset($_SESSION["first_name"])) {
    header("Location: ../admin_login.php");
    exit();
}

$adminName = $_SESSION["first_name"];
$currentTime = date("H:i:s");
$greeting = "";

if (date("H") < 12) {
    $greeting = "Good morning,";
} elseif (date("H") < 18) {
    $greeting = "Good afternoon,";
} else {
    $greeting = "Good evening,";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

<h2>Admin Dashboard</h2>
<p><?php echo $greeting; ?> <?php echo $adminName; ?>!</p>
<p>Current time: <?php echo $currentTime; ?></p>
<p><a href="add_product.php">Add New Product</a></p>
<p><a href="admin_logout.php">Logout</a></p>
<p><a href="manage_prices.php">Manage Prices</a></p>

</body>
</html>
