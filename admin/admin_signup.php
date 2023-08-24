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
    // echo "Table '$tableName' created or already exists.<br>";
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

 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Admin Signup</title>

 <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
 <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css.map">
 <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css.map">
 <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

 <section id="admin_main_section">
  <div class="container centered-form">
   <div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6 bg-light rounded p-4 login-form">
     <h2>Admin Signup</h2>
     <form method="post" action="">
      <div class="form-group">
       <label for="first_name" class="form-label">First Name:</label>
       <input type="text" class="form-control" name="first_name" required>
      </div>
      <div class="form-group">
       <label for="last_name" class="form-label">Last Name:</label>
       <input type="text" class="form-control" name="last_name" required>
      </div>
      <div class="form-group">
       <label for="designation" class="form-label">Designation:</label>
       <input type="text" class="form-control" name="designation" required>
      </div>
      <div class="form-group">
       <label for="username" class="form-label">Username:</label>
       <input type="text" class="form-control" name="username" required>
      </div>
      <div class="form-group">
       <label for="password" class="form-label">Password:</label>
       <input type="password" class="form-control" name="password" required>
      </div>
      <div class="form-group">
       <input type="submit" class="btn btn-primary mt-3" value="Sign Up">
      </div>
     </form>
    </div>
   </div>
  </div>
 </section>

 <script src="../assets/bootstrap/js/bootstrap.js"></script>
 <script src="../assets/bootstrap/js/bootstrap.js.map"></script>
 <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
 <script src="../assets/bootstrap/js/bootstrap.min.js.map"></script>
</body>

</html>