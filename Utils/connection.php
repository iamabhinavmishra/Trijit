<!-- <!DOCTYPE html>
<html>
<head>
    <title>MySQL Connection Test</title>
</head>
<body> -->

<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username = "Trijit"; // Replace with your MySQL username
$password = "Trijit@123"; // Replace with your MySQL password
$dbname = "Trijit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully to database: $dbname";

// Remember to close the connection when you're done:

?>

<!-- </body>
</html> -->