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

 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Admin Login</title>
 <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.css.map">
 <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css.map">
 <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

 <section id="admin_main_section">
  <div class="container">
   <div class="row pt-5">
    <div class="col-md-6"></div>
    <div class="col-md-6 bg-light rounded p-5">
     <h2 class="mb-4">Admin Login</h2>
     <form method="post" action="admin_login.php">
      <div class="mb-3">
       <label for="username" class="form-label">Username:</label>
       <input type="text" class="form-control" name="username" required>
      </div>
      <div class="mb-3">
       <label for="password" class="form-label">Password:</label>
       <input type="password" class="form-control" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
     </form>
    </div>
   </div>
  </div>
 </section>


 <script src="./assets/bootstrap/js/bootstrap.js"></script>
 <script src="./assets/bootstrap/js/bootstrap.js.map"></script>
 <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
 <script src="./assets/bootstrap/js/bootstrap.min.js.map"></script>
</body>

</html>